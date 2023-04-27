<?php

namespace App\Http\Controllers;


use App\Models\Cliente;
use App\Models\Tenant;
use Illuminate\Http\Request;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cliente = Cliente::where('id_user','=',auth()->user()->id)->get();
        //dd($cliente);
        return view('home', compact('cliente'));

    }

    public function store(Request $request)
    {

//dd($request['dominio']);
        $request->validate([
            'id' => 'required|unique:tenants',
            'empresa' => 'required',
            'contacto' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'plan' => 'required',
            'metodo_pago' => 'required',
        ],
        [
            'dominio.required' => 'Debe ingresar un dominio',
            'dominio.unique' => 'Ya se encuentra un dominio registrado con este nombre',
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
            'metodo_pago' => $request['metodo_pago'],
            'estado' =>   'Activa'     ];


        $cliente = Cliente::create($data);

        $tenant = Tenant::create($request->all());
        $tenant->domains()->create([
            'domain' => $request->get('id'). '.'. 'teamforcex.com.co',
        ]);



        return redirect()->route('home.index')
            ->with('success', 'Cliente created successfully.');
    }


}
