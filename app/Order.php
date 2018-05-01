<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int user_id
 * @property int payment_method_id
 * @property bool payed
 * @property null|string paypal
 */
class Order extends Model
{
}
