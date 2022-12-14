<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.news.index', [
            'news' => News::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.news.create');
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
            'title' => 'required|max:100',
            'description' => 'required|max:255',
            'image' => 'required',
            'content' => 'required',
        ]);


        try {
            News::create($request->all());
            return redirect()->route('news.index')->with('success', 'News created successfully');
        } catch (\Exception $e) {
            return redirect()->route('news.create')->with('error', 'Error creating news');
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
        return view('pages.news.edit', [
            'news' => News::findOrFail($id)
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
            $news = News::findOrFail($id)->update($request->all());
            return redirect()->route('news.index')->with('success', 'News updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('news.edit', $id)->with('error', 'Error updating news');
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
            News::findOrFail($id)->delete();
            return redirect()->route('news.index')->with('success', 'News deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('news.index')->with('error', 'Error deleting news');
        }
    }
}
