<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Category;
use App\Medicine;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function show(){
        //query 1 table

        //all drug
        $catE = Category::all();
        $catD = DB::table('categories')->get();

        //all medicines
        $medE = Medicine::select('generic_name','form','price')->get();
        $medD = DB::table('medicines')->select('generic_name','form','price')->get();

        //Inner join
        $joinE = Medicine::join('categories','category_id','=','categories.id')->select('medicines.*','categories.name')->get();
        $joinD = DB::table('medicines')->join('categories','category_id','=','categories.id')->select('medicines.*','categories.name')->get();
        
        //Filter =
        $hasDataE = Category::has('medicines')->count();
        $hasDataD = DB::table('categories as c')->join('medicines as m','m.category_id','=','c.id')->groupBy('c.name')->get()->count();

        $doesntHasDataE = Category::doesnthave('medicines')->get('name');
        $doesntHasDataD = DB::table('categories')->where(function($query){
            $query->select(DB::raw('count(*) from medicines where medicines.category_id = categories.id'));
        },'=',0)->get('name');

        $avgE = Category::select(DB::raw('categories.name, IFNULL(avg(m.price),0) as avg'))->leftJoin('medicines as m','categories.id','=','m.category_id')->groupBy('categories.name')->get();
        $avgD = DB::table('categories')->select(DB::raw('categories.name, IFNULL(avg(m.price),0) as avg'))->leftJoin('medicines as m','categories.id','=','m.category_id')->groupBy('categories.name')->get();

        $oneE = Category::where(function($query){
            $query->select(DB::raw('count(*) from medicines where medicines.category_id = categories.id'));
        },'=',1)->get();
        $oneD = DB::table('categories')->where(function($query){
            $query->select(DB::raw('count(*) from medicines where medicines.category_id = categories.id'));
        },'=',1)->get();

        $singleE = Medicine::groupBy('generic_name')->havingRaw('count(*) = ?',[1])->get();
        $singleD = DB::table('medicines')->groupBy('generic_name')->havingRaw('count(*) = ?',[1])->get();
        
        $subE = Medicine::select(DB::raw('generic_name, category_id, max(price) as price'))->groupBy('category_id')->orderBy('price','DESC');
        $maxE = Category::select('name','b.generic_name')->joinSub($subE,'b',function($join){$join->on('categories.id','=','b.category_id');})->groupBy('categories.name')->orderBy('b.price','DESC')->take(1)->get();
        
        $subD = DB::table('medicines')->select(DB::raw('generic_name, category_id, max(price) as price'))->groupBy('category_id')->orderBy('price','DESC');
        $maxD = DB::table('categories')->select('name','b.generic_name')->joinSub($subD,'b',function($join){$join->on('categories.id','=','b.category_id');})->groupBy('categories.name')->orderBy('b.price','DESC')->take(1)->get();
        dd($maxE);
        return view('data.index',[
            'catE' =>$catE,
            'catD' =>$catD,

            'medE'=>$medE,
            'medD'=>$medD,

            'joinE' =>$joinE,
            'joinD' =>$joinD,

            'hasDataE' => $hasDataE,
            'hasDataD' => $hasDataD,

            'doesntHasDataE' => $doesntHasDataE,
            'doesntHasDataD' => $doesntHasDataD,

            'avgE' => $avgE,
            'avgD' => $avgD,

            'oneE' => $oneE,
            'oneD' => $oneD,

            'singleE' =>$singleE,
            'singleD' =>$singleD,
            
            'maxE' => $maxE,
            'maxD' => $maxD
        ]);
    }

    public function highestPrice(){
        $subE = Medicine::select(DB::raw('generic_name, category_id, max(price) as price'))->groupBy('category_id')->orderBy('price','DESC');
        $maxE = Category::select('name','b.generic_name','b.price')->joinSub($subE,'b',function($join){$join->on('categories.id','=','b.category_id');})->groupBy('categories.name')->orderBy('b.price','DESC')->get();
        return view('report.list_highest_price',[
            'result'=>$maxE
        ]);
    }
}
