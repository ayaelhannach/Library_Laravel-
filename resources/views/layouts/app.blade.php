<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bookList.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link href="{{ asset('css/usercrud.css') }}" rel="stylesheet">
    <link href="{{ asset('css/editbook.css') }}" rel="stylesheet">
    

</head>
<body>
    @include('partials.header')
   

    <main>
    
   
        @yield('content')
    </main>
    @include('partials.footer')
</body>
</html>
