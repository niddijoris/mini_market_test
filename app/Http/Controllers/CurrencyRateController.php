<?php

namespace App\Http\Controllers;
use App\Models\Currency_rate as CurrencyRate;
use Illuminate\Http\Request;

class CurrencyRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CurrencyRate::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       

        CurrencyRate::create($request->all());

        return response()->json(['message'=>'Kurs saqlandi'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $currency = CurrencyRate::find($id);
        return response()->json($currency);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       

        $currency = CurrencyRate::findOrFail($id);
        $currency->update($request->all());

        return response()->json(['message' => 'Kurs yangilandi'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $currency = CurrencyRate::findOrFail($id);
        $currency->delete();

        return response()->json(null, 204);
    }
}
