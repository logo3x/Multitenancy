<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class SuscripcionController extends Controller
{
    public function suscripcion1(Cliente $cliente){
        return view('sucripciones.plan1',compact('cliente'));
    }
    public function suscripcion2(Cliente $cliente){
        return view('sucripciones.plan2',compact('cliente'));
    }
}
