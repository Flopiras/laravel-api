<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technology = new Technology();

        return view('admin.technologies.create', compact('technology'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            ['label' => 'required|string|max:50|unique:technologies'],
            [
                'label.required' => 'Il titolo è obbligatorio',
                'label.unique' => 'Questo titolo esiste già',
                'label.max:50' => 'Il titolo non può essere più lungo di 50 caratteri'
            ]
        );

        $data = $request->all();

        $technology = new Technology();
        $technology->fill($data);
        $technology->save();

        return to_route('admin.technologies.show', $technology)
            ->with('alert-message', 'Tecnologia aggiunta con successo!')
            ->with('alert-type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return to_route('admin.technologies.index')->with('type', 'success')->with('message', 'Il progetto è stato eliminato con successo!');
    }

    /**
     * Show trash storage.
     */
    public function trash()
    {
        $technologies = Technology::onlyTrashed()->get();
        return view('admin.technologies.trash', compact('technologies'));
    }

    /**
     * Definitive remove the specified resource from trash.
     */
    public function drop(string $id)
    {
        $technology = Technology::onlyTrashed()->findOrFail($id);

        $technology->forceDelete();

        return to_route('admin.technologies.trash')->with('type', 'success')->with('message', 'La tecnologia è stata eliminata definitivamente con successo!');
    }

    /**
     * Restore the specified resource from trash.
     */
    public function restore(string $id)
    {
        $technology = Technology::onlyTrashed()->findOrFail($id);
        $technology->restore();

        return to_route('admin.technologies.show', compact('technology'))->with('type', 'info')->with('message', 'Il progetto è stato ripristinato!');
    }
}
