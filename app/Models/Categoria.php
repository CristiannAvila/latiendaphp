<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;

    //exteder modelo para relacionar con producto
    public function productos(){
        // 1 categoria - M productos
        return $this->HasMany(Producto::class);
    }
}
