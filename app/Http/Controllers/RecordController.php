<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;
use App\Charts\report;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:Paciente');
    }

    public function getRecordsByUser($request){
        //$records = Record::all();
        $records = Record::select()->orderby('date')->get();

        foreach ($records as $i => $value) {
            if($value['username'] != $request->user()->username){
                unset($records[$i]);
            }
        }

        return $records;
    }

    public function index(Request $request)
    {
        $records = RecordController::getRecordsByUser($request);

        foreach ($records as $i => $value) {
            if($value['username'] != $request->user()->username){
                unset($records[$i]);
            }
        }

        //$request->user()->authorizeRoles(['user', 'Paciente']);

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
            'glucose' => 'required_without_all:insulin,carbohydrates|nullable|integer|min:0|max:500',
            'insulin' => 'required_without_all:glucose,carbohydrates|nullable|integer|min:0|max:200',
            'carbohydrates' => 'required_without_all:glucose,insulin|nullable|integer|min:0',
            'date' => 'required',
        ]);

        $record = new Record([
            'glucose' => $request->get('glucose'),
            'insulin' => $request->get('insulin'),
            'carbohydrates' => $request->get('carbohydrates'),
            'description' => $request->get('description'),
            'date' => $request->get('date').' '.$request->get('time'),
            'username' => $request->user()->username
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
            'glucose' => 'required_without_all:insulin,carbohydrates|nullable|integer|min:0|max:500',
            'insulin' => 'required_without_all:glucose,carbohydrates|nullable|integer|min:0|max:200',
            'carbohydrates' => 'required_without_all:glucose,insulin|nullable|integer|min:0',
            'date' => 'required',
          ]);

        $record = Record::find($id);

        $record->glucose = $request->get('glucose');
        $record->insulin = $request->get('insulin');
        $record->carbohydrates = $request->get('carbohydrates');
        $record->description = $request->get('description');
        $record->date = $request->get('date').' '.$request->get('time');
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

    public function report(Request $request)
    {
        $records = RecordController::getRecordsByUser($request);

        $labelInsulin = array();
        $valuesInsulin = array();

        $labelGlucose = array();
        $valuesGlucose = array();

        $labelCarbohydrates = array();
        $valuesCarbohydrates = array();

        foreach ($records as $record => $value) {

            if($value['insulin'] != null){
                array_push($labelInsulin, $value['date']);
                array_push($valuesInsulin, $value['insulin']);
            }

            if($value['glucose'] != null){
                array_push($labelGlucose, $value['date']);
                array_push($valuesGlucose, $value['glucose']);
            }

            if($value['carbohydrates'] != null){
                array_push($labelCarbohydrates, $value['date']);
                array_push($valuesCarbohydrates, $value['carbohydrates']);
            }
        }

        $chartInsulin = new report;
        $chartGlucose = new report;
        $chartCarbohydrates = new report;

        if (count($valuesInsulin) == 0) {
            $emptyInsulin = true;
        }

        $chartInsulin->labels($labelInsulin);
        $chartInsulin->dataset('Insulin', 'line', $valuesInsulin)->color('#FF6600');

        $chartGlucose->labels($labelGlucose);
        $chartGlucose->dataset('Glucose', 'line', $valuesGlucose)->color('#00FF00');

        $chartCarbohydrates->labels($labelCarbohydrates);
        $chartCarbohydrates->dataset('Carbohydrates', 'line', $valuesCarbohydrates)->color('#0000FF');
        //$request->user()->authorizeRoles(['user', 'Paciente']);

        return view('records.report', compact('records', 'chartInsulin', 'chartGlucose', 'chartCarbohydrates', 'valuesInsulin', 'valuesGlucose', 'valuesCarbohydrates'));
    }

}
