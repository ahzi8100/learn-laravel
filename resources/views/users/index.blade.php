<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between w-full">
            <h1 class="text-6xl font-bold mb-4">Daftar user</h1>
        </div>

        <div class="overflow-x-auto rounded-lg shadow mb-5">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="px-6 py-4 font-medium text-gray-900">No</th>
                        <th class="px-6 py-4 font-medium text-gray-900">Name</th>
                        <th class="px-6 py-4 font-medium text-gray-900">Email</th>
                        <th class="w-1/6 px-6 py-4 font-medium text-gray-900">Phone</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4">
                                {{ ($users->currentpage() - 1) * $users->perpage() + $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">{{ $user->phone->phone_number ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        {{ $users->links() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
