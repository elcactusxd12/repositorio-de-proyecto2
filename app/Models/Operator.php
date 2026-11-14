<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Operator
 *
 * @property $id_operador
 * @property $nombre_operador
 * @property $fecha_registro
 *
 * @property Contact[] $contacts
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Operator extends Model
{
    protected $table = 'operators';
    protected $primaryKey = 'id_operador';
    public $timestamps = false;
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_operador',
        'nombre_operador',
        'fecha_registro',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany(\App\Models\Contact::class, 'id_operador', 'id_operador');
    }
}