<?php

namespace App\Models;

use App\Models\Comuna;
use App\Models\Distrito;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provincia extends Model
{
    use HasFactory;
    
    protected $fillable = ['distrito_id', 'nombre'];

    /**
     * Consigue las comunas del distrito.
     */
    public function comunas(): HasMany
    {
        return $this->hasMany(Comuna::class);
    }

    /**
     * Obtener el distrito que es dueño de la comuna.
     */
    public function distrito(): BelongsTo
    {
        return $this->belongsTo(Distrito::class);
    }
}
