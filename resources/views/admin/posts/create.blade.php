@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear un nuevo post</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            
            {{-- FORMULARIO --}}
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => 'true']) !!}

                {{-- Información del usuario autenticado
                {!! Form::hidden('user_id', auth()->user()->id) !!} --}}

                @include('admin.posts.partials.form')

                {!! Form::submit('Crear post', ['class' => 'btn btn-success float-right']) !!}

            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;

        }
        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    <script src="{{ asset('vendor/string-to-slug/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        document.getElementById('file').addEventListener('change', cambiarImagen);

        function cambiarImagen(e) {
            var file = e.target.files[0];
            var reader = new FileReader();
            reader.onload = (e) => {
                document.getElementById('picture').setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }

    </script>
@endsection