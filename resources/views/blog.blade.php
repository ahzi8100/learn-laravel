<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between w-full">
            <h1 class="text-6xl font-bold mb-4">Daftar Blog</h1>

            <div class="flex space-x-3 items-center">
                <form method="GET" class="w-lg">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input name="title" type="search" id="default-search"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search Title..." value="{{ $title }}" />
                        <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>

                <a href="{{ route('blog.create') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create</a>
                <a href="{{ route('blogs.trash') }}"
                    class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800">Restore</a>
                <a href="{{ route('comment.index') }}"
                    class="text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-orange-600 dark:hover:bg-orange-700 focus:outline-none dark:focus:ring-orange-800">Manage
                    Comment</a>
                <a href="{{ route('tags.index') }}"
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Manage
                    Manage Tags</a>
                <a href="{{ route('logout') }}"
                    class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">
                    Logout</a>
            </div>
        </div>
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                {{ session('error') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-lg shadow mb-5">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="px-6 py-4 font-medium text-gray-900">No</th>
                        <th class="px-6 py-4 font-medium text-gray-900">Title</th>
                        <th class="px-6 py-4 font-medium text-gray-900">Tags</th>
                        <th class="px-6 py-4 font-medium text-gray-900">Status</th>
                        <th class="w-1/6 px-6 py-4 font-medium text-gray-900">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if ($blogss->count() == 0)
                        <tr>
                            <td colspan="4" class="text-center text-2xl py-6">No Data Found with
                                <strong>{{ $title }}</strong> keyword
                            </td>
                        </tr>
                    @endif

                    @foreach ($blogss as $blog)
                        <tr>
                            <td class="px-6 py-4">
                                {{ ($blogss->currentpage() - 1) * $blogss->perpage() + $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $blog->title }}</td>
                            <td class="px-6 py-4">
                                @foreach ($blog->tags as $tag)
                                    {{ $tag->name }}
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                @if ($blog->status == 'Active')
                                    <span
                                        class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                                        {{ $blog->status }}
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">
                                        {{ $blog->status }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-center space-x-2">
                                <a href="{{ route('blog.show', ['id' => $blog->id]) }}"
                                    class="inline-block px-3 py-1 text-green-600 border border-green-600 rounded hover:bg-green-600 hover:text-white transition">
                                    View
                                </a>
                                @can('update', $blog)
                                    <a href="{{ route('blog.edit', ['id' => $blog->id]) }}"
                                        class="inline-block px-3 py-1 text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white transition">
                                        Edit
                                    </a>
                                @endcan
                                @can('delete', $blog)
                                    <form action="{{ route('blogs.delete', ['id' => $blog->id]) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="confirm('Hapus data ini?')"
                                            class="inline px-3 py-1 text-red-600 border border-red-600 rounded hover:bg-red-600 hover:text-white transition">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        {{ $blogss->links() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
