<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    /**
     * @OA\Get(
     * path="/api/produtcs",
     * summary="Listar produtos com buscar e paginação",
     * description="Get Listar produtos com buscar e paginação",
     * @OA\Response(
     *    response=201,
     *    description="Get Listar produtos com buscar e paginação"
     * )
     * Buscar produtos com paginação
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');

        $where = [
            ['nome', 'like',"%{$buscar}%"]
        ];

        $orWhere = [
            ['marca', 'like',"%{$buscar}%"]
        ];

        $products = Products::where($where)->orWhere($orWhere)->orderBy('id','desc')->paginate(3);
        
        return response()->json([
            "products"      =>  $products
        ]);
    }

    /**
     * @OA\Post(
     * path="/api/produtcs",
     * summary="Add produtos",
     * description="Post Add produtos",
     * @OA\Response(
     *    response=201,
     *    description="Post Add produtos"
     * )
     * Adicionar produto
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
     * @OA\Get(
     * path="/api/produtcs/{id}",
     * summary="Get produtos",
     * description="Get produtos id",
     * @OA\Response(
     *    response=201,
     *    description="Get produto"
     * )
     * Listar produto pelo id
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Products::find($id);

        if(!$products) {
            return response()->json([
                "success"    =>  false,
                "message"   => "id $id não foi encontrado",
            ], 404);
        }
        return response()->json([
            "success"  =>  true,
            "products" => $products,
        ]);
    }

    /**
     * @OA\Put(
     * path="/api/produtcs/{id}",
     * summary="Put produtos",
     * description="Put produtos id",
     * @OA\Response(
     *    response=201,
     *    description="Put produto"
     * )
     * Atualizar produto pelo id
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,int $id)
    {
        $products = Products::find($id);

        if(!$products) {
            return response()->json([
                "success"    =>  false,
                "message"   => "id $id não foi encontrado",
            ], 404);
        }

        $products->codigo = $request->input("codigo");
        $products->nome = $request->input("nome");
        $products->preco = $request->input("preco");
        $products->qty_disponivel = $request->input("qty_disponivel");
        $products->marca = $request->input("marca");

        try {
            if($products->save()){
                return response()->json([
                    "success"    =>  true,
                    "message"   =>  "Atualizado com sucesso",
                    "products"      =>  $products
                ]);
            }
        } catch (QueryException $e){
            return response()->json([
                "success"    =>  false,
                "message"   =>  $e->getMessage()
            ]);
        }
    }

    /**
     * @OA\Delete(
     * path="/api/produtcs/{id}",
     * summary="Delete produtos",
     * description="Delete produtos id",
     * @OA\Response(
     *    response=201,
     *    description="Delete produto"
     * )
     * Remover produto pelo id
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Products::find($id);
        if(!$products) {
            return response()->json([
                "success"    =>  false,
                "message"   => "id $id não foi encontrado",
            ], 404);
        }
        if($products->delete()){
            return response()->json([
                "success"    =>  true,
                "message" => "Product $id removido com sucesso"
            ]);
        }
    }
}
