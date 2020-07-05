
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Mail de contacto</title>
    <style>
        .container{
            max-width: 942px;
            margin: 0 auto;
            border:solid 1px lightblue;
            border-radius: 10px;
            padding: 10px;
        }

        .bg-light{
            background-color: #f8f9fa;
        }

        .bg-white{
            background-color: white;
        }

        .text-center{
            text-align: center;
        }

        .lead {
            font-size: 1.125rem;
            font-weight: 300;
        }

        .btn{              
            margin-top: 10px;
            display: inline-block;
            user-select: none;
            text-decoration: none;
            background-color: #0d83e8;
            color: white;
            border: 2px solid #007eff;
            padding: 0.375rem 0.75rem;
            font-size: 0.9rem;
            line-height: 1.6;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out,
                background-color 0.30s ease-in-out,
                border-color 0.15s ease-in-out,
                box-shadow 0.15s ease-in-out;        
        }

        .btn:hover{
            background-color: #0749ab;
        }
        a{
            text-align: center;
            font-weight: bold;
            font-size:1rem;
        }
    </style>
</head>
<body class="bg-light">
   <div class="container p-3 bg-white">
        <h1 class="text-center">
            {{ config('app.name') }}
        </h1>
        <p class="lead">
            <b>Nombre: </b>{{ ucfirst($mensaje['nombre']) }}<br>
            <b>Email: </b>{{$mensaje['email']}}<br>
            <b>Empresa: </b>{{ ucfirst($mensaje['empresa']) }}<br>
            <b>Tel: </b>{{$mensaje['tel']}}<br>
            <b>Asunto: </b>{{ ucfirst($mensaje['asunto']) }}<br>
        </p>
        <div class="container p-2 bg-light rounded">
            <strong>Mensaje:</strong><hr>
            {!! nl2br($mensaje['mensaje']) !!}
        </div>
        <a class="btn" href="{{asset('/')}}">Ir a {{ config('app.name') }}</a>
   </div>
   
</body>
</html>