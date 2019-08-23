<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Medical_r;

class Medical_rController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medical_rs = Medical_r::all();

        return view('medical_rs.index', compact('medical_rs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medical_rs.create');
        
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
            'email'=>'required|exists:users,email',
            'id'=>'required|integer|min:0',
            'gender'=> 'required|string|in:female,male',
            'birthDate'=> 'required|date',
            'bloodType'=> 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-'
          ]);
          $medical_r = new Medical_r([
            'email' => $request->get('email'),
            'id' => $request->get('id'),
            'gender'=> $request->get('gender'),
            'birthDate' => $request->get('birthDate'),
            'bloodType'=> $request->get('bloodType')
          ]);
          $medical_r->save();
          return redirect('/medical_rs')->with('success', 'Medical record has been added');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medical_r = Medical_r::find($id);
        $medical_r->delete();

        return redirect('/medical_rs')->with('success', 'Medical record has been deleted Successfully');
    }
}
