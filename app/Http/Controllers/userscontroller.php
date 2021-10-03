<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Models\userstype;

use Illuminate\Http\Request;

class userscontroller extends Controller
{

    public function __construct()
    {

   $this->middleware('chekAuth', ['except' => ['create', 'store', 'login', 'dologin']]);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = users::get();
        //كأني عملتها عشان دي شيلاها اصلا//
        $data = users::select('users.*','userstype.name as type_users')
        ->join('userstype','userstype.id','=','users.type_id')
        ->paginate(5);

        return view('users.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data= userstype::get();
        return view('users.create',['data'=>$data]);
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
            "email" => "required|email",
            "password" => "required|min:6",
            "type_id" => "required",

        ]);



        $data['password'] = bcrypt($data['password']);
        $op = users::create($data);

        if ($op) {
            $message = "users Registered";
        } else {
            $message = "Error Try Again";
        }

        session()->flash('Message', $message);

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
        $data = users::where('id', $id)->get();

        return view('users.edit', ['data' => $data]);
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

            "name"  => "required",
            "email" => "required|email",
            "password" => "required|min:6",
            "type_id" => "required",

        ]);


        $op = users::where('id', $id)->update(["name" => $request->name, "email" => $request->email, "password" => $request->password, "type_id" => $request->type_id]);


        if ($op) {
            $message = "Record Updated";
        } else {
            $message = "Error Try Again";
        }


        session()->flash('Message', $message);

        return redirect(url('/users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        users::where('id', $request->id)->delete();
        return back();
    }

    //login//
    public function login()
    {
        return view('login');
    }

    public function dologin(Request $request)
    {
        $data = $this->validate($request, [

            "email" => "required|email",
            "password" => "required|min:6"
        ]);
        // dd('massege');
        // dd(auth()->attempt($data, false));


        $status = false;
        if ($request->has('rememberMe')) {
            $status = true;
        }

        if (auth()->attempt($data, $status)) {


            return redirect(url('/users'));
        } else {

            session()->flash('Message', 'Invalid Credentials try again');
            return redirect(url('/login'));
        }
    }

    public function logout()
    {

        auth()->logout();

        return redirect(url('/login'));
    }
}
