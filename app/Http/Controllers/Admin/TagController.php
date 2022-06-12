<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        $colores = [
            'red' => 'Rojo', 
            'yellow' => 'Amarillo', 
            'green' => 'Verde', 
            'blue' => 'Azul', 
            'indigo' => 'Indigo', 
            'orange' => 'Naranja', 
            'purple' => 'Violeta', 
            'pink' => 'Rosa', 
            'gray' => 'Gris'
        ];

        return view('admin.tags.create', compact('colores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags',
            'slug' => 'required',
            'color' => 'required'
        ]);

        $tag = Tag::create($request->all());

        return redirect()->route('admin.tags.edit', $tag)->with('info', 'Creada correctamente!'); 
    }

    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        $colores = [
            'red' => 'Rojo', 
            'yellow' => 'Amarillo', 
            'green' => 'Verde', 
            'blue' => 'Azul', 
            'indigo' => 'Indigo', 
            'orange' => 'Naranja', 
            'purple' => 'Violeta', 
            'pink' => 'Rosa', 
            'gray' => 'Gris'
        ];

        return view('admin.tags.edit', compact('tag', 'colores'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => "required|unique:tags,name,$tag->id",
            'slug' => 'required'
        ]);

        $tag->update($request->all());
        
        return redirect()->route('admin.tags.edit', $tag)->with('info', '¡Actualizada correctamente!'); 
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info', 'Etiqueta eliminada correctamente!'); 
    }
}
