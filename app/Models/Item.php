<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    protected $table = 'item';

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    public function detalles(): HasMany
    {
        return $this->hasMany(DetalleItem::class);
    }

    use HasFactory;
}
