<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; //Acrecentei
use App\Models\Item; //Acrecentei

class ItemController extends Controller
{

    public function index()
    {
        return Item::all();
    }

    public function store(Request $request)
    {
        $request -> validate([
            'descricao'=>'required',
            
    
        ]);
        return Item::create($request->all());
    }


    public function show($id)
    {
        return Item::findOrfail($id);
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
    }
    public function update(Request $request, $id)
    {
        $item = Item::findOrfail($id);
        $request->validate([
            'descricao'=>'required',

        ]);
        $item->descricao = $request->descricao;
        $item->save();
        
        return $item;
      }

}
