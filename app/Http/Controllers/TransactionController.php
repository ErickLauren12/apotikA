<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
   public function index(){
    $result = Transaction::all();
    return view('transaction.index',[
        'result'=>$result
    ]);
   }

   public function showAjax(Request $request){
       $id = $request->id;
       $data = Transaction::find($id);
       $products = $data->products;
       return response()->json(array(
           'msg'=>$id
           //'msg'=>view('transaction.showmodal',compact('data','dataProduk'))->render()
       ),200);
   }

   public function showAjax2($id){
    $data = Transaction::find($id);
    $medicines = $data->medicines;
    return response()->json(array(
        'msg'=>view('transaction.showdetail',compact('data','medicines'))->render()
    ),200);
}
}
