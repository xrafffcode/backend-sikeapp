<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorCategory;

class DoctorCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.doctor-category.index', [
            'doctor_category' => DoctorCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.doctor-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
        ]);

        try {
            DoctorCategory::create($request->all());
            return redirect()->route('doctor-category.index')->with('success', 'Doctor Category created successfully');
        } catch (\Exception $e) {
            return redirect()->route('doctor-category.create')->with('error', 'Error creating doctor category');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.doctor-category.edit', [
            'doctor_category' => DoctorCategory::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DoctorCategory::findOrFail($id)->update($request->all());
            return redirect()->route('doctor-category.index')->with('success', 'Doctor Category updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('doctor-category.edit')->with('error', 'Error updating doctor category');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $doctor_category = DoctorCategory::findOrFail($id);
            $doctor_category->delete();
            return redirect()->route('doctor-category.index')->with('success', 'Doctor Category deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('doctor-category.index')->with('error', 'Error deleting doctor category');
        }
    }
}
