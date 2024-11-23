<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catogories;

class CatogoriesController extends Controller
{
    public function Cateindex(){
        return view('categoris');
    }
    public function showCategori(){
       $catogories=catogories::all();
    
        return view ('CateCRUD.showCategory',['categori'=>$catogories]);
    }
    public function add_catogories(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $catogories=new catogories();
        $catogories->name=$request->name;
        $catogories->save();
        return redirect()->route('showCategori')->with('success', 'Category added successfully.');
        
    }
    public function catEdit($id){
        $category=catogories::find($id);
        return view('CateCRUD.editCate',['categorii'=>$category]);
    }
    public function CateUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $catogories=catogories::find($id);
        $catogories->name=$request->name;
        $catogories->save();
        return redirect()->route('showCategori')->with('success', 'Category added successfully.');
    }
    public function delete($id){
        $catogories=catogories::find($id);
        $catogories->delete();
        return redirect()->route('showCategori')->with('success', 'Category deleted successfully.');
    }
}
