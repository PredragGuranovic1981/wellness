<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treatment;
use Carbon\Carbon;

class AdminTreatmentsController extends Controller
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

    //uzimamo ime slike sa ekstenzijom
    $fileNameWithExt = $request->file('image')->getClientOriginalName();
    // sada uzimamo samo ime fajla
    $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    // sada uzimamo odbacenu ekstenziju
    $extension = $request->file('image')->getClientOriginalExtension();
    //sada kreiraj novo ime sa time stamp i svom konkatencijom
    $filenameToStore = $filename . '_' . time() . '.' . $extension;
    //sada da uploudujemo na server
    $path = $request->file('image')-> storeAs('public/treatment_images', $filenameToStore);

    // Sada kreiramo Tretmant
    $treatment = new Treatment;
    $treatment->name = $request->input('name');
    $treatment->image = $filenameToStore;
    $treatment->description = $request->input('description');
    $treatment->price = $request->input('price');

    // Sada mi sacuvaj taj unos
    $treatment->save();

    // redirektuj
    return redirect('/showtreatmen')->with('success', 'Tretmant je uspesno kreiran!');
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

    if ($request->hasFile('image'))
        {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            // sada uzimamo samo ime fajla
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // sada uzimamo odbacenu ekstenziju
            $extension = $request->file('image')->getClientOriginalExtension();
            //sada kreiraj novo ime sa time stamp i svom konkatencijom
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            //sada da uploudujemo na server
            $path = $request->file('image')-> storeAs('public/treatment_images', $filenameToStore);
            $treatment->image = $filenameToStore;
        }

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
    $treatment = Treatment::find($id);
    $treatment->delete();
    return redirect()->back()->with('success', 'Tretman je uspesno obrisan!');
  }
}
