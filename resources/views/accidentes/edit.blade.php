<h1>Editar Accidente</h1>
<form action="{{ route('accidentes.update', $accidente->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" value="{{ $accidente->fecha }}" required>
    </div>
    <div>
        <label for="hora">Hora:</label>
        <input type="time" id="hora" name="hora" value="{{ $accidente->hora }}" required>
    </div>
    <div>
        <label for="lugar">Lugar:</label>
        <input type="text" id="lugar" name="lugar" value="{{ $accidente->lugar }}" required>
    </div>
    <div>
        <label for="persona_id">Persona:</label>
        <select id="persona_id" name="persona_id" required>
            @foreach ($personas as $persona)
                <option value="{{ $persona->id }}" {{ $persona->id == $accidente->persona_id ? 'selected' : '' }}>
                    {{ $persona->nombre }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Actualizar</button>
</form>
<a href="{{ route('accidentes.index') }}">Volver</a>
