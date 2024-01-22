<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Traits\HttpResponses;

/**
 * @OA\Schema(
 *     schema="Pedido",
 *         @OA\Property(
 *             property="id",
 *             type="integer",
 *             example=1,
 *         ),
 *         @OA\Property(
 *             property="importe",
 *             type="integer",
 *             example=4180,
 *         ),
 *         @OA\Property(
 *             property="direccion",
 *             type="string",
 *             example="Donado",
 *         ),
 *         @OA\Property(
 *             property="direccion_altura",
 *             type="integer",
 *             example=678,
 *         ),
 *         @OA\Property(
 *             property="estado",
 *             type="string",
 *             example="pendiente",
 *         ),
 *         @OA\Property(
 *             property="detalle_items",
 *             type="array",
 *             @OA\Items(
 *                 @OA\Property(
 *                     property="id",
 *                     type="integer",
 *                     example=2,
 *                 ),
 *                 @OA\Property(
 *                     property="tamaño",
 *                     type="string",
 *                     example="mediano",
 *                 ),
 *                 @OA\Property(
 *                     property="multiplicador_tamaño",
 *                     type="float",
 *                     example=0.8,
 *                 ),
 *                 @OA\Property(
 *                     property="item",
 *                     type="array",
 *                     @OA\Items(
 *                          @OA\Property(
*                               property="nombre",
*                               type="string",
*                               example="Coca-Cola",
*                           ),
*                           @OA\Property(
*                               property="precio",
*                               type="integer",
*                               example=600,
*                           ),
*                           @OA\Property(
*                               property="path_imagen",
*                               type="string",
*                               example="images/Coca-Cola.png",
*                           ),
*                           @OA\Property(
*                               property="tipo",
*                               type="array",
*                               @OA\Items(
*                                   @OA\Property(
*                                       property="etiqueta",
*                                       type="string",
*                                       example="bebida no alcoholica",
*                                   ),
*                               ),
*                           ),
*                       ),
*                   ),
*             ), 
*         ),
* )
* @OA\Schema(
*      schema="Cliente",
*           @OA\Property(
*              property="DNI",
*              type="integer",
*              example=42878752,
*           ),
*           @OA\Property(
*              property="nombre",
*              type="string",
*              example="Juan Cruz",
*           ),
*           @OA\Property(
*              property="apellido",
*              type="string",
*              example="Rossi",
*           ),
*           @OA\Property(
*              property="telefono",
*              type="string",
*              example="123456789",
*           ),
* )
* @OA\Schema(
*      schema="IDCliente",
*           @OA\Property(
*              property="DNI",
*              type="integer",
*              example=42878752,
*           ),
* )
*/
class APIClienteController extends Controller
{
    use HttpResponses;

    public function login(Request $request) {
        try{
            $jsonResponse = null;
            $request->validate(
                [
                    'DNI' => 'required|numeric|min:1|max:99999999',
                    'password' => 'required|string',
                ],
                [
                    'DNI.required' => 'El DNI no puede ser vacío.',
                    'DNI.numeric' => 'El DNI no tiene el formato adecuado.',
                    'DNI.min' => 'El DNI ingresado tiene que ser mayor que 0.',
                    'DNI.max' => 'El DNI ingresado es más extenso de lo permitido (8 dígitos).',

                    'password.required' => 'El password no puede ser vacío.',
                    'password.string' => 'El password no tiene el formato adecuado.',
                ]
            );

            if($this->usuarioValido($request)) {
                $client = Cliente::where('DNI', $request->DNI)->first();
    
                $jsonResponse = $this->success([
                    'client' => $client,
                    'token' => $client->createToken('Api token of '. $client->DNI)->plainTextToken
                ], 'Cliente logueado correctamente', 200);
            }
            else {
                $jsonResponse = $this->error('', 'DNI o contraseña incorrectos', 401);
            }

            return $jsonResponse;
        } catch(ValidationException $e){
            $errors = $e->validator->errors()->all();

            return $jsonResponse = $this->error('', ['errors' => $errors], 422);
        }
    }

    private function usuarioValido($request) {
        return Auth::guard('clients')->attempt([
            "DNI" => $request->DNI, 
            "password" => $request->password
        ]);
    }

