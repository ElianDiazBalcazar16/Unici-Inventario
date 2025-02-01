@extends('layouts.app')

@section('content')

    <div class="flex-1 p-6">
        <div class="main-content">
        <h1 class="mb-6 text-3xl font-bold text-gray-700">INICIO</h1>
      <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Inventario General</h4>
              </div>
              <div class="card-body">
                567
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Souvenirs</h4>
              </div>
              <div class="card-body">
                320
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Entrada de souvenir</h4>
              </div>
              <div class="card-body">
                120
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Salida de souvenir</h4>
              </div>
              <div class="card-body">
                200
              </div>
            </div>
          </div>
        </div>                  
      </div>
      
        <!-- Graphs Section -->
        <div class="grid grid-cols-2 gap-4">
            <!-- Inventario General Chart -->
            <div class="p-4 bg-white rounded-lg shadow">
                <h3 class="mb-4 text-xl font-bold text-gray-700">Inventario General</h3>
                <canvas id="inventoryChart"></canvas>
            </div>
            <!-- Insumos Chart -->
            <div class="p-4 bg-white rounded-lg shadow">
                <h3 class="mb-4 text-xl font-bold text-gray-700">Souvenirs</h3>
                <canvas id="suppliesChart"></canvas>
            </div>
        </div>

        <!-- Recent Data Section -->
        <div class="grid grid-cols-2 gap-4 mt-8">
            <!-- Últimos movimientos -->
            <div class="p-4 bg-white rounded-lg shadow">
                <h3 class="mb-4 text-xl font-bold text-gray-700">Últimos Movimientos</h3>
                <table class="w-full text-left table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-gray-600">Area</th>
                            <th class="px-4 py-2 text-gray-600">Producto</th>
                            <th class="px-4 py-2 text-gray-600">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2">Administración</td>
                            <td class="px-4 py-2">Computadoras</td>
                            <td class="px-4 py-2">2</td>
                        </tr>
                        <!-- Añadir más filas dinámicas -->
                    </tbody>
                </table>
            </div>
            <!-- Alertas de inventario -->
            <div class="p-4 bg-white rounded-lg shadow">
                <h3 class="mb-4 text-xl font-bold text-gray-700">Alertas de Inventario</h3>
                <ul>
                    <li class="py-2 text-gray-700">Televisiones: <span class="font-bold text-red-600">Bajo Stock</span></li>
                    <li class="py-2 text-gray-700">Tóner: <span class="font-bold text-yellow-600">Por reabastecer</span></li>
                    <li class="py-2 text-gray-700">Escritorios: <span class="font-bold text-green-600">Suficiente</span></li>
                </ul>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Inventario General Chart
    const inventoryData = {
      labels: ['Mobiliario y equipo', 'Equipo de proyección', 'Equipo de cómputo', 'Equipo menor', 'Dispositivos de comunicación', 'Dispositivos de audio', 'Televisiones'],
        datasets: [{
            data: [150, 120, 80, 95, 30, 45, 47],
            backgroundColor: [
              'rgba(5, 40, 100, 0.9)',  
              'rgba(255, 120, 0, 0.8)', 
              'rgba(5, 40, 100, 0.9)',  
              'rgba(255, 120, 0, 0.8)', 
               'rgba(5, 40, 100, 0.9)',  
               'rgba(255, 120, 0, 0.8)',
              'rgba(5, 40, 100, 0.9)'
            ],
        }]
    };
    const inventoryConfig = {
        type: 'pie',
        data: inventoryData,
        options: { responsive: true }
    };
    new Chart(document.getElementById('inventoryChart'), inventoryConfig);

    // Insumos Chart
    const suppliesData = {
        labels: ['Entradas', 'Salidas'],
        datasets: [{
            label: 'Distribución de Souvenir',
            data: [120, 200, 300, 100],
            backgroundColor: [
                'rgba(75, 192, 192, 0.7)',
                'rgba(255, 159, 64, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(201, 203, 207, 0.7)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(201, 203, 207, 1)'
            ],
            borderWidth: 1
        }]
    };
    const suppliesConfig = {
        type: 'bar',
        data: suppliesData,
        options: { responsive: true }
    };
    new Chart(document.getElementById('suppliesChart'), suppliesConfig);
</script> 




@endsection
