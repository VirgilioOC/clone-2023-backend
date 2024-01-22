<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Cliente extends Authenticatable
{
    use HasApiTokens, HasFactory;
    protected $table = 'cliente';
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = [
        'DNI',
        'nombre',
        'apellido',
        'telefono',
        'password',
    ];

    public function pedidos(): HasMany
    {
        return $this->hasMany(Pedido::class, 'cliente_id');
    }

    use HasFactory;
}
