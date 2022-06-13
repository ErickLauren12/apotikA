<?php

namespace App\Http\Controllers;

use App\Category;
use App\Medicine;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function front_index()
    {
        $products = Medicine::all();
        return view('frontend.product',compact('products'));
    }

    public function addToChart($id){
        $p = Medicine::find($id);
        $cart = session()->get('cart');

        if(!isset($cart[$id])){
            $cart[$id]=[
                "name" => $p->generic_name,
                "quantity" => 1,
                "price" => $p->price,
                "photo" => $p->image
            ];
        }else{
            $cart[$id]["quantity"]++;
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Product added to cart successfully!');
    }

    public function cart(){
        return view('frontend.cart');
    }

    public function index()
    {
        //dgn raw
        //$result = DB::select(DB::raw("select * from medicines"));

        //dgn query builder
        //$result = DB::table('medicines')->get();

        //dengan model
        $result = Medicine::all();
        $DataCategories = Category::all();
        $suppliers = Supplier::all();
        return view('medicine.index', [
            'result' => $result,
            'categories' => $DataCategories,
            'suppliers' => $suppliers
        ]);
    }

    public function showInfo()
    {
        $result = Medicine::orderBy('price', 'desc')->first();
        return response()->json(array(
            'status' => 'oke',
            'msg' => "<div class='alert alert-info'>Did you know? <br>This message is sent by a Controller.' Obat dengan harga termahal bernama" . $result->generic_name . ", Dengan harga " . $result->price . "</div>"
        ), 200);
    }

    public function coba1()
    {

        //Filter
        /*
        $result = DB::table('medicines')->where('price','>','20000')->get();
        return view('medicine.index',[
            'result'=>$result
        ]);

        //agregate . jumlah row
        $result=DB::table('medicines')->count(); // result = 16

        //max
        $result=DB::table('medicines')->max('price');

        //filter
        $result=DB::table('medicines')->where('price','<','20000')->count();

        //Join
        $result=DB::table('medicines')->join('categories','medicines.category_id','=','categories.id')->get();


        //sorting
        $result=DB::table('medicines')->orderBy('price','desc')->get();

        //join, order
        $result=DB::table('medicines')->join('categories','medicines.category_id','=','categories.id')->orderBy('price','desc')->get();
        
        //take
        $result=DB::table('medicines')->join('categories','medicines.category_id','=','categories.id')->orderBy('price','desc')->take(9)->get();
        

        //mendapatkan 1 id
        $result = Medicine::find(3);
        */

        $result = Medicine::all();

        return view('medicine.index', [
            'result' => $result
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view("medicine.create", ["suppliers" => $suppliers, "categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Medicine();
        $data->generic_name = $request->get("generic_name");
        $data->form = $request->get("form");
        $data->restriction_formula = $request->get("restriction_formula");
        $data->price = $request->get("price");
        $data->description = $request->get("description");
        $data->category_id = $request->get("category_id");
        $data->supplier_id = $request->get("supplier_id");
        $data->supplier_id = $request->get("supplier_id");

        $file = $request->file('image');
        $imgFolder='images';
        $imgFile=time()."_".$file->getClientOriginalName();
        $file->move($imgFolder, $imgFile);
        $data->image=$imgFile;

        $data->save();
        return redirect()->route("medicine.index")->with('status', 'data medicine baru berhasil tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        $data = $medicine;
        return view('medicine.show', compact('data'));
    }

    public function show2(Medicine $medicine)
    {
        $data = $medicine;
        return view('medicine.show_detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        $this->authorize('delete-permission', $medicine);
        try {
            $medicine->delete();
            return redirect()->route('medicine.index')->with('status', 'data berhasil dihapus');
        } catch (\PDOException $e) {
            $msg = "Data gagal di hapus";
            return redirect()->route("medicine.index")->with('status', $msg);
        }
    }

    public function getEditForm(Request $request)
    {
        $id = $request->get('id');
        $data = Medicine::find($id);
        $categories = Category::all();
        $suppliers = Supplier::all();
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('medicine.getEditForm', compact('data'), compact("suppliers", 'categories'))->render()
        ), 200);
    }

    public function saveDataField(Request $request){
        $id = $request->get('id');
        $fname = $request->get('fname');
        $value = $request->get('value');

        $medicine = Medicine::find($id);
        $medicine->$fname=$value;
        $medicine->save();

        return response()->json(array(
            'status' => 'ok',
            'msg' => 'medicine data updated'
        ),200);
    }

    public function changeImage(Request $request){
        $id = $request->get('id');
        $file = $request->file('image');
        $imgFolder='images';
        $imgFile=time()."_".$file->getClientOriginalName();
        $file->move($imgFolder, $imgFile);

        $medicine = Medicine::find($id);
        $medicine->image=$imgFile;
        $medicine->save();
        $msg = "Data medicine di ubah";
            return redirect()->route("medicine.index")->with('status', $msg);
    }
}
