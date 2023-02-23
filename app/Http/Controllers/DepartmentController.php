<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Programme;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::latest()->get();

        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
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
            'name' => ['required', 'string', 'max:200', 'unique:departments'],
            'description' => ['required', 'string', 'max:3000'],
            'period' => ['required', 'string'],
            'amount' => ['required', 'numeric']
        ]);

        Department::create(
            [
                'name' => $request->name,
                'description' => $request->description,
                'period' => $request->period,
                'amount' => $request->amount,
            ]
        );

        return redirect()->route('department.index')->with('success', 'Department added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function showall(Department $department)
    {
        // find programmes with the id 
        $programmes = Programme::where('department_id', $department->id)->get();

        return view('departments.showprogrammes', compact('programmes'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $departments = Department::find($department->id);

        return view('departments.edit', compact('departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string', 'max:3000'],
            'period' => ['required', 'string'],
            'amount' => ['required', 'numeric']
        ]);

        $department->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'period' => $request->period,
                'amount' => $request->amount,
            ]
        );

        return redirect()->route('department.index')->with('success', 'Department Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('department.index')->with('success', 'Department deleted successfully');
    }
}
