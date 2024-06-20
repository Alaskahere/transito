<!-- resources/views/personas/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Detalles de la Persona</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Detalles de la Persona</h1>

    <div>
        <strong>Nombre:</strong> {{ $persona->nombre }}
    </div>
    <div>
        <strong>Cédula:</strong> {{ $persona->cedula }}
    </div>
    <div>
        <strong>Documento:</strong>
        @if($persona->documento)
            <a href="{{ asset('storage/documentos/' . $persona->documento) }}" target="_blank">Ver Documento</a>

        @else
            No hay documento disponible
        @endif
    </div>
    <a href="{{ route('personas.index') }}">Volver</a>
</body>
</html>
