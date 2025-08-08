<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manajemen Tag</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 py-10">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">📂Management Tag Blog</h1>
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
        @endif
        <table class="w-full table-auto border border-gray-300">
            <thead class="bg-gray-100">
                <th class="px-4 py-2 border">No</th>
                <th class="px-4 py-2 border text-left">Nama</th>
                <th class="px-4 py-2 border text-left">Jumlah Blog</th>
                <th class="px-4 py-2 border text-left">Judul Blog Terkait</th>
            </thead>
            <tbody>
                @forelse ($tags as $index => $tag)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border font-semibold">{{ $tag->name }}</td>
                        <td class="px-4 py-2 border">{{ $tag->blogs->count() }}</td>
                        <td class="px-4 py-2 borde">
                            @foreach ($tag->blogs as $blog)
                                <span
                                    class="inline-block bg-gray-200 px-2 py-1 text-xs rounded mr-1 mb-1">{{ $blog->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-gray-500 py-4">Belum ada tag yang tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-5">
            <a href="{{ route('blog.index') }}"
                class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700 transition">
                Kembali
            </a>
        </div>
    </div>
</body>

</html>
