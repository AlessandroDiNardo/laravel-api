<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Styles -->
    @vite('resources/js/app.js')

    <title>Laravel Movie Api</title>
</head>
<body class="bg-dark">
    
   <div class="container-fluid bg-dark">
        @include('components.header')
        @yield('content')   
   </div> 

</body>
</html>