<<<<<<< HEAD
@if ($message = Session::get('success'))
<footer class=container> <!-- Inicio pie -->
    <div class="d-flex align-items-md-center row border badge-info p-2 text-light" id=pie>
=======
<footer class=mt-auto> <!-- Inicio pie -->
    <div class="d-flex align-items-md-center row p-2 text-light" id=pie>
>>>>>>> f09a10bbe7623fa4eeb328d77ee2242ebcd87d94
        <div class="col text-md-start">
            <h5>Contactanos</h5>
            <p>
                Email: ejemplo@example.com<br>
                Teléfono: 0299 123 4567
            </p>
        </div>
        <div class="col text-center">
            <img src="{{ asset('img/isologo_uncoma_blanco_chico.png') }}" alt="Logo UNComa" style="max-height: 100px">
        </div>
        <div class="col text-md-end">
            <h5>Universidad Nacional del Comahue</h5>
            <p>
                Buenos Aires 1400<br>
                Neuquén Capital (8300),<br>
                Patagonia Argentina<br>
                Teléfono sede central: 0299 449-0300
            </p>
        </div>
    </div>
</footer> 
@endif<!-- Fin pie -->
