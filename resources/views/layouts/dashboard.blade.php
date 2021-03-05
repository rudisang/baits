<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Cattle Biider App</title>
    <style>
        body{
            background-color: #F3F4F6;
        }
    </style>
</head>
<body>
   <header>
       <x-dashboard-nav />
       @yield('breadcrumb')
   </header>

   <main>
       @yield('content')
   </main>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>