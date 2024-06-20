<!-- resources/views/personas/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Editar Persona</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Editar Persona</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('personas.update', $persona->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ $persona->nombre }}" required>
        </div>
        <div>
            <label for="cedula">Cédula:</label>
            <input type="text" id="cedula" name="cedula" value="{{ $persona->cedula }}" required>
        </div>
        <div>
            <label for="documento">Documento (PDF):</label>
            <input type="file" id="documento" name="documento" accept="application/pdf">
        </div>
        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('personas.index') }}">Volver</a>
</body>
</html>
