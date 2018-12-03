<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (empty(session('admin_id'))) {
            return view('ad-page-login');
        } else {
            return view('ad-index');
        }
    }

    public function checklogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $admin = Admin::findAdminByInfor($email, $password);
        if(!empty($admin)){
            session(['admin_id' => $admin->adminId]);
            session(['admin_name' => $admin->userName]);
            session(['admin_email' => $admin->email]);
            session(['admin_password' => $admin->password]);
            session(['admin_address' => $admin->address]);
            session(['admin_phonenumber' => $admin->phoneNumber]);
            session(['admin_facebook' => $admin->linkFacebook]);
            session(['admin_instagram' => $admin->linkInstagram]);
            session(['admin_twitter' => $admin->linkTwitter]);
            // $message =session('username');
            return redirect('/admin');
            // return $message;
        } else {
            session(['message' => "Username or password is wrong !"]);
            $url = '/ad-index';
            return redirect($url);
        }
    }


    public function logout(){
        session()->flush();
        return redirect('/admin');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
