<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";
    protected $guarded = [];


    public function scopeGetData($query, $month, $status)
    {
        $v = verta()->startMonth()->subMonth($month - 1);
        $date = verta()->jalaliToGregorian($v->year, $v->month, $v->day);
        return $query->where('created_at', '>', Carbon::create($date[0], $date[1], $date[2], 0, 0, 0))
            ->where('status', $status)
            ->get();
    }

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

    public function getGatewayAttribute($gateway)
    {
        switch ($gateway) {
            case 'zarinpal':
                $gateway = 'زرین پال';
                break;
            case 'pay':
                $gateway = 'پی';
                break;
        }

        return $gateway;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
