<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;

class CategoriaController extends Controller
{

    public function index(){
        $categorias = Categoria::all();        
        return view('categorias.index',[
            "current" => "categorias",
            "categorias" => $categorias
        ]);
    }

    public function create(){
        
        return view('categorias.create',[
            "current" => "categorias"
        ]);
    }

    public function store(Request $request){        
        $request->validate(array(
            'name' => 'required'
        ), 
        array(
            'required'  => 'O atribudo :attribute é requerido.'
        ));
        Categoria::create($request->all());        
        return view('categorias.create',[
            "success" => 'Categoria cadastrada com sucesso.'
        ]);
    }

    public function show($id){
        
    }

    public function edit($id){
        $categoria = Categoria::find($id);
        if ($categoria) {            
            return view('categorias.create', [
                "current" => "categorias",
                'categoria' => $categoria
            ]);
        } else {
            return redirect('/categorias');
        }        
    }

    public function update(Request $request){
        $categoria = Categoria::find($request->id);
        if ($categoria) {
            /*$categoria->name = $request->input('name');
            $categoria->save();*/
            $categoria->update($request->all());
        }
        return redirect('/categorias');
        
    }

    public function destroy($id){
        Categoria::destroy($id);
        $categorias = Categoria::all();   
        return redirect('/categorias');
    }

    public function indexJson(){
        $categorias = Categoria::all();
        //return json_encode($categorias);
        return response()->json($categorias, 200);
    }
}
