<?php

namespace App\Models;

use App\Helpers\Currency;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderLine
 *
 * @property int $id
 * @property int $order_id
 * @property int $curso_id
 * @property int $carrera_id
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderLine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderLine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderLine query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderLine whereCursoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderLine whereCarreraId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderLine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderLine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderLine whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderLine wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderLine whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Order $order
 */
class OrderLine extends Model
{
    protected $fillable = ["curso_id", "carrera_id", "order_id", "precio"];

    protected $appends = [
        "formatted_price"
    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function curso() {
        return $this->belongsTo(Curso::class);
    }

    public function carrera() {
        return $this->belongsTo(Curso::class);
    }

    public function getFormattedPriceAttribute() {
        return Currency::formatCurrency($this->precio, false);
    }
}
