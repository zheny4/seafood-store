<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string txnid
 * @property double payment_amount
 * @property string payment_status
 * @property string itemid
 * @property \DateTime createdtime
 */
class PaypalInfo extends Model
{
}
