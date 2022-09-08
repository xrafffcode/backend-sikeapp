<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DrugCategory;

class DrugCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('pages.drug-category.index', [
            'drug_category' => DrugCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.drug-category.create');
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
            DrugCategory::create($request->all());
            return redirect()->route('drug-category.index')->with('success', 'Drug Category created successfully');
        } catch (\Exception $e) {
            return redirect()->route('drug-category.create')->with('error', 'Error creating drug category');
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
        return view('pages.drug-category.edit', [
            'drug_category' => DrugCategory::findOrFail($id)
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
            $drug_category = DrugCategory::findOrFail($id);
            $drug_category->update($request->all());
            return redirect()->route('drug-category.index')->with('success', 'Drug Category updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('drug-category.edit', $id)->with('error', 'Error updating drug category');
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
            $drug_category = DrugCategory::findOrFail($id);
            $drug_category->delete();
            return redirect()->route('drug-category.index')->with('success', 'Drug Category deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('drug-category.index')->with('error', 'Error deleting drug category');
        }
    }
}
