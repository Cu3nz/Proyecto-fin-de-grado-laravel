<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($image)
{
    $image = ProductImage::findOrFail($image); // Encuentra la imagen o falla
    Storage::delete($image->url_imagen); // Asume que 'url_imagen' es el campo donde se guarda la ruta del archivo
    $image->delete(); // Elimina el registro de la base de datos

    return redirect()->back()->with('mensaje', 'Imagen eliminada correctamente.');
}
}
