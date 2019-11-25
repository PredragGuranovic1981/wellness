<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treatment;

class AdminTreatmentsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $treatments = Treatment::all();
    return view('admin.showtreatmen')->with('treatments', $treatments);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('admin.createtreatment');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // validate
    $this->validate($request, ['name' => 'required']);
    $this->validate($request, ['image' => 'image|max:1999']);
    $this->validate($request, ['description' => 'required']);
    $this->validate($request, ['price' => 'required']);

    // Sada kreiramo Tretmant
    $treatment = new Treatment;
    $treatment->name = $request->input('name');
    $treatment->image = $request->input('image');
    $treatment->description = $request->input('description');
    $treatment->price = $request->input('price');

    // Sada mi sacuvaj taj unos
    $treatment->save();

    // redirektuj
    return redirect('/store')->with('success', 'Tretmant je uspesno kreiran!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    // $treatment = Treatment::find($id);
    return view('admin.edittreatment', ['treatment' => Treatment::find($id)]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $treatment = Treatment::find($id);
      return view('admin.updatereatment', ['treatment' => Treatment::find($id)]);

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
    $treatment = Treatment::find($id);
    $treatment->name = $request->input('name');
    $treatment->description = $request->input('description');
    $treatment->price = $request->input('price');

    // Sada mi sacuvaj taj unos
    $treatment->save();

    // redirektuj
    return redirect('/showtreatmen')->with('success', 'Tretmant je uspesno azuriran!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}
