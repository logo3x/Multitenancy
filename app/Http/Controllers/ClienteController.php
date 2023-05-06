<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Tenant;
use Illuminate\Http\Request;


/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class ClienteController extends Controller
{

    public function index()
    {

        $clientes = Cliente::paginate();

        return view('cliente.index', compact('clientes'))
            ->with('i', (request()->input('page', 1) - 1) * $clientes->perPage());
    }


   /*  public function create()
    {
        $cliente = new Cliente();
        return view('clientes.create', compact('cliente'));
    }


    public function store(Request $request)
    {
        request()->validate(Cliente::$rules);

        $cliente = Cliente::create($request->all());

        return redirect()->route('inquilinos.index')
            ->with('success', 'Cliente created successfully.');
    } */


    public function show($id)
    {
        $cliente = Cliente::find($id);

        $tenant=Tenant::find('foo');


        return view('cliente.show', compact('cliente'));
    }


    public function edit($id)
    {
        $cliente = Cliente::find($id);

        return view('cliente.edit', compact('cliente'));
    }


    public function update(Request $request, Cliente $cliente)
    {

        $request->validate([
            /* 'id' => 'required|unique:tenants,id,'.$cliente->id, */
            'empresa' => 'required',
            'contacto' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'plan' => 'required',

        ],
        [
            /* 'id.required' => 'Debe ingresar un dominio',
            'id.unique' => 'Ya se encuentra un dominio registrado con este nombre', */
            'empresa.required' => 'Debe ingresar un nombre de la empresa',
            'contacto.required' => 'Debe ingresar nombre de contacto',
            'telefono.required' => 'Debe ingresar un telefono',
            'email.required' => 'Debe ingresar un email',
            'plan.required' => 'Debe seleccionar un plan',
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
             'vencimiento' => $request['vencimiento'],
            'metodo_pago' => $request['metodo_pago'],
            'estado' =>   $request['estado']     ];

            $tenant=Tenant::find($request['dominio']);
            if ($request['estado']=='Inactiva'){
                $tenant->putDownForMaintenance([
                    'time'=> now(),
                    'message' => "Lo Sentimos su Aplicacion se encuentra en mantenimiento."
                ]);
            }
            if ($request['estado']=='Activa'){
                $tenant->update(['maintenance_mode' => null]);
            }

        //Actualizar Informacion del Cliente
        $cliente=Cliente::where('id_user','=',$request['id_user'])->update($data);

        //Actualizar Informacion del Inquilino
        $tenant=Tenant::where('id','=',$request['d_old']);

        return redirect()->route('inquilinos.index')
            ->with('success', 'Cliente Actualizado');
    }


    public function destroy($id)
    {
         $cliente = Cliente::find($id);
         $tenant=Tenant::find($cliente->dominio)->delete();
        $cliente->delete();






        return redirect()->route('inquilinos.index')
            ->with('success', 'Cliente y Dominio Eliminado');
    }
}
