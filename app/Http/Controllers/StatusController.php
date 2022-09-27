<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; //Acrecentei
use App\Models\Status; //Acrecentei

class StatusController extends Controller
{

    public function index()
    {
        return Status::all();
    }

    public function store(Request $request)
    {
        $request -> validate([
            'status'=>'status',
            
    
        ]);
        return Status::create($request->all());
    }


    public function show($id)
    {
        return Status::findOrfail($id);
    }

    public function destroy($id)
    {
        $status = Status::find($id);
        $status->delete();
    }
    public function update(Request $request, $id)
    {
        $status = Status::findOrfail($id);
        $request->validate([
            'status'=>'required',

        ]);
        $status->status = $request->status;
        $status->save();
        
        return $status;
      }

}
