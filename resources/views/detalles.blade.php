@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <h2 class="p-4 text-2xl font-semibold text-black">Vista detallada</h2>
        <div class="p-3 mx-2 mb-2 bg-white border-2 rounded-lg border-slate-300" >
            <p class="text-base font-medium text-black">Codigo de barras</p>
            <h1 class="mb-2">{{ $Datos->CodigoDeBarras }}</h1>
            <p class="text-base font-medium text-black">Codigo</p>
            <h1 class="mb-2">{{ $Datos->IdNomenclatura }}</h1>
            <p class="text-base font-medium text-black">Campus</p>
            <h1 class="mb-2">{{ $Datos->Campus }}</h1>
            <p class="text-base font-medium text-black">Area</p>
            <h1 class="mb-2">{{ $Datos->Area }}</h1>
            <p class="text-base font-medium text-black">Responsable del area</p>
            <h1 class="mb-2">{{ $Datos->ResponsableArea }}</h1>
            <p class="text-base font-medium text-black">Bien</p>
            <h1 class="mb-2">{{ $Datos->Bien }}</h1>
            <p class="text-base font-medium text-black">Responsable del Bien</p>
            <h1 class="mb-2">{{ $Datos->ResponsableBien }}</h1>
            <p class="text-base font-medium text-black">Marca</p>
            <h1 class="mb-2">{{ $Datos->Marca }}</h1>
            <p class="text-base font-medium text-black">Modelo</p>
            <h1 class="mb-2">{{ $Datos->Modelo }}</h1>
            <p class="text-base font-medium text-black">Color</p>
            <h1 class="mb-2">{{ $Datos->Color }}</h1>
            <p class="text-base font-medium text-black">Numero de serie</p>
            <h1 class="mb-2">{{ $Datos->NumSerie }}</h1>
            <p class="text-base font-medium text-black">Numero de SAT</p>
            <h1 class="mb-2">{{ $Datos->Sat }}</h1>
            <p class="text-base font-medium text-black">Fecha</p>
            <h1 class="mb-2">{{ $Datos->Fecha }}</h1>
            <p class="text-base font-medium text-black">Precio de compra</p>
            <h1 class="mb-2">{{ $Datos->Precio }}</h1>
            <p class="text-base font-medium text-black">Codigo Fiscal</p>
            <h1 class="mb-2">{{ $Datos->CodigoCFiscal }}</h1>
            <p class="text-base font-medium text-black">Estado actual</p>
            <h1 class="mb-2">{{ $Datos->Estado }}</h1>
            <p class="text-base font-medium text-black">Descripcion</p>
            <h1 class="mb-2">{{ $Datos->Descripcion }}</h1>
            <p class="text-base font-medium text-black">observaciones</p>
            <h1 class="mb-2">{{ $Datos->Observaciones }}</h1>
            <p class="text-base font-medium text-black">Factura</p>
            <h1 class="mb-2">{{ $Datos->Factura }}</h1>
            <p class="text-base font-medium text-black">Imagen</p>
            @if (isset($Datos->Imagen) && $Datos->Imagen)
                <img src="{{ $Datos->Imagen }}" alt="Imagen del Inventario" style="max-width: 100%; height: auto;">
            @else
                <p>No hay imagen disponible</p>
            @endif
            <p class="text-base font-medium text-black">Cantidad</p>
            <h1 class="mb-2">{{ $Datos->Cantidad }}</h1>
            <p class="text-base font-medium text-black">unidad de medida</p>
            <h1 class="mb-2">{{ $Datos->Medida }}</h1>
        </div>
    </section>
</div>

@endsection
