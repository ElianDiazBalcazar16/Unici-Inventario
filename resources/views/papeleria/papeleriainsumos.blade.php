@extends('layouts.app')

@section('content')

    <!-- Contenido principal -->
<div class="main-content">
    <section class="section"> 
        <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-bold text-gray-700">Departamentos</h1>
                <a href="#" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Añadir Departamento</a>
        </div>
        <!-- Formulario para agregar departamentos -->

        <!-- Tabla para listar departamentos -->
        <div class="overflow-x-auto">
                <table class="min-w-full border border-collapse border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2 text-sm font-semibold text-left text-gray-700 border border-gray-300">Producto</th>
                            <th class="px-4 py-2 text-sm font-semibold text-left text-gray-700 border border-gray-300">Entradas</th> 
                            <th class="px-4 py-2 text-sm font-semibold text-left text-gray-700 border border-gray-300">Salidas</th> 
                            <th class="px-4 py-2 text-sm font-semibold text-left text-gray-700 border border-gray-300">Cantidad</th> 
                            <th class="px-4 py-2 text-sm font-semibold text-left text-gray-700 border border-gray-300">unidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $Datos as $Dato )
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 text-sm text-gray-600 border border-gray-300">{{ $Dato['Codigo'] }}</td>
                                <td class="px-4 py-2 text-sm text-gray-600 border border-gray-300">{{ $Dato['total_entrada'] }}</td>
                                <td class="px-4 py-2 text-sm text-gray-600 border border-gray-300">{{ $Dato['total_salida']}}</td>
                                <td class="px-4 py-2 text-sm text-gray-600 border border-gray-300">{{ $Dato['saldo'] }}</td>    
                                <td class="px-4 py-2 text-sm text-gray-600 border border-gray-300">{{ $Dato['unidad'] }}</td>    
                            </tr>    
                        @endforeach
                    </tbody>
                </table>
        </div>
    </section>
</div>
@endsection
