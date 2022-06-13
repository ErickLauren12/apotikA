<?php

namespace App\Http\Controllers;

use App\Category;
use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $result = Supplier::all(); 
        $DataCategories = Category::all();

        return view("supplier.index", ["result" => $result],["categories" => $DataCategories]);
    }

    public function create()
    {
        $DataCategories = Category::all();
        return view("supplier.create",["categories" =>$DataCategories]);
    }

    public function store(Request $request)
    {
        $data = new Supplier();

        $file = $request->file('logo');
        $imgFolder='images';
        $imgFile=time()."_".$file->getClientOriginalName();
        $file->move($imgFolder, $imgFile);
        $data->logo=$imgFile;
        

        $data->name = $request->get("name");
        $data->address = $request->get("address");
        $data->category_id = $request->get("id_category");
        $data->save();
        return redirect()->route("supplier.index")->with('status', 'data supplier baru berhasil tersimpan');
    }

    public function edit(Supplier $supplier)
    {
        $data = $supplier;
        $DataCategories = Category::all();
        return view('supplier.edit', compact('data'), compact('DataCategories'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $supplier['name'] = $request->get('name');
        $supplier['address'] = $request->get('address');
        $supplier['category_id'] = $request->get('id_category');
        $supplier->save();
        return redirect()->route("supplier.index")->with('status', 'data supplier berhasil diubah');
    }

    public function destroy(Supplier $supplier)
    {
        $this->authorize('delete-permission',$supplier);
        try {
            $supplier->delete();
            return redirect()->route('supplier.index')->with('status', 'data berhasil dihapus');
        } catch (\PDOException $e) {
            $msg = "Data gagal di hapus";
            return redirect()->route("supplier.index")->with('status',$msg);
        }
    }

    public function getEditForm(Request $request){
        $id = $request->get('id');
        $data = Supplier::find($id);
        $DataCategories = Category::all();
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('supplier.getEditForm', compact('data'), compact("DataCategories"))->render()
        ),200);
    }

    public function getEditForm2(Request $request){
        $id = $request->get('id');
        $data = Supplier::find($id);
        $DataCategories = Category::all();
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('supplier.getEditForm2', compact('data'), compact("DataCategories"))->render()
        ),200);
    }

    public function saveData(Request $request){
        $id = $request->get('id');
        $supplier = Supplier::find($id);
        $supplier->name = $request->get('name');
        $supplier->address = $request->get('address');
        $supplier['category_id'] = $request->get('category_id');
        $supplier->save();

        return response()->json(array(
            'status'=>'ok',
            'msg'=>'Supplier Data Updated'
        ),200);
    }

    public function deleteData(Request $request){
        try{
            $id = $request->get('id');
            $supplier = Supplier::find($id);
            $supplier->delete();
    
            return response()->json(array(
                'status'=>'ok',
                'msg'=>'Supplier Data Deleted'
            ),200);
        }catch(\PDOException $e){
            return response()->json(array(
                'status'=>'error',
                'msg'=>'Supplier Data is Not Deleted'
            ),200);
        }

    }

    public function saveDataField(Request $request){
        $id = $request->get('id');
        $fname = $request->get('fname');
        $value = $request->get('value');

        $supplier = Supplier::find($id);
        $supplier->$fname=$value;
        $supplier->save();

        return response()->json(array(
            'status' => 'ok',
            'msg' => 'supplier data updated'
        ),200);
    }

    public function changeLogo(Request $request){
        $id = $request->get('id');
        $file = $request->file('logo');
        $imgFolder='images';
        $imgFile=time()."_".$file->getClientOriginalName();
        $file->move($imgFolder, $imgFile);

        $supplier = Supplier::find($id);
        $supplier->logo=$imgFile;
        $supplier->save();
        return redirect()->route("supplier.index")->with('status', 'upplier logo berhasil tersimpan');
    }
}
