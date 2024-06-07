<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type_menu  = 'Galeri';
        $keyword    = $request->name;
        $galerys = Galery::with('project')->when($request->name, function ($query, $name) {
            $query->whereHas('project', function ($query) use ($name) {
                $query->where('name', 'like', '%' . $name . '%');
            });
        })->latest()->paginate(10);

        $galerys->appends(['name' => $request->name]);

        return view('pages.galery.galery-index', compact('type_menu', 'galerys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_menu = 'Galeri';
        return view('pages.galery.galery-create', compact('type_menu'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
