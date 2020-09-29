<?php

namespace App\Http\Controllers;

use App\Vacante;
use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    
    public function show(Categoria $categoria)
    {
        $vacantes=Vacante::where('activa', true)->where('categoria_id', $categoria->id)->paginate(10);
        return view('categorias.show', compact('vacantes','categoria'));
    }

    
  
    
}
