<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\SolicitudCertProg;
//use App\Models\Usuario;
use App\Models\User;

class mailPetrel extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $datosMail;
    public $vista;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        // Recupero la solicitud
        
        $solicitud = SolicitudCertProg::findOrFail($id);
        //print("++++++++++");
        //print("Solicitud");
        //var_dump($solicitud);
        // Se genera una nueva instancia de SolicitudCertProg y se cargan los datos:
        $datosMail = new SolicitudCertProg;
        $datosMail->idSolicitud = $id;
        $datosMail->Nombre = $solicitud->usuarioEstudiante->name;
        $datosMail->Apellido = $solicitud->usuarioEstudiante->lastname;
        $datosMail->Legajo = $solicitud->legajo;
        $datosMail->Carrera = $solicitud->carrera->carrera;
        $datosMail->UniversidadDestino = $solicitud->universidad_destino;
        //$datosMail->NombreUserU = $solicitud->usuarioAdministrativo->nombre;

        // Se genera una nueva instancia de Usuario para obtener su correo electrÃ³nico
        $destinatario = new User; //new Usuario lo saque
        $destinatario = User::findOrFail($solicitud->id_usuario_estudiante); //si falla lo cmento
        $datosMail->correoUsuario = $destinatario->email; 
        //"agustin.cerda@est.fi.uncoma.edu.ar";

        //var_dump($datosMail);
        //print("CORREO");
        //print($destinatario->email);
        //print("FIN CORREO");
        //return view('emails/solicitud_iniciada', compact('datosMail'));
        $this->datosMail = $datosMail;
        //print($this->datosMail);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //print $vista;
        // return $this->view($vista);
        return $this->view($this->vista);
        
    }
}