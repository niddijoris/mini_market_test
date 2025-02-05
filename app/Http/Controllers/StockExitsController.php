<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockExits;
use App\Models\StockBalance;
use Illuminate\Support\Facades\DB;
use App\Models\SellingPrice;

class StockExitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return StockExits::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            "product_id" => "required|numeric|gt:0",
            "currency_rate_id" => "required|numeric|gt:0",
            "quantity" => "required|numeric|gt:0",
            "price" => "required|numeric|gt:0",
        ]);


        DB::beginTransaction();


        try {
            $stockBalance = StockBalance::where('product_id', $request->product_id)->first();

            if ($stockBalance && $stockBalance->total_quantity >= $request->quantity) {
                StockExits::create([
                    "product_id" => $request->product_id,
                    "quantity" => $request->quantity,
                    "price" => $request->price,
                ]);

                $stockBalance->update([
                    "total_quantity" => $stockBalance->total_quantity - $request->quantity,
                ]);
            } else {
                return response(["message" => "Tavar qoldig'i yetarli emas"], 400);
            }

            DB::commit();
            return response(["message" => "Tavar chiqim bo'ldi"], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response(["message" => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stockExits = StockExits::where("id", $id)->first();
        return response()->json($stockExits);
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
