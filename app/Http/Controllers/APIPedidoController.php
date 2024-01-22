<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;

/**
 * @OA\Schema(
 *      schema="CreacionPedido",
 *           @OA\Property(
 *              property="id",
 *              type="integer",
 *              example=69,
 *           ),
 *           @OA\Property(
 *              property="importe",
 *              type="integer",
 *              example=1200,
 *           ),
 *           @OA\Property(
 *              property="direccion",
 *              type="string",
 *              example="Berutti",
 *           ),
 *           @OA\Property(
 *              property="direccion_altura",
 *              type="integer",
 *              example=273,
 *           ),
 *           @OA\Property(
 *              property="detalle_items",
 *              type="array",
 *              @OA\Items(
 *                 @OA\Property(
 *                     property="id",
 *                     type="integer",
 *                     example=2,
 *                 ),
 *              ),
 *           ),
 * )
 */
class APIPedidoController extends Controller
{
    public function chequeoDatosPedidoCliente(Request $request) {
        try{
            $request->validate([
                'direccion' => 'required | string | max:30',
                'direccion_altura' => 'required | integer | min:1 | max:99999',
                'detalle_items' => 'required | array | min:1'
            ],
            [
                'direccion.required' => 'La direccion no puede ser vacia.',
                'direccion.string' => 'La direccion no tiene el formato adecuado.',
                'direccion.max' => 'La direccion ingresada es más extensa de lo permitido (30 caracteres).',

                'direccion_altura.required' => 'La altura no puede ser vacia.',
                'direccion_altura.integer' => 'La altura no tiene el formato adecuado.',
                'direccion_altura.min' => 'La altura tiene que ser mayor que 0.',
                'direccion_altura.max' => 'La altura ingresada es más extensa de lo permitido (5 dígitos).',

                'detalle_items.required' => 'Los detalles no puede ser vacios.',
                'detalle_items.array' => 'Los detalles tienen que estar en formato de arreglo.',
                'detalle_items.min' => 'Debe haber al menos un detalle de item.'
            ]);

            return response()->json(null, 201);
        }
        catch(ValidationException $e){
            $errors = $e->validator->errors()->all();

            return response()->json(['errors' => $errors], 422);
        }
    }

    /**
     * @OA\Post(
     *     path="/pedidos",
     *     tags={"Pedido"},
     *     description="Crea un nuevo pedido.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CreacionPedido",)
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Pedido realizado correctamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", description="Mensaje de éxito", example="Pedido realizado correctamente")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error de validación",
     *         @OA\JsonContent(
     *             @OA\Property(property="errors", type="array", description="Lista de errores de validación", @OA\Items(type="string", example="Los detalles tienen que estar en formato de arreglo."))
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        try{
            $pedido = new Pedido();

            $client = $request->user();
            $pedido->cliente_id = $client->id;
            $pedido->importe = $request->get('importe');
            $pedido->direccion = $request->get('direccion');
            $pedido->direccion_altura = $request->get('direccion_altura');
            $pedido->estado = 'pendiente';

            $pedido->save();

            $detalle_items = $request->input('detalle_items');

            foreach($detalle_items as $detalle){
                $pedido->detalleItems()->attach($detalle['id']);
            }

            return response()->json(['message' => 'Pedido realizado correctamente'], 201);
        }
        catch(ValidationException $e){
            $errors = $e->validator->errors()->all();

            return response()->json(['errors' => $errors], 422);
        }
    }
}
