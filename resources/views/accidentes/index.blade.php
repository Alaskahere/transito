<!-- resources/views/accidentes/index.blade.php -->



<h1>Accidentes</h1>
<a href="{{ route('accidentes.create') }}">Crear Accidente</a>

@if (session('success'))
    <div>{{ session('success') }}</div>
@endif <br>
<table>
    <thead>
        <tr>

            <th>Fecha</th>
            <th>Hora</th>
            <th>Lugar</th>
            <th>Nombre_Persona</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($accidentes as $accidente)
            <tr>

                <td>{{ $accidente->fecha }}</td>
                <td>{{ $accidente->hora }}</td>
                <td>{{ $accidente->lugar }}</td>
                <td>{{ $accidente->persona->nombre }}</td>
                <td>
                    <a href="{{ route('accidentes.show', $accidente) }}">Ver</a>
                    <a href="{{ route('accidentes.edit', $accidente->id) }}">Editar</a>
                    <form action="{{ route('accidentes.destroy', $accidente->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('¿Estás seguro de que deseas eliminar este accidente?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
