<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Table;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.index', [
            'reservations'  => $reservations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables = Table::where('status', TableStatus::Avalaiable)->get();
        return view('admin.reservation.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email',
            'tel_number'    => 'required',
            'res_date'      => ['required', 'date', new DateBetween, new TimeBetween],
            'guest_number'  => 'required',
            'table_id'      => 'required',
        ]);

        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number >= $table->guest_number) {
            return back()->with('warning', 'Please choose the table base on guests.')->withInput();
        }
        $request_date = Carbon::parse($request->res_date);
        foreach ($table->reservations as $key => $res) {
            if ($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'This table is reserved for this date.')->withInput();
            }
        }

        Reservation::create($validateData);

        return to_route('admin.reservation.index')->with('success', 'Reservation created successfully');
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
    public function edit(Reservation $reservation)
    {
        $tables = Table::where('status', TableStatus::Avalaiable)->get();
        return view('admin.reservation.edit', compact('reservation', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $rules = [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email',
            'tel_number'    => 'required',
            'guest_number'  => 'required',
            'table_id'      => 'required',
        ];
        // dd($request->res_date);
        if (date('Y-m-d H:i', strtotime($request->res_date)) != $reservation->res_date->format('Y-m-d H:i')) {
            $rules['res_date'] = ['required', 'date', new DateBetween, new TimeBetween];
        }

        $validateData = $request->validate($rules);

        $table = Table::findOrFail($request->table_id);

        if ($request->guest_number >= $table->guest_number) {
            return back()->with('warning', 'Please choose the table base on guests.')->withInput();
        }
        $reservations = $table->reservations()->where('id', '!=', $reservation->id)->get();
        $request_date = Carbon::parse($request->res_date);
        foreach ($reservations as $key => $res) {
            if ($res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'This table is reserved for this date.')->withInput();
            }
        }

        $reservation->update($validateData);

        return to_route('admin.reservation.index')->with('success', 'Reservation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return to_route('admin.reservation.index')->with('warning', 'Reservation deleted successfully');
    }
}
