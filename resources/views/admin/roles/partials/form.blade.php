{{-- Nombre del rol --}}
<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del rol']) !!}
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

{{-- Listado de permisos --}}
<h2 class="h3">Listado de permisos</h2>
@foreach ($permissions as $permission)
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-2']) !!}
            {{ $permission->description }}
        </label>
    </div>
@endforeach