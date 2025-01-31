@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Gestión de Usuarios</h1>

    <!-- Botón para agregar un nuevo usuario -->
    <div class="flex justify-end mb-4">
        <button id="addUserBtn" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Agregar Usuario</button>
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
                        <button class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500" onclick="editUser(1)">Editar</button>
                        <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" onclick="deleteUser(1)">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border">2</td>
                    <td class="px-4 py-2 border">María López</td>
                    <td class="px-4 py-2 border">maria@unici.edu</td>
                    <td class="px-4 py-2 border">Laboratorios</td>
                    <td class="px-4 py-2 border">Usuario</td>
                    <td class="px-4 py-2 border">
                        <button class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500" onclick="editUser(2)">Editar</button>
                        <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" onclick="deleteUser(2)">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td class="px-4 py-2 border">3</td>
                    <td class="px-4 py-2 border">Carlos Sánchez</td>
                    <td class="px-4 py-2 border">carlos@unici.edu</td>
                    <td class="px-4 py-2 border">Recursos Humanos</td>
                    <td class="px-4 py-2 border">Usuario</td>
                    <td class="px-4 py-2 border">
                        <button class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500" onclick="editUser(3)">Editar</button>
                        <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" onclick="deleteUser(3)">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div id="userModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
        <h2 id="modalTitle" class="text-xl font-bold mb-4">Agregar Usuario</h2>
        <form id="userForm">
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="area" class="block text-gray-700">Área</label>
                <select id="area" name="area" class="w-full border rounded px-3 py-2">
                    <option value="Administración">Administración</option>
                    <option value="Laboratorios">Laboratorios</option>
                    <option value="Recursos Humanos">Recursos Humanos</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="rol" class="block text-gray-700">Rol</label>
                <select id="rol" name="rol" class="w-full border rounded px-3 py-2">
                    <option value="Administrador">Administrador</option>
                    <option value="Usuario">Usuario</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="button" id="cancelBtn" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">Cancelar</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Guardar</button>
            </div>
        </form>
    </div>
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
