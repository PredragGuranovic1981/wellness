<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Treatment;
use App\Employe;
use App\User;

class ReservationsController extends Controller
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
      $reservs = Treatment::join('reservations', 'reservations.id', '=', 'reservations.treatment_id')->select('reservations.id', 'reservations.schedule', 'treatments.name')->get();
      return view('client.showscheduling')->with('reservs', $reservs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $name = Treatment::with('reservations')->get()->pluck('name', 'id');
      $user = User::with('reservations')->get()->pluck('name', 'id');
      // $name = Treatment::join('reservations', 'treatments.id', '=', 'reservations.treatment_id')->join('users', 'users.id', '=', 'reservations.user_id')->pluck('treatments.name', 'users.name');
      return view('client.scheduling', ['name' => $name, 'user' => $user]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, ['treatment_id' => 'required']);
      $this->validate($request, ['schedule' => 'required']);

      $reserve = new Reservation;
      $reserve->treatment_id = $request->input('treatment_id');
      $reserve->user_id = $request->input('user_id');
      $reserve->schedule = $request->input('schedule');

      // Sada mi sacuvaj taj unos
      $reserve->save();

      // redirektuj
      return redirect('/client/reservation/create')->with('success', 'Uspesno ste zakazali tretman!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          // $treatment = Treatment::with('reservations')->get()->pluck('name', 'id');
          $reserve = Reservation::find($id);
          return view('client.showscheduling',)->with('reserve', $reserve);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $user = User::with('reservations')->get()->pluck('name', 'id');
        // $reserve = Reservation::find($id);
        // return view('client.showscheduling', compact('user','reserve'));
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
        //
    }
}
