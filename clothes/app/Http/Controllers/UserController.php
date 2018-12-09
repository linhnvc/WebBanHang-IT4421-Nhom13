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

        $user = User::findUserByInfor($email, $password);
        if(!empty($user)){
            session(['user_id' => $user->userId]);
            session(['username' => $user->userName]);
            session(['email' => $user->email]);
            session(['password' => $user->password]);
            session(['address' => $user->address]);
            // $message =session('username');
            return redirect()->Route('home');
            // return $message;
        } else {
            session(['message' => "Username or password is wrong !"]);
            $url = '/';
            return redirect($url);
        }
    }


    public function register(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $name = $request->input('name');
        $address = $request->input('address');

        $user_before = User::findUserByEmail($email);

        if (!empty($user_before)) {
            session(['failure_mes' => 'your email have been already registered']);
            $url = '/';
            return redirect($url);
        } else {
            // create an account and save
            
            User::registerUser($name, $password, $email, $address);
            session(['success_mes' => 'Account Created, Lets Login']);
            $url = '/';
            return redirect($url);

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

    public function showuserslist(){
        $users_list = User::getUsers();
        return view('ad-showuserslist')->with('users_list', $users_list);
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
        $password = $request->input('password');
        $address = $request->input('address');

        // create an account and save
        $updated_user = User::updateUser($id, $name, $email, $password, $address);

        session(['user_id' => $updated_user->userId]);
        session(['username' => $updated_user->userName]);
        session(['email' => $updated_user->email]);
        session(['password' => $updated_user->password]);
        session(['address' => $updated_user->address]);

        $mes_success = 'Account updated successfully !';
        return redirect('/')->with('mes_success', $mes_success);
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
