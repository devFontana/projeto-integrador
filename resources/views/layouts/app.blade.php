<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Locação de Salas</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
    <link href="{{ asset('fullcalendar/fullcalendar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
</head>
<body>
    @guest
        <div class="bg-img">@yield('content')</div>
    @else   
        @include('includes.navbar')
        <div class="container-fluid">
            <div class="row">
                @include('includes.sidebar')
                <div id="conteudo" class="col-md-10">
                    @yield('content')
                </div>
            </div>
        </div>
    @endguest
    

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/locale/pt-br.js></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="{{ asset('fullcalendar/fullcalendar.js') }}"></script>
    <script src="{{ asset('fullcalendar/locales/pt-br.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('script')
</body>
</html>
