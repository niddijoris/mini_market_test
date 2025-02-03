<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Currency::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            // ...other validation rules...
        ]);

        Currency::create($request->all());

        return response()->json(['message'=>'Kurs saqlandi'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $currency = Currency::findOrFail($id);
        return response()->json($currency);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            //'code' => 'sometimes|required|string|max:10',
            // ...other validation rules...
        ]);

        $currency = Currency::findOrFail($id);
        $currency->update($request->all());

        return response()->json(['message' => 'Kurs yangilandi'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $currency = Currency::findOrFail($id);
        $currency->delete();

        return response()->json(null, 204);
    }
}
