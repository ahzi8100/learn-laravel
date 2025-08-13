<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Blog</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h1 class="text-2xl font-semibold text-gray-700 mb-6">Edit Blog</h1>

        <form action="{{ route('blog.update', ['id' => $blog->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PATCH')
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id='title' value="{{ $blog->title }}"
                    class="@error('title') border-red-300 @enderror mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-4 focus:ring-blue-500 focus:border-blue-500">
                @error('title')
                    <div class="mt-1 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea type="text" name="description" id='description'
                    class="@error('description') border-red-300 @enderror mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2  focus:ring-4 focus:ring-blue-500 focus:border-blue-500">{{ $blog->deskripsi }}</textarea>
                @error('description')
                    <div class="mt-1 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 bg-white">
                    <option value="Active" {{ $blog->status == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ $blog->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Tags</label>
                <ul
                    class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @foreach ($tags as $t)
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input id="checkbox-{{ $t->id }}" type="checkbox" value="{{ $t->id }}"
                                    name="tags[]" {{ $blog->tags->contains($t->id) ? 'checked' : '' }}
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="checkbox-{{ $t->id }}"
                                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $t->name }}</label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                    file</label>
                <input name="image"
                    class="px-4 py-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="file_input" type="file">
                @error('image')
                    <div class="mt-1 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Save</button>

                <a href="{{ route('blog.index') }}" class="text-sm text-gray-600 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>
