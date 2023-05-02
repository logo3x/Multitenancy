<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;

class ClienteApiController extends Controller
{
   
    public function index($email)
    {
        $id_user=User::where('email',$email)->first();
        $cliente=Cliente::where('id_user',$id_user->id)->get();
       // $cliente=Cliente::all();
        return $cliente;
    }

    public function show()
    {
        return response()->json([
            'message'=>'Informacion del Cliente'
                   ]);
    }

    public function update(Request $request)
    {
       /*  $request->validate([
            //'id' => 'required|unique:tenants,id,'.$cliente->id,
            'empresa' => 'required',
            'contacto' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'plan' => 'required',
            'metodo_pago' => 'required',
        ],
        [
            //'id.required' => 'Debe ingresar un dominio',
           // 'id.unique' => 'Ya se encuentra un dominio registrado con este nombre',
            'empresa.required' => 'Debe ingresar un nombre de la empresa',
            'contacto.required' => 'Debe ingresar nombre de contacto',
            'telefono.required' => 'Debe ingresar un telefono',
            'email.required' => 'Debe ingresar un email',
            'plan.required' => 'Debe seleccionar un plan',
        ]);

        $validated = $request->validate([
            'empresa' => 'required',
        ]);

        $data=[
            'dominio' => $request['dominio'],
            'id_user' => $request['id_user'],
            'empresa' => $request['empresa'],
            'contacto' => $request['contacto'],
            'telefono' => $request['telefono'],
            'telefono2' => $request['telefono2'],
            'direccion' => $request['direccion'],
            'email' => $request['email'],
            'nit' => $request['nit'],
            'actividad' => $request['actividad'],
            'plan' => $request['plan'],
            //'vencimiento' => '',
            'metodo_pago' => $request['metodo_pago'],
            'estado' =>   'Activa'     ];

            //Actualizar Informacion del Cliente
            $cliente=Cliente::where('id_user','=',$request['id_user'])->update($data);


            return response()->json([
                'message'=>'Cliente Actualizado',
                'datos' => [$data],
                //'errors' => $validated->errors()->all(),
                       ]);


*/
    }


  /*   public function destroy(string $id)
    {
        //
    } */
}
