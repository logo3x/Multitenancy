<?php

namespace App\Http\Controllers\Clientes;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Home extends Controller
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
        $email = User::find(1)->pluck('email');
        $url=  env('APP_URL').'api/cliente/'.$email[0];
        $response = Http::get($url)->json();
        $cliente =$response[0];





        return view('clientes.home',compact('cliente'));
    }
}
