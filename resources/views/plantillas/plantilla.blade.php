<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>@yield('title')</title>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
    </head>
    <body>
        <div class="container mt-5">
            <h1>@yield('cabecera')</h1>
            
        <div class='container mt-5'>
            @yield('contenido')
           
        </div>
        </div>
    </body>
</html>