<!-- resources/views/personas/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Personas</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Lista de Personas</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <a href="{{ route('personas.create') }}">Crear Nueva Persona</a>

    <table border="1">
        <thead>
            <tr>

                <th>Nombre</th>
                <th>Cédula</th>
                <th>Documento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $persona)

                <tr>

                    <td>{{ $persona->nombre }}</td>
                    <td>{{ $persona->cedula }}</td>
                    <td>
                        @if ($persona->documento)
                            <a href="{{ asset('storage/documentos/' . $persona->documento) }}" target="_blank">Ver Documento</a>
                        @else
                            No disponible
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('personas.show', $persona->id) }}">Ver</a>
                        <a href="{{ route('personas.edit', $persona->id) }}">Editar</a>
                        <form action="{{ route('personas.destroy', $persona->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta persona?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
