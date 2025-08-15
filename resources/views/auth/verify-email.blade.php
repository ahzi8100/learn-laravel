<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Email Dikirim</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md text-center">
        <h1 class="text-xl font-bold mb-2">Verifikasi Email Dikirim</h1>
        <p class="text-gray-600 mb-4">
            Link verifikasi telah kami kirim ke email anda. Silahkan periksa kotak masuk atau folder spam di email anda.
        </p>

        <form action="{{ route('verification.send') }}" method="POST" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            @csrf
            <button type="submit">Kirim Ulang Verifikasi Email</button>
        </form>
    </div>
</body>

</html>
