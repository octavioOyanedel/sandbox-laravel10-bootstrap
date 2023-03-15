<?php

namespace App\Models;

use App\Models\Provincia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Distrito extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre'];

    /**
     * Obtenga las provincias para el distrito.
     */
    public function provincias(): HasMany
    {
        return $this->hasMany(Provincia::class);
    }
}
