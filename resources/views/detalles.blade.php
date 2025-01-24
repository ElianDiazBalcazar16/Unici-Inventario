@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="mb-6 text-2xl font-bold text-gray-800">Detalle del Ítem del Inventario</h1>
    <div class="flex flex-wrap gap-6 bg-white p-6 rounded-lg shadow-lg">
        <!-- Imagen del Ítem -->
        <div class="w-full md:w-1/3">
            <img src="https://via.placeholder.com/300" alt="Imagen del Ítem" class="rounded-lg shadow-md">
        </div>

        <!-- Información del Ítem -->
        <div class="w-full md:w-2/3">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h2 class="text-gray-600 font-semibold">Código QR:</h2>
                    <p class="text-gray-800 font-bold">{{ $item['codigo_qr'] }}</p>
                </div>
                <div>
                    <h2 class="text-gray-600 font-semibold">Clave del Inventario:</h2>
                    <p class="text-gray-800 font-bold">{{ $item['clave_inventario'] }}</p>
                </div>
                <div>
                    <h2 class="text-gray-600 font-semibold">Campus:</h2>
                    <p class="text-gray-800 font-bold">{{ $item['campus'] }}</p>
                </div>
                <div>
                    <h2 class="text-gray-600 font-semibold">Área:</h2>
                    <p class="text-gray-800 font-bold">{{ $item['area'] }}</p>
                </div>
                <div>
                    <h2 class="text-gray-600 font-semibold">Responsable del Bien:</h2>
                    <p class="text-gray-800 font-bold">{{ $item['responsable'] }}</p>
                </div>
                <div>
                    <h2 class="text-gray-600 font-semibold">Nombre del Bien:</h2>
                    <p class="text-gray-800 font-bold">{{ $item['nombre'] }}</p>
                </div>
                <div class="col-span-2">
                    <h2 class="text-gray-600 font-semibold">Descripción:</h2>
                    <p class="text-gray-800">{{ $item['descripcion'] }}</p>
                </div>
                <div>
                    <h2 class="text-gray-600 font-semibold">Marca:</h2>
                    <p class="text-gray-800 font-bold">{{ $item['marca'] }}</p>
                </div>
                <div>
                    <h2 class="text-gray-600 font-semibold">Modelo:</h2>
                    <p class="text-gray-800 font-bold">{{ $item['modelo'] }}</p>
                </div>
                <div>
                    <h2 class="text-gray-600 font-semibold">Número de Serie:</h2>
                    <p class="text-gray-800 font-bold">{{ $item['numero_serie'] }}</p>
                </div>
                <div>
                    <h2 class="text-gray-600 font-semibold">Estado:</h2>
                    <p class="text-gray-800 font-bold">{{ $item['estado'] }}</p>
                </div>
                <div>
                    <h2 class="text-gray-600 font-semibold">Fecha de Adquisición:</h2>
                    <p class="text-gray-800 font-bold">{{ $item['fecha_adquisicion'] }}</p>
                </div>
                <div>
                    <h2 class="text-gray-600 font-semibold">Precio:</h2>
                    <p class="text-gray-800 font-bold">{{ $item['precio'] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
