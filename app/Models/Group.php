<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Group
 *
 * @property $id_grupo
 * @property $nombre_grupo
 * @property $fecha_registro
 *
 * @property Contact[] $contacts
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Group extends Model
{
    protected $table = 'groups';
    protected $primaryKey = 'id_grupo'; // <--- ESTO SOLUCIONA EL ERROR CON groups.id
    public $timestamps = false;
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_grupo',
        'nombre_grupo',
        'fecha_registro',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany(\App\Models\Contact::class, 'id_grupo', 'id_grupo');
    }
}