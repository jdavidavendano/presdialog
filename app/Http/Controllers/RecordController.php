<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Record::all();

        return view('records.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('records.create');
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
            'glucose'=>'integer',
            'insulin'=> 'integer',
            'carbohydrates' => 'integer'
        ]);

        /*$rules = array(
            'glucose' => 'required_without_all:insulin,carbohydrates',
            'insulin' => 'required_without_all:glucose,carbohydrates',
            'carbohydrates' => 'required_without_all:insulin,glucose',
        );
        $validator = Validator::make(Input::all(), $rules);*/

        $record = new Record([
            'glucose' => $request->get('glucose'),
            'insulin' => $request->get('insulin'),
            'carbohydrates' => $request->get('carbohydrates'),
            'description' => $request->get('description'),
            'date' => $request->get('date')
        ]);
        $record -> save();
        return redirect('/records')->with('Success', 'Record added');
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
        $record = Record::find($id);

        return view('records.edit', compact('record'));
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
        $request->validate([
            'glucose'=>'integer',
            'insulin'=> 'integer',
            'carbohydrates' => 'integer'
          ]);
    
        $record = Record::find($id);
        
        $record->glucose = $request->get('glucose');
        $record->insulin = $request->get('insulin');
        $record->carbohydrates = $request->get('carbohydrates');
        $record->description = $request->get('description');
        $record->date = $request->get('date');
        $record->save();
    
        return redirect('/records')->with('success', 'Record has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Record::find($id);
        $record->delete();

        return redirect('/records')->with('success', 'Record has been deleted Successfully');
    }
}
