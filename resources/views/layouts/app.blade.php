<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task List</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style type='text/tailwindcss'>
        main{
            @apply m-auto w-6/12 mt-10;
        }

        h1{
            @apply mb-7 text-2xl;
        }

        .taskLink{
            @apply text-blue-600 leading-relaxed;
        }

        .link{
            @apply font-bold text-blue-700 underline;
        }

        .btn{
            @apply border border-black p-1.5 rounded-lg;
        }
    </style>
</head>
<body>

    <main>
        <h1>@yield('title')</h1>

        @if (session()->has('success'))
            <div>{{session('success')}}</div>
        @endif

        <div class='mt-5'>@yield('content')</div>
    </main>
    
    
</body>
</html>