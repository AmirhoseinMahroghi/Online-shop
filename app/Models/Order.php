<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";
    protected $guarded = [];

    public function getStatusAttribute($status)
    {
        switch ($status) {
            case '1':
                $status = 'پرداخت شده';
                break;
            case '0':
                $status = 'در انتظار پرداخت';
                break;
        }

        return $status;
    }

    public function getPaymentTypeAttribute($paymentType)
    {
        switch ($paymentType) {
            case 'cash':
                $paymentType = 'نقدی';
                break;
            case 'online':
                $paymentType = 'اینترنتی';
                break;
        }

        return $paymentType;
    }

    public function getPaymentStatusAttribute($PaymentStatus)
    {
        switch ($PaymentStatus) {
            case '1':
                $PaymentStatus = 'پرداخت موفق';
                break;
            case '0':
                $PaymentStatus = 'پرداخت ناموفق';
                break;
        }

        return $PaymentStatus;
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function address()
    {
        return $this->belongsTo(UserAddresses::class);
    }
}
