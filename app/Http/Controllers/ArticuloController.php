<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{

    public function index(Request $request)
    {
        $categorias = [
            'Bazar',
            'Hogar',
            'Electronica'
        ];
      
        $elprecio = $request->get('precio');
        $lacategoria = $request->get('categoria');
        
        $articulos=Articulo::buscarCateg($lacategoria)->buscarPrecio($elprecio)->orderBy('id')
        ->paginate(4);
        return view('articulos.index',compact('articulos','categorias','request'));
        
        
    }

    public function create()
    {
        return view('articulos.create');
    }

    public function store(Request $request)
    {
 
        $request->validate([
            'nombre'=>['required'],
            'categoria'=>['required'],
            'precio'=>['required'],
            'stock' =>['required'],
        ]);
        if($request->has('foto')){
            $request->validate([
                'foto'=>['image']
            ]);
            $file = $request->file('foto');
            $nombre = 'articulos/'.time().'_'.$file->getClientOriginalName();

            \Storage::disk('public')->put($nombre, \File::get($file));
            $articulo = Articulo::create($request->all());
            $articulo->update(['foto' => "img/$nombre"]);
        }else{
            Articulo::create($request->all());
        }
        return redirect()->route('articulos.index')->with("mensaje","Se ha creado correctamente");
    }

    public function show(Articulo $articulo)
    {
        return view('articulos.detalle',compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        return view('articulos.edit', compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        $request->validate([
            'nombre' => ['required'],
            'categoria' => ['required'],
            'precio' => ['required'],
            'stock' => ['required']
        ]);
        
        if($request->has('foto')){
            $request->validate([
                'foto'=>['image']
            ]);
        $file = $request->file('foto');
        $nombre = 'articulos/'.time().'_'.$file->getClientOriginalName();
        \Storage::disk('public')->put($nombre, \File::get($file));
        if(basename($articulo->foto)!='default.jpg'){
            unlink($articulo->foto);
        }
        $articulo->update($request->all());
        $articulo->update(['foto'=>"img/$nombre"]);

         }else{
        $articulo->update($request->all());
        }
        return redirect()->route('articulos.index')->with("mensaje" , "Articulo actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        $foto = $articulo->foto;
        if(basename($foto)!="default.jpg"){
            unlink($foto);
        }
        $articulo->delete();
        return redirect()->route('articulos.index')->with("mensaje","El articulo se ha creado correctamente");
    }
}
