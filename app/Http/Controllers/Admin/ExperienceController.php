<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Experience;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $experiences = Experience::all();

        return view('admin.experience.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.experience.create');
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

        Experience::create([
            'name' => $input['name'],
            'work_at' => $input['work_at'],
            'from' => $input['from'],
            'until' => $input['until'],
            'detail' => $input['detail'],
            'thumbnail' => $namaThumbnail
        ]);

        (isset($input['thumbnail'])) ? $input['thumbnail']->move(public_path('experience'), $namaThumbnail) : null ;

        return redirect('admin/experience');
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
        $experience = Experience::where('id', $id)->first();

        return view('admin.experience.edit', compact('experience'));
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

        $experience = Experience::where('id', $id)->first();

        (isset($input['thumbnail'])) ? $namaThumbnail = str_random().'.'.$input['thumbnail']->getClientOriginalExtension() : $namaThumbnail = null;

        $experience->update([
            'name' => $input['name'],
            'work_at' => $input['work_at'],
            'from' => $input['from'],
            'until' => $input['until'],
            'detail' => $input['detail'],
            'thumbnail' => $namaThumbnail
        ]);

        (isset($input['thumbnail'])) ? $input['thumbnail']->move(public_path('experience'), $namaThumbnail) : null ;

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
        Experience::destroy($id);

        return back();
    }
}
