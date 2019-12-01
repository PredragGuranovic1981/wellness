<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use App\Treatment;

class EmployesController extends Controller
{
    public function __construct(){
    $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = Treatment::join('employes', 'treatments.id', '=', 'employes.treatment_id')->select('employes.id', 'employes.first_name', 'employes.last_name', 'treatments.name')->get();
        return view('admin.showemployes', ['employes' => $employes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name = Treatment::with('employes')->get()->pluck('name', 'id');
        return view('admin.createemploye', ['name' => $name]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['first_name' => 'required']);
        $this->validate($request, ['last_name' => 'required']);
        $this->validate($request, ['treatment_id' => 'required']);

        $employe = new Employe;
        $employe->treatment_id = $request->input('treatment_id');
        $employe->first_name = $request->input('first_name');
        $employe->last_name = $request->input('last_name');

        // Sada mi sacuvaj taj unos
        $employe->save();

        // redirektuj
        return redirect('admin/create')->with('success', 'Radnik je uspesno kreiran!');
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
        // $employe = Employe::find($id);
        // return view('admin.updateemployes')->with('admin', $employe);
        $treatment = Treatment::with('employes')->get()->pluck('name', 'id');
        $employe = Employe::find($id);
        // $treatment_employes = $employe->treatment()->pluck('name')->toArray();

        return view('admin.updateemployes', compact('employe','treatment'));
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
      $employe = Employe::find($id);
      $employe->treatment_id = $request->input('treatment_id');
      $employe->first_name = $request->input('first_name');
      $employe->last_name = $request->input('last_name');

      // Sada mi sacuvaj taj unos
      $employe->save();

      // redirektuj
      return redirect()->back()->with('success', 'Radnik je uspesno azuriran!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $employe = Employe::find($id);
      $employe->delete();
      return redirect()->back()->with('success', 'Radnik je uspesno obrisan!');
    }
}
