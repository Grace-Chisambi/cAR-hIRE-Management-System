@extends('layouts.admin')
@section('content')

    <title>Staff Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/5 bg-white h-screen shadow-md">
            <div class="p-4">
                <div class="flex items-center">
                    <div class="bg-green-500 p-2 rounded-full">
                        <i class="fas fa-users text-white"></i>
                    </div>
                    <span class="ml-2 text-xl font-bold">Staff</span>
                </div>
            </div>
            <nav class="mt-10">
                <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200 flex items-center" href="{{ route('admin.index') }}">
                    <i class="fas fa-home mr-2"></i> Home
                </a>
                <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200 flex items-center" href="{{ route('staff.index') }}">
                    <i class="fas fa-users mr-2"></i> Staff
                </a>
                <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-200 flex items-center" href="{{ route('customer.index') }}">
                    <i class="fas fa-user-friends mr-2"></i> Customers
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="w-4/5 p-6">
            <h1 class="text-2xl font-bold mb-6">Staff Management</h1>

            <button onclick="openModal('addStaffModal')" class="bg-green-500 text-white px-4 py-2 rounded mb-4">Add Staff</button>

            <!-- Staff Table -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-2 px-4">ID</th>
                            <th class="py-2 px-4">Name</th>
                            <th class="py-2 px-4">Email</th>
                            <th class="py-2 px-4">Role</th>
                            <th class="py-2 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staff as $member)
                        <tr>
                            <td>{{ $member->id }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->role }}</td>
                            <td class="flex space-x-2">
                                <button onclick="openEditModal('{{ $member->id }}')" class="bg-blue-500 text-white px-2 py-1 rounded">Edit</button>
                                <form action="{{ route('staff.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Staff Modal -->
    <div id="addStaffModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-xl font-bold mb-4">Add Staff</h2>
            <form action="{{ route('staff.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">name</label>
                    <input type="text" name="name" class="border border-gray-300 rounded px-4 py-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">email</label>
                    <input type="email" name="email" class="border border-gray-300 rounded px-4 py-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">role</label>
                    <select name="role" class="border border-gray-300 rounded px-4 py-2 w-full">
                        <option value="admin">Admin</option>
                        <option value="CEO">CEO</option>
                        <option value="inventory_manager">Inventory Manager</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeModal('addStaffModal')" class="px-4 py-2 rounded bg-gray-500 text-white">Cancel</button>
                    <button type="submit" class="px-4 py-2 rounded bg-green-500 text-white">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Staff Modal -->
    <div id="editStaffModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-xl font-bold mb-4">Edit Staff</h2>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id">
                <div class="mb-4">
                    <label class="block text-gray-700">name</label>
                    <input type="text" name="name" class="border border-gray-300 rounded px-4 py-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">email</label>
                    <input type="email" name="email" class="border border-gray-300 rounded px-4 py-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">role</label>
                    <select name="role" class="border border-gray-300 rounded px-4 py-2 w-full">
                        <option value="admin">Admin</option>
                        <option value="CEO">CEO</option>
                        <option value="inventory_manager">Inventory Manager</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeModal('editStaffModal')" class="px-4 py-2 rounded bg-gray-500 text-white">Cancel</button>
                    <button type="submit" class="px-4 py-2 rounded bg-blue-500 text-white">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        function openEditModal(id) {
            fetch(`/staff/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.querySelector('#editForm').action = `/staff/${id}`;
                    document.querySelector('[name="name"]').value = data.name;
                    document.querySelector('[name="email"]').value = data.email;
                    document.querySelector('[name="role"]').value = data.role;
                    openModal('editStaffModal');
                })
                .catch(error => console.error('Error fetching staff data:', error));
        }
    </script>
</body>
</html>
@endsection
