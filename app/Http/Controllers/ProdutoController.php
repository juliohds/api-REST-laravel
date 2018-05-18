<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;

class ProdutoController extends Controller
{
    
    public function __construct(){
        header('Access-Control-Allow-Origin: *');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produto = Produto::all();
        return response()->json(['data'=>$produto, 'status'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $produto = Produto::create($dados);
        
        if($produto){
            return response()->json(['data'=>$produto, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Erro ao criar o produto', 'status'=>false]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);

        if($produto){
            return response()->json(['data'=>$produto, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Produto não foi encontrado', 'status'=>false]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        //busca
        $produto =  Produto::find($id);
        $dados = $request->all();
        //atualiza
        $produto->update($dados);
        
        if ($produto) {
            return response()->json(['data'=>$produto, 'status'=>true]);
        }else{
            return response()->json(['data'=>'Produto não foi editado', 'status'=>false]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();

        if ($produto) {
            return response()->json(['data'=>'Produto removido com sucesso', 'status'=>true]);
        }else{
            return response()->json(['data'=>'Produto não foi removido', 'status'=>false]);
        }
    }
}
