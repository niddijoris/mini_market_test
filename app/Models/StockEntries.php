<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class StockEntries extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Products::class, "product_id", "id");
    }

    public function supplier()
    {
        return $this->belongsTo(Suppliers::class, "supplier_id", "id");
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, "currency_id", "id");
    }

    public function currencyrate()
    {
        return $this->belongsTo(Currency_rate::class, "currency_rate_id", "id");
    }

    // public function currencyLast()
    // {
    //     $latestRate = Currency_rate::where('currency_id', $this->currency_id)
    //         ->latest()
    //         ->first();
            
    //     if ($latestRate) {
    //         $this->currency_rate_id = $latestRate->id;
    //         $this->save();
    //     }
        
    //     return $latestRate;
    // }
}
