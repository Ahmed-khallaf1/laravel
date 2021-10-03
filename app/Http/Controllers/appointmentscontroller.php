<?php

namespace App\Http\Controllers;

use App\Models\appointments;

use App\Models\users;

use Illuminate\Http\Request;

class appointmentscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = appointments::select('appointments.*','users.name')
        ->join('users','users.id','=','appointments.doctor_id')
        ->paginate(5);

        return view('appointments.index', ['data' => $data]);

        // $data = appointments::paginate(5);

        // return view('appointments.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data= users::get();
        return view('appointments.create',['data'=>$data]);
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
            "app_to" => "required",
            "app_from" => "required",
            "doctor_id" => "required",

        ]);



        $op = appointments::create($data);

        if ($op) {
            $message = "appointments Registered";
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
        $data = appointments::where('id', $id)->get();

        return view('appointments.edit', ['data' => $data]);
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

            "app_to" => "required",
            "app_from" => "required",
            "doctor_id" => "required",


        ]);


        $op = appointments::where('id', $id)->update(["app_from" => $request->app_from, "app_to" => $request->app_to, "doctor_id" => $request->doctor_id]);


        if ($op) {
            $message = "Record Updated";
        } else {
            $message = "Error Try Again";
        }


        session()->flash('Message', $message);

        return redirect(url('/appointments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        appointments::where('id', $request->id)->delete();
        return back();
    }
}
