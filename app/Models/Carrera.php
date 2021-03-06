<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UnidadAcademica;

class Carrera extends Model
{
    use HasFactory;
    
    protected $table = 'carrera';
    protected $primaryKey = 'id_carrera';
    protected $fillable = array('carrera', 'id_unidad_academica');

    protected $hidden = ['created_at', 'updated_at'];

    public function unidad_academica()
    {
        return $this->belongsTo(UnidadAcademica::class,'id_unidad_academica');
    }
    /*public function solicitud_cert_prog()
    {
        return $this->hasOne(SolicitudCertProg::class,'id_carrera');
    }*/
    public function carpeta_carrera()
    {
        return $this->hasMany(CarpetaCarrera::class,'id_carrera','id_carrera');
    }
}