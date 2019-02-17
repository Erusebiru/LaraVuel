<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use DB;

class ProyectosController extends Controller
{
    public function index(){
        return view('proyectos.index');
    }

    public function showProyect(){
        return view('proyectos.show');
    }

    public function getSingleProyect($id){
        $proyecto = Proyecto::findOrFail($id);
        return response()
            ->json(['proyecto' => $proyecto]);
    }

    public function getProyectos(){
        $proyectos = Proyecto::with('PO','SM')->get();
        return response()
            ->json(['proyectos' => $proyectos]);
    }
}
