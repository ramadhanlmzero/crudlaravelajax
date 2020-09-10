<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Model\Alumni;
use App\Exports\AlumniExport;
use Maatwebsite\Excel\Facades\Excel;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $piechartalumni = Alumni::selectRaw('gender, count(*) as total')->groupBy('gender')->get()->toArray();
        $barchartalumni = Alumni::selectRaw('department, count(*) as total')->groupBy('department')->get()->toArray();
        return view('index', compact('piechartalumni', 'barchartalumni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'gender' => 'required',
            'department' => 'required',
            'graduation_date' => 'required',
            'ipk' => 'required'
        ];

        $rulesMessages = [
            'required' => 'Wajib diisi!'
        ];

        $this->validate($request, $rules, $rulesMessages);

        $data = [
            'id' => (string) Str::uuid(),
            'name' => $request->name,
            'gender' => $request->gender,
            'department' => $request->department,
            'graduation_date' => $request->graduation_date,
            'ipk' => $request->ipk
        ];
        $alumni = Alumni::create($data);
        $response = array(
            'status' => 'success',
            'msg' => 'Data has been saved!',
        );

        return \Response::json($response);
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
        $rules = [
            'name' => 'required',
            'gender' => 'required',
            'department' => 'required',
            'graduation_date' => 'required',
            'ipk' => 'required'
        ];

        $rulesMessages = [
            'required' => 'Wajib diisi!'
        ];

        $this->validate($request, $rules, $rulesMessages);

        $alumni = Alumni::find($id);
        $data = [
            'name' => $request->name,
            'gender' => $request->gender,
            'department' => $request->department,
            'graduation_date' => $request->graduation_date,
            'ipk' => $request->ipk
        ];
        $alumni->update($data);
        $response = array(
            'status' => 'success',
            'msg' => 'Data has been updated!',
        );

        return \Response::json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumni = Alumni::find($id);
        $alumni->delete();
        $response = array(
            'status' => 'success',
            'msg' => 'Data has been deleted!',
        );

        return \Response::json($response);
    }

    public function api()
    {
        $data = [
            "data" => Alumni::all()
        ];
        return $data;
    }

    public function apiDetail($id)
    {
        $data = [
            "data" => Alumni::find($id)
        ];
        return $data;
    }

    public function export_excel()
    {
        return Excel::download(new AlumniExport, 'alumni.xlsx');
    }
}
