<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 *
 * @property $id_empresa
 * @property $nombre_empresa
 * @property $direccion
 * @property $telefono
 * @property $fecha_registro
 *
 * @property Contact[] $contacts
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Company extends Model
{
    protected $table = 'companies';
    protected $primaryKey = 'id_empresa';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre_empresa',
        'direccion',
        'telefono',
        'fecha_registro',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany(\App\Models\Contact::class, 'id_empresa', 'id_empresa');
    }
}