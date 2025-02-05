<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockExits extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Products::class, "product_id", "id");
    }
    public function stockBalance()
    {
        return $this->belongsTo(StockBalance::class, "stock_balance_id", "id");
    }

    public function currency()
    {
        return $this->belongsTo(Currency_rate::class, "currency_rate_id", "id");
    }
    public function sellingPrice()
    {
        return $this->belongsTo(SellingPrice::class, "selling_price_id", "id");
    }
}
