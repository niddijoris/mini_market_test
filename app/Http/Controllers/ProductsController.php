<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products =  Products::select(['id', 'name', 'category_id', 'unit_id'])
            ->with(['category:id,title', 'unit'])->get();
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "category_id" => "required", 
            "unit_id" => "required",
        ]);
        Products::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
        ]);

        return response()->json(["message" => "Maxsulot saqlandi"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Products::find($id);
        return ProductResource::make($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Products::find($id)->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
        ]);
        return response()->json(["message" => "Maxsulot yangilandi"], 200) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Products::find($id)->delete();
        return response()->json(["message"=> "Maxsulot o'chirildi"],204) ;
    }
}
