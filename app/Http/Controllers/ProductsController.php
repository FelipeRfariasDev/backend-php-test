<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = new Products();
        $products->codigo = $request->input("codigo");
        $products->nome = $request->input("nome");
        $products->preco = $request->input("preco");
        $products->qty_disponivel = $request->input("qty_disponivel");
        $products->marca = $request->input("marca");
        $products->save();

        try {
            if($products->save()){
                return response()->json([
                    "success"   =>  true,
                    "message"   =>  "Inserido com sucesso",
                    "products"      =>  $products
                ], 201);
            }
        } catch (QueryException $e){
            return response()->json([
                "success"    =>  false,
                "message"   =>  $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
