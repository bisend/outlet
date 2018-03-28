<?php

namespace App\DatabaseModels;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DatabaseModels\Profile
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $payment_id
 * @property int|null $delivery_id
 * @property string|null $phone_number
 * @property string|null $address_delivery
 * @property string|null $code_1c
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Profile whereAddressDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Profile whereCode1c($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Profile whereDeliveryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Profile wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Profile wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DatabaseModels\Profile whereUserId($value)
 * @mixin \Eloquent
 */
class Profile extends Model
{
    protected $table = 'profiles';

}
