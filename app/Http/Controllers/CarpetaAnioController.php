<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarpetaAnioRequest;
use App\Models\CarpetaAnio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarpetaAnioController extends Controller
{
    /**
     * realizamos la vista de las carpetas años que existen
     * @return view carpetaAnio.index
     */
    public function index()
    {
        $carpetaAnio = CarpetaAnio::get();
        return view('carpetaAnio.index')->with('colCarpetasAnio',$carpetaAnio);
    }

    /**
     * Obtenemos la solicitud para crear una nueva carpeta año
     * @param Request $request datos del formulario
     * @return view carpetaAnio.show
     */
    public function store(StoreCarpetaAnioRequest $request)
    {
        Storage::disk('google')->makeDirectory($request->anio);
        $colCarpetasAnio = Storage::disk('google')->directories();//leemos todas las url donde se creo la carpeta
        $i=0;
        $encontrado = false;
        while($i<count($colCarpetasAnio) && !$encontrado){
            //comparamos cada url si le pertenece a la carpeta agregada recientemente
            $encontrado = Storage::disk('google')->getMetadata($colCarpetasAnio[$i])['name']==$request->anio;
            $i++;
        }
        $urlCarpeta = $colCarpetasAnio[($i-1)];//obtenemos la posicion de la url de le pertenece a la carpeta recien creada
        CarpetaAnio::create([
            'numero_anio' =>(int)$request->anio,
            'url_anio' => $urlCarpeta,
        ]);
        return view('carpetaAnio.index');
    }

    /**
     * Solo redirigimos al usuario para que vaya al formulario para crear la carpeta
     * @return view carpetaAnio.create
     */
    public function create()
    {
        return view('carpetaAnio.create');
    }

    /**
     * solo mostramos los datos de la carpeta año
     * @param int $idCarpetaAnio
     * @return view carpetaAnio.show
     */
    /* public function show($idCarpetaAnio)
    {
        $carpeta = CarpetaAnio::find($idCarpetaAnio);
        return view('carpetaAnio.show')->with('carpetaAnio',$carpeta);
    }*/

    /**
     * actualizamos el nombre de la carpeta
     * @param Request $request
     * @return view carpetaAnio.show
     */
    public function update(Request $request)
    {
        $carpetaAnio = CarpetaAnio::find($request->id_carpeta_anio);
        $carpetaAnio->numero_anio =$request->anio;
        $carpetaAnio->save();
        return view('carpetaAnio.index');
    }

    /**
     * Realizamos un borrado logico a la carpeta año
     * @param Request $request 
     * @return view carpetaAnio.index
     */
    public function destroy(StoreCarpetaAnioRequest $request)
    {
        echo "borrado logico sobre carpeta año";
    }

    /**
     * cargamos con el id la carpeta año y lo volcamos en el formulario
     * para realizar los cambios necesario
     * @param int $idCarpetaAnio
     * @return view carpetaAnio.edit
     */
    public function edit($idCarpetaAnio)
    {
        $carpeta=CarpetaAnio::find($idCarpetaAnio);
        return view('carpetaAnio.edit')->with('carpetaAnio',$carpeta);
    }

    /**
     * cada carpeta año se encarga de crear sus carpetas carreras
     * @param int $idCarpetaAnio
     * @return view carpetaCarrera.create
     */
    public function crearCarpetaCarrera($idCarpetaAnio)
    {
        $carpeta = CarpetaAnio::find($idCarpetaAnio);
        return view('carpetaCarrera.create')->with('carpetaAnio',$carpeta);
    }

    /**
     * listamos las carpetas que pertenecen a la carpeta
     * @param int $idCarpetaAnio
     * @return view carpetaAnio.listarCarreras
     */
    public function buscarCarreras($idCarpetaAnio)
    {
        $carpeta=CarpetaAnio::find($idCarpetaAnio);
        return view('carpetaAnio.listarCarreras')->with('carpetaAnio',$carpeta);
    }
}
