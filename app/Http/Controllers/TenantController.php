<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Tenant;
use Illuminate\Http\Request;

//agregamos el modelo de permisos de spatie
use Spatie\Permission\Models\Permission;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tenants.index',[
            'tenants' => Tenant::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'id' => 'required|unique:tenants'
        ],
        $messages = [
            'id.unique' => 'Nombre del cliente ya se encuentra registrado',
            'id.required' => 'Nombre de Cliente es requerido',
        ]);

        $tenant = Tenant::create($request->all());
        $tenant->domains()->create([
            'domain' => $request->get('id'). '.'. 'teamforcex.com.co',
        ]);




        return redirect(route('tenants.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
       return view('tenants.show',[
        'tenant' => $tenant
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        return view('tenants.edit',[
            'tenant' => $tenant
           ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        $request->validate([
            'id' => 'required|unique:tenants,id,'.$tenant->id,
        ]);
        $tenant->update([
            'id' => $request->get('id'),
        ]);
        $tenant->domains()->update([
            'domain' => $request->get('id'). '.'. 'teamforcex.com.co',
        ]);
        $dominiocliente=Cliente::where('dominio','=', $request->get('old_domain'));
        $dominiocliente->update(['dominio' => $request->get('id')]);

        return redirect(route('tenants.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {


        $cliente=Cliente::where('dominio','=',$tenant->id)->delete();


        $tenant->delete();
        return redirect(route('tenants.index'));
    }
}
