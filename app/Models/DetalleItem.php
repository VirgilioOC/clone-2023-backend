<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleItem extends Model
{
    protected $table = "detalle_item";

    public function item()
    {
        return $this->belongsTo(Item::class, 'id_item', 'id');
    }

    use HasFactory;
}
