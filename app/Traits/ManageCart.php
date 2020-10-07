<?php
namespace App\Traits;

use App\Models\Coupon;
use App\Models\Curso;
use App\Services\Cart;

trait ManageCart {
    public function showCart() {
        return view('payment.cart');
    }

    public function addCursoToCart(Curso $curso) {
        $cart = new Cart;
        $cart->addCurso($curso);
        session()->flash("message", ["success", __("Curso añadido al carrito correctamente")]);
        return redirect(route('cart'));
    }

    public function removeCursoFromCart(Curso $curso) {
        $cart = new Cart;
        $cart->removeCurso($curso->id);
        session()->flash("message", ["success", __("Curso eliminado del carrito correctamente")]);
        return back();
    }

    public function applyCoupon() {
        session()->remove("coupon");
        session()->save();

        $code = request("coupon");
        $coupon = Coupon::available($code)->first();
        if (!$coupon) {
            session()->flash("message", ["danger", __("El cupón que has introducido no existe")]);
            return back();
        }

        $cart = new Cart;
        $coursesInCart = $cart->getContent()->pluck("id");
        $totalCourses = $coupon->courses()->whereIn("id", $coursesInCart)->count();

        if ($totalCourses) {
            session()->put("coupon", $code);
            session()->save();
            session()->flash("message", ["success", __("El cupón se ha aplicado correctamente")]);
            return back();
        }
        session()->flash("message", ["danger", __("El cupón no se puede aplicar")]);
        return back();
    }
}
