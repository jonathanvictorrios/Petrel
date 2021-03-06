<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HojaResumenFinal extends Model
{
    use HasFactory;

    protected $table = 'hoja_resumen_final';
    protected $primaryKey = 'id_hoja_resumen';
    protected $fillable = array('id_nota_admin_central', 'url_hoja_unida_final_sin_firma', 'url_hoja_unida_final');

    protected $hidden = ['created_at', 'updated_at'];

    public function nota_admin_central()
    {
        return $this->belongsTo(NotaAdminCentral::class,'id_nota_admin_central','id_nota_admin_central');
    }

    public function firma()
    {
        return $this->belongsTo(Firma::class, 'id_firma', 'id_firma');
    }

    
}