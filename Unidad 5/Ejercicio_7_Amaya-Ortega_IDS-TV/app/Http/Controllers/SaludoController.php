<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Controllers\Controller;

class SaludoController extends Controller
{
    public function saludar($nombre)
    {
        return view('saludo', ['nombre' => $nombre]);
    }
}
