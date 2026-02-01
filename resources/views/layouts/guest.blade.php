<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ANGGO') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-blue-50">
            
            <div class="mb-6 text-center">
                <a href="/" class="flex flex-col items-center gap-2 group">
                    <div class="w-16 h-16 bg-blue-900 text-yellow-500 rounded-2xl flex items-center justify-center shadow-lg transform group-hover:scale-110 transition duration-300">
                        <i class="fa-solid fa-van-shuttle text-3xl"></i>
                    </div>
                    <span class="text-2xl font-bold text-blue-900 tracking-wider mt-2">ANGGO</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-xl overflow-hidden sm:rounded-2xl border border-gray-100">
                {{ $slot }}
            </div>
            
            <div class="mt-8 text-center text-sm text-gray-400">
                &copy; {{ date('Y') }} Angkot Garut Online.
            </div>
        </div>
    </body>
</html>