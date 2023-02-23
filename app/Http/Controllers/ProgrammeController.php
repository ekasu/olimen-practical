<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Programme;
use App\Models\SubProgramme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programmes = Programme::with('department')->latest()->get();
        return view('programme.index', compact('programmes'));
    }

    public function showsubprogrammes(Programme $programme)
    {
        // find sub programmes with the id 
        $subprogrammes = SubProgramme::where('programme_id', $programme->id)->get();

        return view('programme.showsubprogrammes', compact('subprogrammes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get list of departments 
        $departments = Department::latest()->get(['name', 'id']);

        return view('programme.create', compact('departments'), compact('departments'));
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
            'department_id' => ['required', 'integer'],
            'group' => ['required', 'string', 'max:60'],
            'category' => ['required', 'string', 'max:60'],
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

        Programme::create(
            [
                'name' => $request->name,
                'department_id' => $request->department_id,
                'group' => $request->group,
                'category' => $request->category,
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

        return redirect()->route('programme.index')->with('success', 'Programme added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function show(Programme $programme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function edit(Programme $programme)
    {
        // get all programmes 
        $programmes = Programme::find($programme->id);

        // get all deaprtment 
        $departments = Department::latest()->get(['id', 'name']);

        return view(
            'programme.edit',

            [
                'programme' => $programmes,
                'department' => $departments

            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programme $programme)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'department_id' => ['required', 'integer'],
            'group' => ['required', 'string', 'max:60'],
            'category' => ['required', 'string', 'max:60'],
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

        $programme->update(
            [
                'name' => $request->name,
                'department_id' => $request->department_id,
                'group' => $request->group,
                'category' => $request->category,
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

        return redirect()->route('programme.index')->with('success', 'Programme Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programme $programme)
    {
        $programme->delete();

        return redirect()->route('programme.index')->with('success', 'Programme Deleted successfully');
    }
}
