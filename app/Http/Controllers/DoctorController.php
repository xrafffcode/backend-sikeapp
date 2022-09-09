<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\DoctorCategory;
use App\Models\Hospital;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.doctor.index', [
            'doctor' => Doctor::with(['category', 'hospital'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.doctor.create', [
            'doctor_category' => DoctorCategory::all(),
            'hospital' => Hospital::all()
        ]);
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
            'image' => 'required',
            'categories_id' => 'required',
            'hospitals_id' => 'required',
        ]);

        try {
            Doctor::create($request->all());
            return redirect()->route('doctor.index')->with('success', 'Doctor created successfully');
        } catch (\Exception $e) {
            return redirect()->route('doctor.create')->with('error', 'Error creating doctor');
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
        return view('doctor.edit', [
            'doctor' => Doctor::findOrFail($id)
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
            $doctor = Doctor::findOrFail($id);
            return redirect()->route('doctor.index')->with('success', 'Doctor updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('doctor.edit')->with('error', 'Error updating doctor');
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
            Doctor::findOrFail($id)->delete();
            return redirect()->route('doctor.index')->with('success', 'News deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('doctor.index')->with('error', 'Error deleting news');
        }
    }
}
