<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-sm p-6 bg-white rounded shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">🔐 Register</h2>

        @if (session('error'))
            <div class="p-4 mb-4 text-sm text-center text-red-800 rounded-lg bg-red-50">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('register.user') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="name" id="name" name="name" value="{{ old('name') }}" required autofocus
                    class="mt-1 py-4 px-2 block w-full rounded-lg border border-gray-300 shadow-sm ring-1 focus:ring-blue-200 focus:ring-opacity-50">
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                    class="mt-1 py-4 px-2 block w-full rounded-lg border border-gray-300 shadow-sm ring-1 focus:ring-blue-200 focus:ring-opacity-50">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}" required autofocus
                    class="mt-1 py-4 px-2 block w-full rounded-lg border border-gray-300 shadow-sm ring-1 focus:ring-blue-200 focus:ring-opacity-50">
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="pt-2">
                <button type="submit"
                    class="w-full px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Daftar</button>
            </div>
        </form>

        <div class="text-center mt-3">
            <p>Have an account? <a href="{{ route('login') }}" class="text-blue-500 underline">login Here!</a></p>
        </div>
    </div>
</body>

</html>
