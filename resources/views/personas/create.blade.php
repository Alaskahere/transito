<!-- resources/views/personas/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Crear Persona</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Crear Persona</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('personas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
        </div>
        <div>
            <label for="cedula">Cédula:</label>
            <input type="text" id="cedula" name="cedula" value="{{ old('cedula') }}" required>
        </div>
        <div>
            <label for="documento">Documento (PDF):</label>
            <input type="file" id="documento" name="documento" accept="pdf/*">
        </div>
        <button type="submit">Crear</button>
    </form>
    <a href="{{ route('personas.index') }}">Volver</a>
</body>
</html>
