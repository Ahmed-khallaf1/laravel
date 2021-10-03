<?php

namespace App\Http\Controllers;

use App\Models\userstype;
use Illuminate\Http\Request;

class userstypecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = userstype::get();
        return view('userstype.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //for view//
    public function create()
    {
        return view('userstype.create');

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
            "name" => "required",


        ]);
        $op = userstype::create($data);

        if($op){
            $message = "usersType Registered";
        }
        else{
            $message = "Error Try Again";
        }

        session()->flash('Message',$message);

      //  return redirect(url('/Student/create'));

        return back();
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
        $data = userstype::where('id',$id)->get();

        return view('userstype.edit',['data' => $data]);
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
        $data = $this->validate($request,[

            "name"  => "required",


           ]);


           $op = userstype::where('id',$id)->update(["name" => $request->name ]);


            if($op){
                $message = "Record Updated";
            }else{
                $message = "Error Try Again";
            }


            session()->flash('Message',$message);

            return redirect(url('/userstype'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        userstype::where('id',$request->id)->delete();
        return back();
    }
}
