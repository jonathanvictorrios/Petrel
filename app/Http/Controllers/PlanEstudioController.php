<?php

namespace App\Http\Controllers;

use App\Models\HojaResumen;
use App\Models\PlanEstudio;
use App\Models\SolicitudCertProg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlanEstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearPlan($id_solicitud)
    {
        # Generar el link de Ranquel
        $rendimientoAcademico = json_decode(file_get_contents(
            storage_path("app/id-solicitud-$id_solicitud/rendimientoAcademico$id_solicitud.json")
        ));

        // Ordenanza original
        if (isset($rendimientoAcademico->Plan->Anio)) $plan_anio = $rendimientoAcademico->Plan->Anio;
        if (isset($rendimientoAcademico->Plan->Nro)) $plan_nro = $rendimientoAcademico->Plan->Nro;
        // Ordenanza modificada
        if (isset($rendimientoAcademico->Plan->AnioMod)) $plan_anio_mod = $rendimientoAcademico->Plan->AnioMod;
        if (isset($rendimientoAcademico->Plan->ModOrd)) $plan_nro_mod = $rendimientoAcademico->Plan->ModOrd;

        $urlRanquel = [
            "https://ranquel.uncoma.edu.ar/archivos/ord_$plan_nro"."_20$plan_anio"."_23.pdf",
            "https://ranquel.uncoma.edu.ar/archivos/ord_$plan_nro_mod"."_$plan_anio_mod"."_47.pdf"
        ];
        $objSolicitud=SolicitudCertProg::find($id_solicitud);
        # Mostrar
        return view('planEstudio.create', [
            'solicitud' => $objSolicitud,
            'url_ranquel' => $urlRanquel,
            'plan_anio' => $plan_anio,
            'plan_anio_mod' => $plan_anio_mod,
            'plan_nro' => $plan_nro,
            'plan_nro_mod' => $plan_nro_mod,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # checkear si la url es válida
        foreach($request->urlRanquel as $i => $url) {
            $file_headers = @get_headers($url);
            if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                return back()->withErrors(["La url proporcionada N°$i no es válida"]);
            }
        }
        # guardar archivo de forma local
        $nombreArchivo = "id-solicitud-$request->id_solicitud/planEstudio$request->id_solicitud.pdf";
        $contenido     = file_get_contents($request->urlRanquel[0]);
        Storage::put($nombreArchivo, $contenido);
        # guardar en la base de datos
        $objPlanEstudio = PlanEstudio::create(['url_pdf_plan_estudio' => $request->urlRanquel[0]]);

        # Actualizar tabla "hoja_resumen"
        $hojaResumen = HojaResumen::where('id_solicitud', '=', $request->id_solicitud)->firstOrFail();
        $hojaResumen->id_plan_estudio = $objPlanEstudio->id_plan_estudio;
        $hojaResumen->save();
        
        # Siguiente paso
        return redirect()->back()->withSuccess('La información se guardo correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlanEstudio  $planEstudio
     * @return \Illuminate\Http\Response
     */
    public function show(PlanEstudio $planEstudio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlanEstudio  $planEstudio
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanEstudio $planEstudio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlanEstudio  $planEstudio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanEstudio $planEstudio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlanEstudio  $planEstudio
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanEstudio $planEstudio)
    {
        //
    }
}