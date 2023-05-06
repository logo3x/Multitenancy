<?php

namespace App\Http\Controllers;


use App\Models\Cliente;
use App\Models\Tenant;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function pay(Request $request,Cliente $cliente){


        $response = Http::get("https://api.mercadopago.com/v1/payments/$request->payment_id"."?access_token=".config('services.mercadopago.token'));
        $metodo_pago= $request->payment_type;
        $response=json_decode($response);
        $plan = $response->description;

        if(isset($response->error)){
            if($response->error == 'resource not found'){
                return redirect()->route('home.index')
                    ->with('success', 'Ocurrio un error.');
                }
        }
        $status= $response->status;

        if ($status == 'approved') {
            $cliente->plan= $plan ;
            $cliente->metodo_pago= $metodo_pago;
            if($plan=='Suscripcion_6Meses'){$cliente->vencimiento=date('Y-m-d H:i:s',strtotime(now()."+ 6 month"));}
            if($plan=='Suscripcion_12Meses'){$cliente->vencimiento=date('Y-m-d H:i:s',strtotime(now()."+ 12 month"));}
            $cliente->save();
            return redirect()->route('home.index')
            ->with('success', 'Se Actualizo su plan, Muchas gracias por Confiar en nosotros.');
        }

    }

    public function index()
    {
        $cliente = Cliente::where('id_user','=',auth()->user()->id)->get();
        //dd($cliente);
        return view('home', compact('cliente'));

    }

    public function store(Request $request)
    {


        $request->validate([
            'id' => 'required|unique:tenants',
            'empresa' => 'required',
            'contacto' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'plan' => 'required',

        ],
        [
            'id.required' => 'Debe ingresar un dominio',
            'id.unique' => 'Ya se encuentra un dominio registrado con este nombre',
            'empresa.required' => 'Debe ingresar un nombre de la empresa',
            'contacto.required' => 'Debe ingresar nombre de contacto',
            'telefono.required' => 'Debe ingresar un telefono',
            'email.required' => 'Debe ingresar un email',
            'plan.required' => 'Debe seleccionar un plan',
        ]);

        $data=[
            'dominio' => $request['id'],
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
            'creacion' => now(),
            'vencimiento' => date('Y-m-d H:i:s',strtotime(now()."+ 1 month")),
            'metodo_pago' => $request['metodo_pago'],
            'estado' =>   'Activa'     ];


        $cliente = Cliente::create($data);

        $tenant = Tenant::create($request->all());
        $tenant->domains()->create([
            'domain' => $request->get('id'). '.'. 'teamforcex.com.co',
        ]);



        return redirect()->route('home.index')
            ->with('success', 'Su Dominio ha sido Creado Satisfactoriamente.');
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('editCliente', compact('cliente'));
    }
    public function update(Request $request, Cliente $cliente, Tenant $tenant)
    {

        //dd($request->all());
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
            /* 'vencimiento' => '', */
            'metodo_pago' => $request['metodo_pago'],
            'estado' =>   'Activa'     ];



        //Actualizar Informacion del Cliente
        $cliente=Cliente::where('id_user','=',$request['id_user'])->update($data);

        //Actualizar Informacion del Inquilino
        $tenant=Tenant::where('id','=',$request['d_old']);
       /*  dd($tenant);
        $tenant->update([
            'id' => $request['id'],
        ]);
        $tenant->domains()->update([
            'domain' => $request['id']. '.'. 'teamforcex.com.co',
        ]);
 */
        return redirect()->route('home.index')
            ->with('success', 'Tu cuenta ha sido actualizada Satisfactoriamente');
    }

    public function destroy($id ,Tenant $tenant)
    {

        $cliente = Cliente::find($id);

        Tenant::find($cliente->dominio)->delete();


        //Tenant::where('id','=',$cliente->dominio)->delete();

        $cliente->delete();
        return redirect()->route('home.index')
            ->with('success', 'El Dominio se ha Eliminado de la Base de Datos');
    }



}
