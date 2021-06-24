<?php

namespace App\Http\Controllers;

use App\Models\HojaResumen;
use App\Models\PlanEstudio;
use Illuminate\Http\Request;

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
    public function create($id_solicitud = 1)
    {
        # Generar el link de Ranquel
        $rendimientoAcademico = json_decode(file_get_contents(
            storage_path("app/id-solicitud-$id_solicitud/rendimientoAcademico$id_solicitud.json")
        ));

        $plan_anio = $rendimientoAcademico->Plan->Anio;
        $plan_nro = $rendimientoAcademico->Plan->Nro;
        $plan_anio_mod = $rendimientoAcademico->Plan->AnioMod;
        $plan_nro_mod = $rendimientoAcademico->Plan->ModOrd;
        $urlRanquel = "https://ranquel.uncoma.edu.ar/archivos/ord_$plan_nro".'_20'."$plan_anio"."_47.pdf";
        
        # Mostrar
        return view('planEstudio.create', [
            'id_solicitud' => $id_solicitud,
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
        $file_headers = @get_headers($request->urlRanquel);
        if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
            return back()->withErrors(['La url proporcionada no es válida.']);
        }
        
        # guardar en la base de datos
        $objPlanEstudio = PlanEstudio::create(['url_pdf_plan_estudio' => $request->urlRanquel]);

        # Actualizar tabla "hoja_resumen"
        $hojaResumen = HojaResumen::where('id_solicitud', '=', $request->id_solicitud)->firstOrFail();
        $hojaResumen->id_plan_estudio = $objPlanEstudio->id_plan_estudio;
        $hojaResumen->save();

        # Siguiente paso
        return view('notaDptoAlum.create', ['id_solicitud' => $request->id_solicitud]);
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
