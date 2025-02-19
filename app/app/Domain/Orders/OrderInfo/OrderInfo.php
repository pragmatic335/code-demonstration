<?php

namespace App\Domain\Orders\OrderInfo;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $order_id Индентификатор заказа
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderInfo query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderInfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderInfo whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderInfo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderInfo extends Model
{
    protected $table = 'orders_info';
}
