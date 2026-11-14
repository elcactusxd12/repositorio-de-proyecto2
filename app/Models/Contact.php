<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id_contacto';
    public $timestamps = false;
    protected $perPage = 20;

    protected $fillable = [
        'nombres',
        'apellidos',
        'id_empresa',
        'id_operador',
        'id_grupo',
        'telefono_movil',
        'telefono_casa',
        'correo',
        'descripcion_grupo',
        'fecha_cumpleanios',
        'observaciones',
        'fecha_registro',
    ];

    /**
     * Relación con la tabla companies (Empresa)
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'id_empresa', 'id_empresa');
    }

    /**
     * Relación con la tabla groups (Grupo)
     */
    public function group()
    {
        return $this->belongsTo(Group::class, 'id_grupo', 'id_grupo');
    }

    /**
     * Relación con la tabla operators (Operador)
     */
    public function operator()
    {
        return $this->belongsTo(Operator::class, 'id_operador', 'id_operador');
    }
}