<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use Illuminate\Http\Request;

class reservationcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = reservation::paginate(5);

        return view('reservation.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(request(), [
            "patient_id" => "required",
            "appointment_id" => "required",
        ]);



        $op = reservation::create($data);

        if ($op) {
            $message = "reservation Registered";
        } else {
            $message = "Error Try Again";
        }

        session()->flash('Message', $message);
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
        $data = reservation::where('id', $id)->get();

        return view('reservation.edit', ['data' => $data]);
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
        $data = $this->validate($request, [

            "patient_id" => "required",
            "appointment_id" => "required",


        ]);


        $op = reservation::where('id', $id)->update(["patient_id" => $request->patient_id, "appointment_id" => $request->appointment_id,]);


        if ($op) {
            $message = "Record Updated";
        } else {
            $message = "Error Try Again";
        }


        session()->flash('Message', $message);

        return redirect(url('/reservation'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        reservation::where('id', $request->id)->delete();
        return back();
    }
}
