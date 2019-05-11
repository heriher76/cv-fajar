<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Education;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Education::all();

        return view('admin.education.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        (isset($input['thumbnail'])) ? $namaThumbnail = str_random().'.'.$input['thumbnail']->getClientOriginalExtension() : $namaThumbnail = null;

        Education::create([
            'study' => $input['study'],
            'university' => $input['university'],
            'from' => $input['from'],
            'until' => $input['until'],
            'description' => $input['description'],
            'thumbnail' => $namaThumbnail
        ]);

        (isset($input['thumbnail'])) ? $input['thumbnail']->move(public_path('education'), $namaThumbnail) : null ;

        return back();
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
        $education = Education::where('id', $id)->first();

        return view('admin.education.edit', compact('education'));
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
        $input = $request->all();

        $education = Education::where('id', $id)->first();

        (isset($input['thumbnail'])) ? $namaThumbnail = str_random().'.'.$input['thumbnail']->getClientOriginalExtension() : $namaThumbnail = null;

        $education->update([
            'study' => $input['study'],
            'university' => $input['university'],
            'from' => $input['from'],
            'until' => $input['until'],
            'description' => $input['description'],
            'thumbnail' => $namaThumbnail
        ]);

        (isset($input['thumbnail'])) ? $input['thumbnail']->move(public_path('education'), $namaThumbnail) : null ;
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Education::destroy($id);

        return back();
    }
}
