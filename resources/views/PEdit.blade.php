@extends('layouts.app')

@section('content')
    <!-- Contenido principal -->
<div class="main-content">
    <section class="section">
        <div class="flex-1 p-8">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-bold text-gray-700">Editar Dato</h1>
            </div>

            <!-- Tabla para listar departamentos -->
            <div class="overflow-x-auto">
                <form action="{{ route('EditCampus.up', ['id' => $Datos->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @foreach ($campos as $campo => $label)
                        <h2 class="px-4 py-2 text-sm font-semibold text-left text-gray-700 border border-gray-300">{{ $label }}</h2>
                        <input class="w-full px-4 py-2 mb-2 text-sm text-gray-600 border border-gray-300" 
                            name="{{ $campo }}" 
                            value="{{ $Datos->$campo }}"
                            type="text" 
                            >
                    @endforeach

                    <button class="w-full p-2"> Actualizar </button> 
                </form>

            </div>

        </div>
    </section>
</div>
         
@endsection
