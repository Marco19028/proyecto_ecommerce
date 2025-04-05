<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Etiqueta extends Model
{
    protected $fillable = ['nombre'];

    public function productos(): BelongsToMany
    {
        return $this->belongsToMany(Producto::class, 'etiqueta_producto');
    }
}
