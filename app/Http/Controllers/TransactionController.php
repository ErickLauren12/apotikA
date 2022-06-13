<?php

namespace App\Http\Controllers;

use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $result = Transaction::all();
        return view('transaction.index', [
            'result' => $result
        ]);
    }

    public function show1(Transaction $id){
        $transaction = $id;
        return view('transaction.show', compact('transaction'));
    }

    public function showAjax(Request $request)
    {
        $id = $request->id;
        $data = Transaction::find($id);
        $products = $data->products;
        return response()->json(array(
            'msg' => $id
            //'msg'=>view('transaction.showmodal',compact('data','dataProduk'))->render()
        ), 200);
    }

    public function showAjax2($id)
    {
        $data = Transaction::find($id);
        $medicines = $data->medicines;
        return response()->json(array(
            'msg' => view('transaction.showdetail', compact('data', 'medicines'))->render()
        ), 200);
    }

    public function form_submit_front(){
        $this->authorize('checkmember');
        return view('frontend.checkout');
    }

    public function submit_front(){
        $this->authorize('checkmember');

        $cart = session()->get('cart');
        $user = Auth::user();
        $t = new Transaction;

        $t->user_id = $user->id;
        $t->transaction_date = Carbon::now()->toDateTimeString();
        $t->save();

        $totalharga = $t->insertProduct($cart, $user);
        $t->total = $totalharga;
        $t->save();

        session()->forget('cart');
        return redirect('home');
    }


}
