<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency_rate extends Model
{
    protected $guarded =[];
    
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }
}
