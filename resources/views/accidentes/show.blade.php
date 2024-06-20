<h1>Detalles del Accidente</h1>
<div>
    <strong>(id)Código:</strong> {{ $accidente->id }}
</div>
<div>
    <strong>Fecha:</strong> {{ $accidente->fecha }}
</div>
<div>
    <strong>Hora:</strong> {{ $accidente->hora }}
</div>
<div>
    <strong>Lugar:</strong> {{ $accidente->lugar }}
</div>
<div>
    <strong>Persona:</strong> {{ $accidente->persona->nombre }}
</div>
<a href="{{ route('accidentes.index') }}">Volver</a>
