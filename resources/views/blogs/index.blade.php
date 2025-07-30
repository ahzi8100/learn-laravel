<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="max-w-5xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">📝 Beranda Blog</h1>

        <div class="grid gap-6">
            @forelse ($blogs as $blog)
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h2 class="text-2xl font-semibold text-gray-800">{{ $blog->title }}</h2>
                    <p class="text-gray-600 mt-2">{{ Str::limit($blog->deskripsi, 100) }}</p>

                    <div class="mt-4 flex justify-between items-center">
                        <div class="flex gap-4">
                            <span class="inline-block px-3 py-1 text-sm rounded-full bg-green-100">
                                Penulis: {{ $blog->user->name }}
                            </span>
                            <span class="inline-block px-3 py-1 text-sm rounded-full bg-yellow-100">
                                Dibuat: {{ $blog->created_at->diffForHumans() }}
                            </span>
                        </div>

                        <a href="{{ route('blogs.detail', $blog->id) }}" class="text-blue-600 hover:underline font-medium">Lihat Detail →</a>
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-500">Belum ada artikel blog.</div>
            @endforelse
        </div>
    </div>
</body>

</html>
