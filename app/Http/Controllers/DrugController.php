<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;
use App\Models\DrugCategory;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.drug.index', [
            'drug' => Drug::with(['category'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.drug.create', [
            'drug_category' => DrugCategory::all(),
            'drug' => Drug::all()
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
            'description' => 'required',
        ]);

        try {
            Drug::create($request->all());
            return redirect()->route('drug.index')->with('success', 'Drug created successfully');
        } catch (\Exception $e) {
            return redirect()->route('drug.create')->with('error', 'Error creating Drug');
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
        return view('drug.edit', [
            'drug' => Drug::findOrFail($id)
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
            $drug = Drug::findOrFail($id);
            return redirect()->route('drug.index')->with('success', 'drug updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('drug.edit')->with('error', 'Error updating drug');
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
            Drug::findOrFail($id)->delete();
            return redirect()->route('drug.index')->with('success', 'drug deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('drug.index')->with('error', 'Error deleting drug');
        }
    }
}
