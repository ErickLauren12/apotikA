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
        try {
            $supplier->delete();
            return redirect()->route('supplier.index')->with('status', 'data berhasil dihapus');
        } catch (\PDOException $e) {
            $msg = "Data gagal di hapus";
            return redirect()->route("supplier.index")->with('status',$msg);
        }
    }
}
