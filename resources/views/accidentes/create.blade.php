<!-- resources/views/accidentes/create.blade.php -->


    <h1>Crear Accidente</h1>
    <form action="{{ route('accidentes.store') }}" method="POST">
        @csrf

        <div>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>
        </div>
        <div>
            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" required>
        </div>
        <div>
            <label for="lugar">Lugar:</label>
            <input type="text" id="lugar" name="lugar" required>
        </div>
        <div>
            <label for="persona_id">Persona:</label>
            <select id="persona_id" name="persona_id" required>
                @foreach($personas as $persona)
                    <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Crear</button>
    </form><br><br>
    <a href="{{ route('accidentes.index') }}">Volver</a>




