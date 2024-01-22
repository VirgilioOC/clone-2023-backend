<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;
use App\Models\Item;


/**
 * @OA\Schema(
 *      schema="Tipo",
 *           @OA\Property(
 *              property="id",
 *              type="integer",
 *              example=1,
 *           ),
 *           @OA\Property(
 *              property="etiqueta",
 *              type="string",
 *              example="Snack",
 *           ),
 *           @OA\Property(
 *              property="activo",
 *              type="boolean",
 *              example=TRUE,
 *           ),
 * )
 */
class APITipoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/tipos",
     *     tags={"Tipos"},
     *     description="Obtiene una lista de todos los tipos disponibles.",
     *     operationId="getTipos",
     *     tags={"Tipos"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de tipos obtenida correctamente",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Tipo")
     *         )
     *     )
     * )
     */
    public function index()
    {
        $tipos = Tipo::where('activo', 1)
                    ->orderBy('id')
                    ->get();

        $tipos->setHidden(['created_at', 'updated_at']);

        return response()->json($tipos);
    }

    /**
     * @OA\Get(
     *     path="/tipos/{id}",
     *     tags={"Tipos"},
     *     description="Obtiene una lista de items por tipo según su ID.",
     *     operationId="getItemsPorTipo",
     *     tags={"Tipos"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID del tipo",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Lista de items por tipo obtenida correctamente",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Item")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Tipo no encontrado"
     *     )
     * )
     */
    public function show(string $id)
    {
        if(Tipo::find($id) == null){
            return response('No es posible encontrar el tipo con id '.$id, 404);
        }

        $itemsPorTipo = Item::select('item.id', 'nombre', 'etiqueta', 'precio', 'path_imagen')
                            ->leftJoin('tipo', function ($join) {
                                $join->on('item.tipo_id', '=', 'tipo.id');
                            })
                            ->where('tipo_id', $id)
                            ->where('tipo.activo', 1)
                            ->orderBy('item.id')
                            ->paginate(10);

        $itemsPorTipo->setHidden(['created_at', 'updated_at']);

        return response()->json($itemsPorTipo);
    }
}
