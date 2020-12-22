<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        {{-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> --}}
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.x/dist/alpine.min.js" defer></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


      @livewireStyles


        <style>
            body {
                font-family: 'Nunito';
                margin: 20px;
            }
        </style>
    </head>
    <body >
          <livewire:counter />
          <livewire:contact-form />
           <livewire:search-dropdown/>
           <livewire:paginate-table/>
          @livewireScripts

    </body>
</html>