    /**
     * @OA\Get(
     *     path="/clientes/{idCliente}/pedidos",
     *     tags={"Clientes"},
     *     description="Obtiene los pedidos de un cliente específico por su ID.",
     *     @OA\Parameter(
     *         name="idCliente",
     *         in="path",
     *         required=true,
     *         description="ID del cliente",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="pedido",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Pedido")
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Cliente no encontrado"
     *     )
     * )
     */
    public function pedidosCliente(Request $request){
        $cliente = $request->user();

        $pedidos = $cliente->pedidos;

        foreach($pedidos as $pedido){
            $pedido->detalleItems->toJson();
            $pedido->detalleItems->setHidden(['created_at', 'updated_at', 'pivot', 'id_item']);

            foreach($pedido->detalleItems as $detalle){
                $detalle->item->toJson();
                $detalle->item->setHidden(['created_at', 'updated_at', 'pivot', 'id', 'activo', 'tipo_id']);
                $detalle->item->tipo->toJson();
                $detalle->item->tipo->setHidden(['created_at', 'updated_at', 'id', 'activo']);
            }
        }

        $pedidos->setHidden(['created_at', 'updated_at', 'cliente_id']);

        return response()->json($pedidos);
    }

    /**
     * @OA\Post(
     *     path="/clientes",
     *     tags={"Clientes"},
     *     description="Registra un nuevo cliente.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Cliente",)
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Cliente registrado exitosamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", description="Mensaje de éxito", example="Cliente registrado de forma exitosa")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Error de validación",
     *         @OA\JsonContent(
     *             @OA\Property(property="errors", type="array", description="Lista de errores de validación", @OA\Items(type="string", example="El DNI no puede ser vacío."))
     *         )
     *     )
     * )
     */
    public function register(Request $request)
    {
        try{
            $request->validate([
                'DNI' => 'required | integer | unique:cliente,DNI',
                'nombre' => 'required | string | max:50',
                'apellido' => 'required | string | max:50',
                'telefono' => 'required | integer | min:10000 | max:9999999999',
                'password' => 'required|string',
            ], 
            [
                'DNI.required' => 'El DNI no puede ser vacío.',
                'DNI.integer' => 'El DNI no tiene el formato adecuado.',
                'DNI.unique' => 'Ya existe un cliente registrado con el DNI ingresado.',

                'nombre.required' => 'El nombre no puede ser vacío.',
                'nombre.string' => 'El nombre no tiene el formato adecuado.',
                'nombre.max' => 'El nombre ingresado es más extenso de lo permitido (50 caracteres).',

                'apellido.required' => 'El apellido no puede ser vacío.',
                'apellido.string' => 'El apellido no tiene el formato adecuado.',
                'apellido.max' => 'El apellido ingresado es más extenso de lo permitido (50 caracteres).',

                'telefono.required' => 'El telefono no puede ser vacío.',
                'telefono.string' => 'El telefono no tiene el formato adecuado.',
                'telefono.min' => 'El telefono ingresado no tiene una longitud suficiente o es negativo (5 digitos).',
                'telefono.max' => 'El telefono ingresado es más extenso de lo permitido (10 digitos).',

                'password.required' => 'El password no puede ser vacío.',
                'password.string' => 'El password no tiene el formato adecuado.',
            ]);

            $client = new Cliente();

            $client->DNI = $request->get('DNI');
            $client->nombre = $request->get('nombre');
            $client->apellido = $request->get('apellido');
            $client->telefono = $request->get('telefono');
            $client->password = Hash::make($request->get('password'));

            $client->save();
            
            return $jsonResponse = $this->success([
                'client' => $client,
                'token' => $client->createToken('API token of '. $client->DNI)->plainTextToken,
            ], 'Cliente registrado de forma exitosa', 201);
        }
        catch(ValidationException $e){
            $errors = $e->validator->errors()->all();

            return $jsonResponse = $this->error('', ['errors' => $errors], 422);
        }
    }

    public function logout(Request $request){
        $client = $request->user();
        
        $client->tokens()->delete();

        return $this->success([], "Sesion cerrada exitosamente", 200);
    }
}
