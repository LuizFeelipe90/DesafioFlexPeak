<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $attributes = array( 'status' =>Status::PEDIDO_REALIZADO);

    protected $fillable = [
        'cliente_id',
    ];
}

abstract class Status
{
  const PEDIDO_REALIZADO = 'Pedido realizado';
  const PEDIDO_CONFIRMADO = 'Pedido confirmado';
  const PEDIDO_EM_CONFECCAO = 'Pedido em confecção';
  const PEDIDO_FINALIZADO = 'Pedido finalizado';
}
