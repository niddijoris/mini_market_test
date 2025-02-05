<?php

namespace App\Http\Controllers;

use App\Models\StockBalance;
use App\Models\StockEntries;
use App\Models\Currency_rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockEntriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return StockEntries::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $latestRate = Currency_rate::where('currency_id', $request->currency_id)
            ->orderBy('created_at','desc')
            ->first();

            if (!$latestRate) {
                return response(["message" => "Valyuta kursi topilmadi"], 400);
            }

        
        DB::beginTransaction();
        try {
            $request->validate([
                "supplier_id" => "required|numeric|gt:0",
                "product_id" => "required|numeric|gt:0",
                "currency_id" => "required|numeric|gt:0",
                "quantity" => "required|numeric|gt:0",
                "price" => "required|numeric|gt:0",
            ]);

            StockEntries::create([
                "supplier_id" => $request->supplier_id,
                "product_id" => $request->product_id,
                "currency_id" => $request->currency_id,
                "exchange_rate" => $latestRate->id,
                "quantity" => $request->quantity,
                "price" => $request->price,
            ]);

            $stockBalance = StockBalance::where('product_id', $request->product_id)
                ->first();

            if ($stockBalance) {
                $stockBalance->update([
                    "total_quantity" => $stockBalance->total_quantity + $request->quantity,
                ]);
            } else {
                StockBalance::create([
                    "product_id" => $request->product_id,
                    "total_quantity" => $request->quantity,
                ]);
            }
            
            DB::commit();
            return response(["message" => "Maxsulot kirim qilindi"], 201);
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
        $docs = StockEntries::findOrFail($id);
        return response()->json($docs);
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
