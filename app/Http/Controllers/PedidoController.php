<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; //Acrecentei
use App\Models\Pedido; //Acrecentei

class PedidoController extends Controller
{

    public function index()
    {
        return Pedido::all();
    }

    public function store(Request $request)
    {
        $request -> validate([
            'cliente_id'=>'required',
            
    
        ]);
        return Pedido::create($request->all());
    }


    public function show($id)
    {
        return Pedido::findOrfail($id);
    }

    public function destroy($id)
    {
        $pedido = Pedido::find($id);
        $pedido->delete();
    }
    public function addItemsToPedido(Pedido $pedido, array $fields)
    {
        $pedido->itens()->detach();

        foreach ($fields['items'] as $key => $value) {
            PedidosItems::create([
                'pedido_id' => $pedido->id,
                'item_id' => $value['id'],
                'quantidade' => $value['quantidade']
            ]);
        }
    }

    public function register(Request $request)
    {
        $pedido = Pedido::create(['cliente_id' => 1]);

        error_log('pre validate');

        $request->validate([
            'items.*.id' => 'required',
            'items.*.quantidade' => 'required'
        ]);

        error_log('post validate');

        $fields = $request->all();

        $this->addItemsToPedido($pedido, $fields);
    }

    public function edit(Request $request, $id)
    {
        $pedido = Pedido::findOrfail($id);

        $request->validate([
            'items.*.id' => 'required',
            'items.*.quantidade' => 'required'
        ]);

        $fields = $request->all();

        $this->addItemsToPedido($pedido, $fields);
    }




}
abstract class Status
{
  const PEDIDO_REALIZADO = 'Pedido realizado';
  const PEDIDO_CONFIRMADO = 'Pedido confirmado';
  const PEDIDO_EM_CONFECCAO = 'Pedido em confeccao';
  const PEDIDO_FINALIZADO = 'Pedido finalizado';
}
