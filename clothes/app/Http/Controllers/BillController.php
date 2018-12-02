<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Bill;
use App\Category;
use App\Image;
use App\Firm;
use App\User;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homePage(){
       
    }
    public function index($category_para)
    {
    
    }

    public function search(Request $request){

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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category_para, $id)

    {
      
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function update_checked($id)
    {   
        $bill = Bill::find($id);
        $bill->checked = 'checked';
        $bill->save();
        return 'success';
    }



    public function showbilllist(){
        $bill_list = Bill::getBills();
        return view('ad-showbilllist')->with('bill_list', $bill_list);
    }

    public function showOrders($id){
        $bill_list = Bill::getBillsOfUser($id);
        return view('myorders')->with('bill_list', $bill_list);
    }


    public function showbilldetail($id){
        $id_bill = $id;
        $bill_info = Bill::getBillById($id);
        $infos = explode(';', $bill_info);
        $end = intval($infos[count($infos) - 2]);
        session(['num_of_products_in_billdetail' => $end]);
        session(['len_of_billdetail' => count($infos)]);
        return view('ad-showbilldetail')->with('bill_info', $infos);
    }

    public function showbilldetailofcm($id){
        $id_bill = $id;
        $bill_info = Bill::getBillById($id);
        $infos = explode(';', $bill_info);
        $end = intval($infos[count($infos) - 2]);
        session(['num_of_products_in_billdetail' => $end]);
        session(['len_of_billdetail' => count($infos)]);
        return $bill_info;
    }


}
