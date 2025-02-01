@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
    
        <div class="container p-6 mx-auto">
            <h1 class="mb-6 text-2xl font-bold text-gray-800">Gestión de Usuarios</h1>

            <!-- Botón para agregar un nuevo usuario -->
            <div class="flex justify-end mb-4">
                <button id="addUserBtn" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Agregar Usuario</button>
            </div>

            <!-- Tabla de usuarios -->
            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Nombre</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Área</th>
                            <th class="px-4 py-2 border">Rol</th>
                            <th class="px-4 py-2 border">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Datos Estáticos -->
                        <tr>
                            <td class="px-4 py-2 border">1</td>
                            <td class="px-4 py-2 border">Juan Pérez</td>
                            <td class="px-4 py-2 border">juan@unici.edu</td>
                            <td class="px-4 py-2 border">Administración</td>
                            <td class="px-4 py-2 border">Administrador</td>
                            <td class="px-4 py-2 border">
                                <button class="px-2 py-1 text-white bg-yellow-400 rounded hover:bg-yellow-500" onclick="editUser(1)">Editar</button>
                                <button class="px-2 py-1 text-white bg-red-500 rounded hover:bg-red-600" onclick="deleteUser(1)">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border">2</td>
                            <td class="px-4 py-2 border">María López</td>
                            <td class="px-4 py-2 border">maria@unici.edu</td>
                            <td class="px-4 py-2 border">Laboratorios</td>
                            <td class="px-4 py-2 border">Usuario</td>
                            <td class="px-4 py-2 border">
                                <button class="px-2 py-1 text-white bg-yellow-400 rounded hover:bg-yellow-500" onclick="editUser(2)">Editar</button>
                                <button class="px-2 py-1 text-white bg-red-500 rounded hover:bg-red-600" onclick="deleteUser(2)">Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border">3</td>
                            <td class="px-4 py-2 border">Carlos Sánchez</td>
                            <td class="px-4 py-2 border">carlos@unici.edu</td>
                            <td class="px-4 py-2 border">Recursos Humanos</td>
                            <td class="px-4 py-2 border">Usuario</td>
                            <td class="px-4 py-2 border">
                                <button class="px-2 py-1 text-white bg-yellow-400 rounded hover:bg-yellow-500" onclick="editUser(3)">Editar</button>
                                <button class="px-2 py-1 text-white bg-red-500 rounded hover:bg-red-600" onclick="deleteUser(3)">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="userModal" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
            <div class="w-1/3 p-6 bg-white rounded-lg shadow-lg">
                <h2 id="modalTitle" class="mb-4 text-xl font-bold">Agregar Usuario</h2>
                <form id="userForm">
                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="w-full px-3 py-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="area" class="block text-gray-700">Área</label>
                        <select id="area" name="area" class="w-full px-3 py-2 border rounded">
                            <option value="Administración">Administración</option>
                            <option value="Laboratorios">Laboratorios</option>
                            <option value="Recursos Humanos">Recursos Humanos</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="rol" class="block text-gray-700">Rol</label>
                        <select id="rol" name="rol" class="w-full px-3 py-2 border rounded">
                            <option value="Administrador">Administrador</option>
                            <option value="Usuario">Usuario</option>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="cancelBtn" class="px-4 py-2 mr-2 text-white bg-gray-500 rounded hover:bg-gray-600">Cancelar</button>
                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Guardar</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
</div>

<script>

    document.getElementById('addUserBtn').addEventListener('click', function() {
        document.getElementById('modalTitle').innerText = 'Agregar Usuario';
        document.getElementById('userForm').reset();
        document.getElementById('userModal').classList.remove('hidden');
    });


    document.getElementById('cancelBtn').addEventListener('click', function() {
        document.getElementById('userModal').classList.add('hidden');
    });


    function editUser(id) {
        alert('Editar usuario con ID: ' + id);
        document.getElementById('modalTitle').innerText = 'Editar Usuario';
        document.getElementById('userModal').classList.remove('hidden');
    }


    function deleteUser(id) {
        if (confirm('¿Está seguro de eliminar el usuario con ID: ' + id + '?')) {
            alert('Usuario eliminado');
        }
    }
</script>
@endsection
