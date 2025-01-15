<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Form</title>
    @vite('resources/css/app.css', 'resources/js/app.js')    
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Dynamic Form</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="/dynamic-form" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="border-gray-300 rounded-md shadow-sm mt-1 block w-full" value="{{ old('name') }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="border-gray-300 rounded-md shadow-sm mt-1 block w-full" value="{{ old('email') }}" required>
            </div>

            <div class="mb-4">
                <label for="role" class="block text-gray-700">Role</label>
                <select name="role" id="role" class="border-gray-300 rounded-md shadow-sm mt-1 block w-full">
                    <option value="">Select Role</option>
                    <option value="User" {{ old('role') == 'User' ? 'selected' : '' }}>User</option>
                    <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div class="mb-4" id="access-level-container" style="display: none;">
                <label for="access_level" class="block text-gray-700">Access Level</label>
                <input type="text" name="access_level" id="access_level" class="border-gray-300 rounded-md shadow-sm mt-1 block w-full" value="{{ old('access_level') }}">
            </div>

            <button type="submit" class="bg-blue-500 text-white rounded-md px-4 py-2">Submit</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#role').change(function() {
                if ($(this).val() == 'Admin') {
                    $('#access-level-container').show();
                } else {
                    $('#access-level-container').hide();
                }
            }).trigger('change');
        });
    </script>
   
</body>
</html>
