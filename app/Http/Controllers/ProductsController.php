<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products",
     *     description="Get list products",
     *     @OA\Parameter(
     *          name="buscar",
     *          in="query",
     *          required=false,
     *          description="Get list products like buscar",
     *          @OA\Schema(
     *              type="string"
     *          ),
     *     ),
     *     @OA\Response(response="default", description="Get list products")
     * )
     * Buscar produtos
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
        ],200);
    }

    /**
     * @OA\Post(
     *     path="/api/products",
     *     description="Add products",
     *     @OA\Parameter(
     *          name="codigo",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *     ),
     *     @OA\Parameter(
     *          name="nome",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *     ),
     *     @OA\Parameter(
     *          name="preco",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *     ),
     *     @OA\Parameter(
     *          name="qty_disponivel",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *     ),
     *     @OA\Parameter(
     *          name="marca",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *     ),
     *     @OA\Response(response="default", description="Add products")
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
            ],404);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/products/{id}",
     *     description="Get list products igual id",
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="Get list products igual id",
     *          @OA\Schema(
     *              type="integer"
     *          ),
     *     ),
     *     @OA\Response(response="default", description="Get list products id")
     * )
     * Buscar produtos id
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
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
        ], 201);
    }

    /**
     * @OA\Put(
     *     path="/api/products/{id}",
     *     description="Update products",
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="Pul product igual id",
     *          @OA\Schema(
     *              type="integer"
     *          ),
     *     ),
     *     @OA\Parameter(
     *          name="codigo",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          ),
     *     ),
     *     @OA\Parameter(
     *          name="nome",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *     ),
     *     @OA\Parameter(
     *          name="preco",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          ),
     *     ),
     *     @OA\Parameter(
     *          name="qty_disponivel",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          ),
     *     ),
     *     @OA\Parameter(
     *          name="marca",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *     ),
     *     @OA\Response(response="default", description="Update product")
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
                ],201);
            }
        } catch (QueryException $e){
            return response()->json([
                "success"    =>  false,
                "message"   =>  $e->getMessage()
            ],404);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/products/{id}",
     *     description="Delete product igual id",
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="Delete product igual id",
     *          @OA\Schema(
     *              type="integer"
     *          ),
     *     ),
     *     @OA\Response(response="default", description="Delete product igual id")
     * )
     * Buscar produtos id
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
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
            ], 201);
        }
    }
}
