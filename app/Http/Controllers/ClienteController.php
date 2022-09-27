<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; //Acrecentei
use App\Models\Cliente; //Acrecentei

class ClienteController extends Controller
{

    public function index()
    {
        return Cliente::all();
    }

    public function store(Request $request)
    {
        $request -> validate([
            'nome'=>'required',
            
    
        ]);
        return Cliente::create($request->all());
    }


    public function show($id)
    {
        return Cliente::findOrfail($id);
    }

    public function destroy($id)
    {
        $cliente= Cliente::find($id);
        $cliente->delete();
    }
    public function update(Request $request, $id)
    {
        $cliente= Cliente::findOrfail($id);
        $request->validate([
            'nome'=>'required',

        ]);
        $cliente->nome = $request->nome;
        $cliente->save();
        
        return $cliente;
      }

}

