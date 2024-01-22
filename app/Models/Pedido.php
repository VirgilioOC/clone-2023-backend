<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pedido extends Model
{
    protected $table = 'pedido';

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function detalleItems(): BelongsToMany
    {
        return $this->belongsToMany(DetalleItem::class, 'compone', 'codigo_pedido', 'id_detalle');
    }

    use HasFactory;
}
