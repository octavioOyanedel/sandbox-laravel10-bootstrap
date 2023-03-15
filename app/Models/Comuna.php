<?php

namespace App\Models;

use App\Models\Provincia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comuna extends Model
{
    use HasFactory;

    protected $fillable = ['distrito_id', 'provincia_id', 'nombre'];

    /**
     * Obtener la provincia a la que pertenece la comuna.
     */
    public function provincia(): BelongsTo
    {
        return $this->belongsTo(Provincia::class);
    }
}
