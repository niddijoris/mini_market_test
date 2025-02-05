<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\SellingPrice;

class SellingPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SellingPrice::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        SellingPrice::create([
            "product_id" => $request->product_id,
            "usd_price" => $request->usd_price,
            "uzs_price" => $request->uzs_price,
        ]);
        return response()->json(["message" => "Sotish narxi saqlandi"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sellingPrice = SellingPrice::find($id);
        return response()->json(["message"=> $sellingPrice],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $sellingPrice = SellingPrice::find($id);
        // $sellingPrice->update([
        //     "product_id" => $request->product_id,
        //     "usd_price" => $request->usd_price,
        //     "uzs_price" => $request->uzs_price,
        // ]);
        // return response()->json(["message"=> "Sotish narxi yangilandi"],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
