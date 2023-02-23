<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use App\Models\SubProgramme;
use Illuminate\Http\Request;

class SubProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subprogrammes = SubProgramme::with('programme')->latest()->get();
        return view('subprogramme.index', compact('subprogrammes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get list of programmmes 
        $programmes = Programme::latest()->get(['name', 'id']);

        return view('subprogramme.create', compact('programmes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:200', 'unique:programmes'],
            'programme_id' => ['required', 'integer'],
            'description' => ['required', 'string', 'max:3000'],
            'unitofmeasure' => ['required', 'string', 'max:100'],
            'period' => ['required', 'string'],
            'quantity' => ['required', 'numeric'],
            'unitprice' => ['required', 'numeric'],
            'vat' => ['required', 'numeric']
        ]);

        //total exclusive 
        $total_exclusive = (float) $request->unitprice * (float) $request->quantity;

        // Total Inclusive 
        $total_inclusive = $total_exclusive + (float) $request->vat;

        SubProgramme::create(
            [
                'name' => $request->name,
                'programme_id' => $request->programme_id,
                'description' => $request->description,
                'unit_measure' => $request->unitofmeasure,
                'period' => $request->period,
                'quantity' => $request->quantity,
                'unit_price' => $request->unitprice,
                'total_exclusive' => $total_exclusive,
                'vat' => $request->vat,
                'total_inclusive' => $total_inclusive

            ]
        );

        return redirect()->route('subprogramme.index')->with('success', 'Sub Programme added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubProgramme  $subProgramme
     * @return \Illuminate\Http\Response
     */
    public function show(SubProgramme $subProgramme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubProgramme  $subProgramme
     * @return \Illuminate\Http\Response
     */
    public function edit(SubProgramme $subprogramme)
    {
        // get all programmes 
        $subprogrammes = SubProgramme::find($subprogramme->id);

        // get all deaprtment 
        $programmes = Programme::latest()->get(['id', 'name']);

        return view(
            'subprogramme.edit',

            [
                'subprogramme' => $subprogrammes,
                'programme' => $programmes

            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubProgramme  $subProgramme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubProgramme $subprogramme)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'programme_id' => ['required', 'integer'],
            'description' => ['required', 'string', 'max:3000'],
            'unitofmeasure' => ['required', 'string', 'max:100'],
            'period' => ['required', 'string'],
            'quantity' => ['required', 'numeric'],
            'unitprice' => ['required', 'numeric'],
            'vat' => ['required', 'numeric']
        ]);

        //total exclusive 
        $total_exclusive = (float) $request->unitprice * (float) $request->quantity;

        // Total Inclusive 
        $total_inclusive = $total_exclusive + (float) $request->vat;

        $subprogramme->update(
            [
                'name' => $request->name,
                'programme_id' => $request->programme_id,
                'description' => $request->description,
                'unit_measure' => $request->unitofmeasure,
                'period' => $request->period,
                'quantity' => $request->quantity,
                'unit_price' => $request->unitprice,
                'total_exclusive' => $total_exclusive,
                'vat' => $request->vat,
                'total_inclusive' => $total_inclusive

            ]
        );

        return redirect()->route('subprogramme.index')->with('success', 'Sub Programme Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubProgramme  $subProgramme
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubProgramme $subProgramme)
    {
        //
    }
}
