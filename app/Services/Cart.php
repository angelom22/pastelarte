<?php

namespace App\Services;

use App\Helpers\Currency;
use App\Models\Coupon;
use App\Models\Curso;
use Illuminate\Support\Collection;

/**
 * Class Cart
 * @package App\Classes
 */
class Cart {

    /**
     * @var Collection
     */
    protected Collection $cart;

    /**
     * Cart constructor.
     */
    public function __construct() {
        if (session()->has("cart")) {
            $this->cart = session("cart");
        } else {
            $this->cart = new Collection;
        }
    }

    /**
     *
     * Get cart contents
     *
     */
    public function getContent(): Collection {
        return $this->cart;
    }

    /**
     * Save the cart on session
     */
    protected function save(): void {
        session()->put("cart", $this->cart);
        session()->save();
    }

    /**
     *
     * Add curso on cart
     *
     * @param Curso $curso
     */
    public function addCurso(Curso $curso): void {
        $this->cart->push($curso);
        $this->save();
    }

    /**
     *
     * Remove curso from cart
     *
     * @param int $id
     */
    public function removeCurso(int $id): void {
        $this->cart = $this->cart->reject(function (Curso $Curso) use ($id) {
            return $Curso->id === $id;
        });
        $this->save();
    }

    /**
     *
     * calculates the total cost in the cart
     *
     * @param bool $formatted
     * @return mixed
     */
    public function totalAmount($formatted = true) {
        $amount = $this->cart->sum(function (Curso $curso) {
            return $curso->precio;
        });
        if ($formatted) {
            return Currency::formatCurrency($amount);
        }
        return $amount;
    }

    /**
     *
     * all taxes for cart
     *
     * @param bool $formatted
     * @return float|int|string
     */
    public function taxes($formatted = true) {
        $total = $this->totalAmount(false);
        if ($total) {
            $total = ($total * env('TAXES')) / 100;
            if ($formatted) {
                return Currency::formatCurrency($total);
            }
            return $total;
        }
        return 0;
    }

    /**
     *
     * Total products in cart
     *
     * @return int
     */
    public function hasProducts(): int {
        return $this->cart->count();
    }

    /*
     * Clear cart
     */
    public function clear(): void {
        $this->cart = new Collection;
        $this->save();
    }

    /**
     *
     * calculates the total cost in the cart with coupon
     *
     * @param bool $formatted
     * @return string
     */
    public function totalAmountWithDiscount($formatted = true) {
        $amount = $this->totalAmount(false);
        $withDiscount = $amount;
        if (session()->has("coupon")) {
            $coupon = Coupon::available(session("coupon"))->first();
            if (!$coupon) {
                return $amount;
            }

            $cursosInCart = $this->getContent()->pluck("id");
            if ($cursosInCart) {
                // cursos adjuntos al cupón en la base de datos
                $cursosForApply = $coupon->cursos()->whereIn("id", $cursosInCart);

                // id cursos adjunto en la base de datos para aplicar cupón
                $idCursos = $cursosForApply->pluck("id")->toArray();

                if (!count($idCursos)) {
                    $this->removeCoupon();
                    session()->flash("message", ["danger", __("El cupón no se puede aplicar")]);
                    return $amount;
                }

                // precio total cursos sin descuento aplicado
                $precioCursos = $cursosForApply->sum("precio");

                // verifica el tipo de descuento y aplica
                if ($coupon->discount_type === Coupon::PORCENTAJE) {
                    $discount = round($precioCursos - ($precioCursos * ((100 - $coupon->discount) / 100)), 2);
                    $withDiscount = $amount - $discount;
                }
                if ($coupon->discount_type === Coupon::PRECIO) {
                    $withDiscount = $amount - $coupon->discount;
                }
            } else {
                $this->removeCoupon();
                return $amount;
            }
        }
        if ($formatted) {
            return Currency::formatCurrency($withDiscount);
        }
        return $withDiscount;
    }

    protected function removeCoupon():void {
        session()->remove("coupon");
        session()->save();
    }
}
