@extends('layouts.app')

@section('content')
<!-- Contenido principal -->

<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header place-content-between">
                        <h4 class="">
                            Producto / Bien
                        </h4>
                        <div class="flex gap-2">
                            <input type="text" id="search"
                                class="w-40 px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-300"
                                placeholder="Buscar ..."
                            >
                            <button id="Mostrar"
                                class="flex items-center justify-center pl-1 pr-2 border border-gray-300 rounded-md h-9 hover:bg-gray-100">
                                <div class="flex items-center gap-1 align-middle">
                                    <svg class="w-6 h-6 text-gray-500" width="18" height="18" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    <p class="text-sm text-gray-600">Añadir</p>
                                </div>
                            </button> 
                        </div> 
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="inventoryTable">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Provedor</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<dialog id="dialog" class="top-10 py-5 z-50 min-w-[400px] px-5 rounded-lg bg-slate-300 border-2 border-sky-700" style="display: none;">
    <button id="cerrarDialogo" class="absolute px-3 py-1 font-bold rounded-full right-10 text-slate-200 bg-sky-700">
        X
    </button>
    <h3 class="pb-6 text-2xl font-bold text-center text-sky-700">
        Nuevo elemento
    </h3>
    <form action="{{ route('createBien') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex gap-8">
            <div>
                <h2 class="pl-2 mt-1 mb-1 font-semibold text-sky-800">
                    Codigo de producto
                </h2>
                <input type="text" name="Codigo" id="Codigo" class="px-1.5 py-1 rounded-lg border-2 border-sky-500">
                <h2 class="pl-2 mt-1 mb-1 font-semibold text-sky-800">
                    Proveedor
                </h2>
                <input type="text" name="Proveedor" id="Proveedor" class="px-1.5 py-1 rounded-lg border-2 border-sky-500">
            </div> 
        </div>
        <button id="addItemButton" class="w-full py-2 mt-4 font-semibold rounded-lg bg-sky-700 text-slate-200"> Cargar
            elemento </button>
    </form>
</dialog> 

<script>
    // Obtener el botón y el diálogo por su ID
        var boton = document.getElementById("Mostrar");
        var dialogo = document.getElementById("dialog");
    
        // Cuando se hace clic en el botón, mostrar el diálogo
        boton.addEventListener("click", function() {
            dialogo.style.display = "block";
        });
    
        // Cuando se hace clic en el botón de cerrar, ocultar el diálogo
        document.getElementById("cerrarDialogo").addEventListener("click", function() {
            dialogo.style.display = "none";
        });  
</script> 

<script>
    document.addEventListener('DOMContentLoaded', () => {
            const inventoryTable = document.getElementById('inventoryTable');
            const searchInput = document.getElementById('search');

            let inventory = [
                @foreach ($Datos as $Dato)
                {
                    id: {{ $Dato->id }}, 
                    Codigo: '{{ $Dato->Codigo }}',
                    Proveedor: '{{ $Dato->Proveedor }}', 
                },
                @endforeach
            ];
            
            const renderTable = () => {
                // Seleccionar el tbody de la tabla y limpiarlo
                const tbody = inventoryTable.querySelector('tbody');
                tbody.innerHTML = '';

                // Seleccionar el thead de la tabla y agregar los encabezados
                const thead = inventoryTable.querySelector('thead');
                if (!thead) {
                    const newThead = document.createElement('thead');
                    const headerRow = document.createElement('tr');
                    
                    tableHeaders.forEach(header => {
                        const th = document.createElement('th');
                        th.textContent = header;
                        headerRow.appendChild(th);
                    });
                    
                    newThead.appendChild(headerRow);
                    inventoryTable.insertBefore(newThead, tbody);
                }

                let filteredInventory = inventory;

                if (searchInput.value) {
                    filteredInventory = filteredInventory.filter(item => item.Nomecla.includes(searchInput.value));
                } 

                filteredInventory.forEach(item => {
                    const row = document.createElement('tr');
                    row.classList.add('hover:bg-gray-100');

                    row.innerHTML = `
                        <td class="px-4 py-2 text-sm text-gray-600 border border-gray-300">${item.Codigo}</td>
                        <td class="px-4 py-2 text-sm text-gray-600 border border-gray-300">${item.Proveedor}</td> 
                        
                        <td class="flex h-auto px-4 py-2 text-sm text-gray-600 border-t border-gray-300">
                            <a href="Bien/actualizarDato/${item.id}" class="btn btn-primary " tabindex="-1" role="button" aria-disabled="true">Editar</a>
                            <form class="grid h-full place-content-center" action="Bien/eliminarDato/${item.id}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    `;
                    
                    tbody.appendChild(row);
                });
            };

            searchInput.addEventListener('input', renderTable);

            renderTable();
        });
</script>

@endsection