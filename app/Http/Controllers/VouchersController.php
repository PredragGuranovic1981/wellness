<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voucher;
use Auth;

class VouchersController extends Controller
{
    public function __construct(){
    $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $vouchers = Voucher::all();
      return view('admin.showvoucher')->with('vouchers', $vouchers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.voucher');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, ['name' => 'required']);
      $this->validate($request, ['email' => 'required']);
      $this->validate($request, ['phone' => 'required']);
      $this->validate($request, ['name_user' => 'required']);

      // Sada kreiramo Notes
      $voucher = new Voucher;
      $voucher->name = $request->input('name');
      $voucher->email = $request->input('email');
      $voucher->phone = $request->input('phone');
      $voucher->name_user = $request->input('name_user');
      $voucher->address_user = $request->input('address_user');

      // Sada mi sacuvaj taj unos
      $voucher->save();

      // redirektuj
      return redirect('/client/voucher/create')->with('success', 'Poruka je uspesno poslata');
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
        //
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
      $voucher = Voucher::find($id);
      $voucher->delete();
      return redirect('/vouchers')->with('success', 'Vaučer je uspešno obrisan!');
    }
}
