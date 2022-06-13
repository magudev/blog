<div class="card">
    
    {{-- BUSCADOR --}}
    <div class="card-header">
        <input type="text" class="form-control" placeholder="Filtre su búsqueda aquí..." wire:model="search">
    </div>

    @if ($posts->count())
        <div class="card-body">
            <table class="table table-striped"> 
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th class="text-center">Status</th>
                        <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->name }}</td>
                            @if ($post->status == 1) 
                                <td class="text-secondary text-center">Borrador</td>
                            @else 
                                <td class="text-success text-center">Publicado</td>
                            @endif
                            <td width="10px">
                                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- PAGINACIÓN --}}
        @if ($posts->hasPages())
            <div class="card-footer">
                {{ $posts->links() }}
            </div>
        @endif
    @else
        <div class="card-body">
            <span>No existen registros coincidentes.</span>
        </div>
    @endif
</div>
