<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;
use Validator;

class ProdutoController extends Controller
{

    public function index(){
        /*$produtos = Produto::find(1)->with('categoria')->get();
        print_r($produtos[0]['categoria']);
        print_r($produtos[0]);*/
        return view('produtos.index');
    }

    public function indexJson(){
        
        $produtos = Produto::all();
        return response()->json($produtos, 200);
    }


    public function create(){
        
        return view('produtos.create',[
            "current" => "categorias"
        ]);
    }


    public function store(Request $request){
        
        $produto = Produto::create($request->all());
        return response()->json($produto, 200);                
    }


    public function show($id){
        
    }


    public function edit($id){
        $produto = Produto::find($id);        
        if ($produto) {
            return response()->json($produto, 200);
        }
        return response()->json('Produto não encontrado', 404);
    }


    public function update(Request $request){
        $produto = Produto::find($request->id);
        if ($produto) {
            
            $validator = Validator::make($request->all()
            ,array(
                'nome'          => 'required',
                'preco'         => 'required',
                'quantidade'    => 'required',
                'categoria_id'  => 'required'
            ), array(
                'required'  => 'O atribudo :attribute é requerido.'
            ));
            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()], 200);
            }
            $produto->update($request->all());
            return response()->json($produto, 200);
        }
        return response()->json('Erro ao editar produto', 404);
    }

    public function destroy($id){

        $produto = Produto::find($id);
        if(!is_null($produto)){
            $produto = $produto->delete();
            return response()->json('Produto deletado com sucesso', 200); 
        }
        return response()->json('Erro ao deletar produto', 404);
    }
}
