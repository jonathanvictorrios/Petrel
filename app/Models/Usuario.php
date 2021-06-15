<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Usuario extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $fillable = array('nombre', 'apellido', 'legajo', 'email');

    protected $hidden = ['created_at', 'updated_at'];

    public function solicitudesCertProg()
    {
        return $this->hasMany(SolicitudCertProg::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Rol::class);
    }
}