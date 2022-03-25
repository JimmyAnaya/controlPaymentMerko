<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = [
        'name_category'
    ];

    public function paymentReport()
    {
        return $this->belongsTo(PaymentReport::class);
    }
}
