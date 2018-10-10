<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checklogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::Where([['email', $email], ['password', $password]])->first();
        if(!empty($user)){
            session(['user_id' => $user->id]);
            session(['username' => $user->name]);
            session(['email' => $user->email]);
            session(['password' => $user->password]);

            return redirect()->Route('home');
        } else {
            $message = "Username or password is wrong !";
            return view('index')->with('message', $message);
        }
    }


    public function register(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $name = $request->input('name');

        $user_before = User::where('email', $email)->first();

        if (!empty($user_before)) {
            $message = 'your email have been already registered';
            return view('index')->with('message', $message);
        } else {
            // create an account and save
            $new_user = new User;
            $new_user->name = $name;
            $new_user->password = $password;
            $new_user->email = $email;
            $new_user->save();

            $success = ['mes_success' => 'Account Created, Lets Login'];
            return view('index')->with('success', $success);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request)
    {
        $id = session('user_id');
        $email = $request->input('email');
        $name = $request->input('name');


        $user_before = User::where('email', $email)->get();

        if (count($user_before) > 1) {
            $message = 'your email have been already registered';
            return view('index')->with('message', $message);
        } else {
            // create an account and save
            $updated_user = User::find($id);
            $updated_user->name = $name;
            $updated_user->email = $email;
            $updated_user->save();

            session(['user_id' => $updated_user->id]);
            session(['username' => $updated_user->name]);
            session(['email' => $updated_user->email]);
            session(['password' => $updated_user->password]);

            $success = [
                'mes_success' => 'Account Updated',
                'update' => 1
            ];
            return view('index')->with('success', $success);

        }
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
