<?php

namespace App\Http\Controllers;
use App\Models\StockEntries;
use App\Models\StockExits;
use App\Models\StockBalance;
use App\Models\SellingPrice;
use App\Models\Currency_rate;
use App\Models\Products;
use Illuminate\Http\Request;

class FinancialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $firstInput = request()->product_id;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
