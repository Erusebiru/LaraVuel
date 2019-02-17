<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use DB;

class ProyectosController extends Controller
{
    public function index(){
        return view('app');
    }

    public function showProyect(){
        return view('proyectos.show');
    }

    public function getSingleProyect($id){
        $proyecto = Proyecto::with('PO','SM')->findOrFail($id);
        return response()
        ->json(['proyecto' => $proyecto]);
    }

    public function getProyectos(){
        $proyectos = Proyecto::with('PO','SM')->get();
        return response()
            ->json(['proyectos' => $proyectos]);
    }

    public function getUsers(){
        $users = User::simplePaginate(2);

        $response = [
            'pagination' => [
                'total' => $posts->total(),
                'per_page' => $posts->perPage(),
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'from' => $posts->firstItem(),
                'to' => $posts->lastItem()
            ],
            'data' => $users
        ];

        return response()->json($response);
    }
}
