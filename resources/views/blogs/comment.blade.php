<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manajemen Komentar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 py-10">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">📂Management Komentar Blog</h1>
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
        @endif
        <table class="w-full table-auto border border-gray-300">
            <thead class="bg-gray-100">
                <th class="px-4 py-2 border">No</th>
                <th class="px-4 py-2 border text-left">Nama</th>
                <th class="px-4 py-2 border text-left">Pesan</th>
                <th class="px-4 py-2 border text-left">Postingan</th>
                <th class="px-4 py-2 border text-left">Tanggal</th>
                <th class="px-4 py-2 border text-left">Aksi</th>
            </thead>
            <tbody>
                @forelse ($comments as $index => $comment)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $comment->commenter_name }}</td>
                        <td class="px-4 py-2 border">{{ Str::limit($comment->comment_text, 50) }}</td>
                        <td class="px-4 py-2 border text-blue-700">
                            <a href="{{ route('blogs.detail', $comment->blog_id) }}" target="_blank"
                                class="hover:underline">
                                {{ $comment->blog->title }}
                            </a>
                        </td>
                        <td class="px-4 py-2 border text-sm text-gray-600">
                            {{ $comment->created_at->format('d M Y H:i') }}
                        </td>
                        <td class="px-4 py2 border text-center">
                            <form action="{{ route('comment.destroy', $comment->id) }}" method='POST'
                                onsubmit="return confim('Yakin hapus komentar ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 py-4">Belum ada komentar.</td>
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
