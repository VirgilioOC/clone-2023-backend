<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\DetalleItem;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="API PedidosYa",
 *      description="Esta API puede usarse para obtener información sobre los items y tipos, también consultar pedidos propios y crear un pedido.",
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 * )
 *
 * @OA\Tag(
 *     name="Items",
 *     description="Listar los items comprables y mostrar detalle de un item."
 * )
 * @OA\Tag(
 *     name="Clientes",
 *     description="Consultar pedidos propios y almacenar el registro de nuevo usuario."
 * )
 * @OA\Tag(
 *     name="Tipos",
 *     description="Listar tipos y mostrar items en base a un tipo especificado."
 * )
 * @OA\Tag(
 *     name="Pedido",
 *     description="Crear pedido."
 * )
 * 
 * @OA\Schema(
 *      schema="Item",
 *          @OA\Property(
 *              property="current page",
 *              type="integer",
 *              example=1,
 *           ),
 *          @OA\Property(
 *              property="data",
 *              type="array",
 *              @OA\Items(
 *                 @OA\Property(
*                      property="id",
*                      type="integer",
*                      example=1,
*                  ),
*                  @OA\Property(
*                      property="nombre",
*                      type="string",
*                      example="Gomitas Mogul",
*                  ),
*                  @OA\Property(
*                      property="etiqueta",
*                      type="string",
*                      example="Snack",
*                  ),
*                  @OA\Property(
*                      property="precio",
*                      type="integer",
*                      example=140,
*                  ),
*                  @OA\Property(
*                      property="activo",
*                      type="boolean",
*                      example=TRUE,
*                  ),
*                  @OA\Property(
*                      property="path_imagen",
*                      type="string",
*                      example="images/Gomitas_Mogul.png",
*                  ),
 *              ),
 *           ),
 *           @OA\Property(
 *              property="first_page_url",
 *              type="string",
 *              example="http://digital-dynamos-laravel.vercel.app/rest/items?page=1",
 *           ),
 *           @OA\Property(
 *              property="from",
 *              type="integer",
 *              example=1,
 *           ),
 *           @OA\Property(
 *              property="last_page",
 *              type="integer",
 *              example=1,
 *           ),
 *           @OA\Property(
 *              property="last_page_url",
 *              type="string",
 *              example="http://digital-dynamos-laravel.vercel.app/rest/items?page=1",
 *           ),
 *           @OA\Property(
 *              property="links",
 *              type="array",
 *              @OA\Items(
 *                 @OA\Property(
*                      property="url",
*                      type="stringr",
*                      example="http://digital-dynamos-laravel.vercel.app/rest/items?page=1",
*                  ),
*                  @OA\Property(
*                      property="label",
*                      type="integer",
*                      example="1",
*                  ),
*                  @OA\Property(
*                      property="active",
*                      type="boolean",
*                      example=true,
*                  ),
 *              ),
 *           ),
 *           @OA\Property(
 *              property="next_page_url",
 *              type="string",
 *              example=null,
 *           ),
 *           @OA\Property(
 *              property="path",
 *              type="string",
 *              example="http://digital-dynamos-laravel.vercel.app/rest/items",
 *           ),
 *           @OA\Property(
 *              property="per_page",
 *              type="integer",
 *              example=10,
 *           ),
 *           @OA\Property(
 *              property="prev_page_url",
 *              type="string",
 *              example=null,
 *           ),
 *           @OA\Property(
 *              property="to",
 *              type="integer",
 *              example=1,
 *           ),
 *           @OA\Property(
 *              property="total",
 *              type="integer",
 *              example=1,
 *           ),
 * )
 * 
 * @OA\Schema(
 *      schema="DetalleItem",
 *           @OA\Property(
 *              property="nombre",
 *              type="string",
 *              example="Coca-Cola",
 *           ),
 *           @OA\Property(
 *              property="etiqueta",
 *              type="string",
 *              example="bebida no alcoholica",
 *           ),
 *           @OA\Property(
 *              property="tamaño",
 *              type="string",
 *              example="mediano",
 *           ),
 *           @OA\Property(
 *              property="coste",
 *              type="integer",
 *              example=600,
 *           ),
 *           @OA\Property(
 *              property="path_imagen",
 *              type="boolean",
 *              example="images/Coca-Cola.png",
 *           ),
 * )
 */
class APIItemController extends Controller
{
    /**
     * @OA\Get(
     *     path="/items",
     *     tags={"Items"},
     *     description="Obtiene una lista de todos los items activos.",
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa",
     *         @OA\JsonContent(
     *             ref="#/components/schemas/Item")
     *         )
     *     ),
     * )
     */
    public function index()
    {
        $items = Item::select('item.id', 'nombre', 'etiqueta', 'precio', 'item.activo', 'path_imagen')
                    ->leftJoin('tipo', function ($join) {
                        $join->on('item.tipo_id', '=', 'tipo.id');
                    })
                    ->where('item.activo', 1)
                    ->where('tipo.activo', 1)
                    ->orderBy('item.id')
                    ->paginate(10);

        $items->setHidden(['created_at', 'updated_at', 'pivot']);

        return response()->json($items);
    }

    /**
     * @OA\Get(
     *     path="/items/{id}",
     *     tags={"Items"},
     *     description="Obtiene los detalles de un item específico por su ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID del item",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/DetalleItem")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Item no encontrado"
     *     )
     * )
     */
    public function show(string $id)
    {
        if(Item::find($id) == null){
            return response('No es posible encontrar el item con id '.$id, 404);
        }

        $detallesItem = Item::selectRaw('detalle_item.id, nombre, etiqueta, tamaño, item.precio * detalle_item.multiplicador_tamaño AS coste, path_imagen')
                            ->leftJoin('tipo', function ($join) {
                                $join->on('item.tipo_id', '=', 'tipo.id');
                            })
                            ->leftJoin('detalle_item', function ($join) {
                                $join->on('item.id', '=', 'detalle_item.id_item');
                            })
                            ->where('item.id', $id)
                            ->get();

        $detallesItem->setHidden(['created_at', 'updated_at', 'pivot']);

        return response()->json($detallesItem);
    }
}
