@extends('estructura.layout')
@section('cuerpo')
        <section class=" home">
            <header>
                <nav class="navbar navbar-expand-md navbar-light ">
                    <!-- Inicio encabezado -->
                    <div class="container-fluid">
                        <!-- Comienzo contenedor -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MenuSuperior"
                            aria-controls="MenuSuperior" aria-expanded="false" aria-label="Menú superior">
                            <span class="navbar-toggler-icon"></span>
                        </button> <!-- Fin botón desplegable en pantallas chicas-->

                        <div class="collapse navbar-collapse justify-content-end" id="MenuSuperior">
                            <!-- Comienzo contenido menú -->

                            <div class="d-flex align-items-end p-3">

                                <!-- Comienzo contenido a la derecha -->
                                <ul class="navbar-nav me-auto ">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#pregfrecuentes">Preguntas frecuentes</a>
                                    </li>
                                    <li class="nav-item">
                                        <!-- trigger modal -->
                                        <a class="nav-link" href="#" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">Acceder</a>
                                    </li>
                                    <li class="nav-item">

                                        <a class="nav-link" href="{{'register'}}">Registrarse</a>

                                    </li>
                                </ul>
                            </div> <!-- Fin contenido a la derecha -->
                        </div> <!-- Fin contenido desplegable en pantallas chicas -->

                    </div> <!-- Fin contenedor -->
                </nav> <!-- Fin encabezado -->
            </header>
            
                {{-- comienzo 1era.fila con tres columnas --}}
                <div id="home" class="row">
                    <div class="col-4 p-5">
                        <img src="{{ asset('img/icono_petrel.ico') }}" alt="Icono Petrel" style="min-height: 400px"> 
                    </div>
                    <div class="col-8  mt-5 ps-5">
                        <h1 class="titulohome p-3">Petrel</h1>
                        <p class="p_home ps-3">El sistema de certificación de materias <br> de la Universidad Nacional del Comahue</p>
                    </div>
                        <!-- Modal -->
                        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Accedé a tu cuenta</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid px-1 py-5 mx-auto">
                                            <div class="row d-flex justify-content-center">
                                            <div class="col">
                                            <div class="card card-form">                                        
                                                @include('auth.login')
                                                @yield('login')   
                                        </div></div></div></div>                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> <!-- Fin primera fila -->
                {{-- segunda fila titulo preguntas --}}
                <div class="row">
                    <h4 class="tituloPregFrec text-center">Preguntas Frecuentes</h4>
                </div>
                {{-- fin modal --}}
            </div>
        </div> <!-- Fin primera fila -->
        {{-- tercera fila icono a preguntas frecuentes --}}
        <div class="row">
            <a class="nav-link vermasicono text-center" href="#pregfrecuentes"><i class="fas fa-angle-down"></i></a>
        </div>
</section>
{{-- 4ta fila acordeon preguntas frecuentes dividida en 2 columnas --}}
<div class="row pregfrecuentes p-2 bg-light">
    <a name="pregfrecuentes"></a>
    <div class="col-6  p-4 ">
        <div class="accordion accordion-flush px-3" id="accordionFlushExample">
            <div class="accordion-item row border-bottom border-top-0 border-3 border-success mb-5">
                <div class="col-10 pt-3">
                    <h2 class="accordion-header botonacordeon ps-3" id="flush-headingOne">
                        ¿Qué necesito para iniciar una solicitud? </h2>
                </div>
        </section>
        {{-- 4ta fila acordeon preguntas frecuentes dividida en 2 columnas --}}
               <div class="row pregfrecuentes  p-2 bg-light">
                <a name="pregfrecuentes"></a>
                   <div class="col-6 ">
                    <div class="accordion accordion-flush p-5" id="accordionFlushExample">
                        <div class="accordion-item row mb-1">
                        <div class="col-10 ">
                            <button class="botonacordeon" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <h6 class="accordion-header pt-2 ps-3">
                                ¿Qué necesito para iniciar una solicitud? </h6>
                            </button> 
                        </div>
                        <div class="col-2 ">
                            <button class="botonacordeon ver" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <i class="fas fa-plus-square "></i>
                            </button> 
                            {{-- <button class="botonacordeon cerrar" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <i class="fas fa-minus-square "></i>
                            </button> --}}
                        </div>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Architecto
                                error labore, delectus iste culpa iusto neque sequi aliquam nobis, aspernatur ratione voluptatem
                                illo rem eius ipsam? Fuga dolore quia ducimus.
                            </div>
                        </div>
                   </div>
                </div>
            </div>
                  
            <div class="col-6 ">
                <div class="accordion accordion-flush p-5" id="accordionFlushExample">
                    <div class="accordion-item row mb-1">
                    <div class="col-10 ">
                        <button class="botonacordeon" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <h6 class="accordion-header pt-2 ps-3">
                            Recibí el mail. ¿Cómo descargo mi certificado? </h6>
                        </button> 
                    </div>
                    <div class="col-2 ">
                        <button class="botonacordeon ver" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <i class="fas fa-plus-square "></i>
                        </button> 
                                    {{-- <button class="botonacordeon cerrar" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <i class="fas fa-minus-square "></i>
                            </button> --}}
                    </div>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Architecto
                            error labore, delectus iste culpa iusto neque sequi aliquam nobis, aspernatur ratione voluptatem
                            illo rem eius ipsam? Fuga dolore quia ducimus.
                        </div>
                    </div>
               </div>
            </div>
        </div>
        </div>    
                <div class="row pregfrecuentes p-2 bg-light">
                    <div class="col-6">
                        <div class="accordion accordion-flush p-5" id="accordionFlushExample">
                            <div class="accordion-item row mb-1">
                            <div class="col-10">
                                <button class="botonacordeon" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                <h6 class="accordion-header pt-2 ps-3">
                                    ¿Cómo puedo consultar el estado de mi solicitud?</h6>
                                </button> 
                            </div>
                            <div class="col-2 ">
                                <button class="botonacordeon ver" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                <i class="fas fa-plus-square "></i>
                                </button> 
                                            {{-- <button class="botonacordeon cerrar" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                <i class="fas fa-minus-square "></i>
                            </button> --}}
                            </div>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Architecto
                                    error labore, delectus iste culpa iusto neque sequi aliquam nobis, aspernatur ratione voluptatem
                                    illo rem eius ipsam? Fuga dolore quia ducimus.
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="accordion accordion-flush p-5" id="accordionFlushExample">
                        <div class="accordion-item row mb-1">
                        <div class="col-10">
                            <button class="botonacordeon" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            <h6 class="accordion-header pt-2 ps-3">
                                ¿Cuánto se demora en finalizar mi solicitud?  </h6>
                            </button> 
                        </div>
                        <div class="col-2">
                            <button class="botonacordeon ver" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            <i class="fas fa-plus-square "></i>
                            </button> 
                                        {{-- <button class="botonacordeon cerrar" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                <i class="fas fa-minus-square "></i>
                            </button> --}}
                        </div>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Architecto
                                error labore, delectus iste culpa iusto neque sequi aliquam nobis, aspernatur ratione voluptatem
                                illo rem eius ipsam? Fuga dolore quia ducimus.
                            </div>
                        </div>
                   </div>
                </div>
            </div>
                </div> 
            @endsection
