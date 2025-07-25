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

        <form action="{{ route('blog.update', ['id' => $blog->id]) }}" method="POST" class="space-y-6">
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
                <button type="submit"
                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Save</button>

                <a href="{{ route('blog.index') }}" class="text-sm text-gray-600 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>
