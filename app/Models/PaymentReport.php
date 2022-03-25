<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentReport extends Model
{
    use HasFactory;

    protected $table = 'payment_reports';

    protected $fillable = [

        'user_id',
        'category_id',
        'date',
        'cash_in',
        'valuePayment',


    ];


    public function setPaymentReportAttribute($value)
    {
        $this->attributes['date'] = Carbon::createFromFormat('m/d/y', $value)->format('Y-m-d');
    }

    public function getPaymentReportAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['date_in'])->format('m/d/Y');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
