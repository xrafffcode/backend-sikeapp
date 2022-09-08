<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('pages.hospital.index', [
            'hospitals' => Hospital::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.hospital.create');
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
            'description' => 'required|max:255',
            'open_time' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'map_url' => 'required',
            'rating' => 'required',
        ]);

        try {
            Hospital::create($request->all());
            return redirect()->route('hospital.index')->with('success', 'Hospital created successfully');
        } catch (\Exception $e) {
            return redirect()->route('hospital.create')->with('error', 'Error creating hospital');
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
        return view('pages.hospital.edit', [
            'hospital' => Hospital::findOrFail($id)
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
            $hospital = Hospital::findOrFail($id)->update($request->all());
            return redirect()->route('hospital.index')->with('success', 'Hospital updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('hospital.edit')->with('error', 'Error updating hospital');
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
            $hospital = Hospital::findOrFail($id);
            $hospital->delete();
            return redirect()->route('hospital.index')->with('success', 'Hospital deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('hospital.index')->with('error', 'Error deleting hospital');
        }
    }
}
