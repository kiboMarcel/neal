<?php

namespace App\Http\Controllers\Backend\Produit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryProduitController extends Controller
{
    //
    public function ViewCategory(){
        
        $data['allData'] = Category::all();
        
        return view('backend.category.view_category', $data);
    }

    public function CategoryAdd(){
        return view('backend.category.add_category');
    }


    public function CategoryStore(Request $request){

        $category = new Category();

        $category->name = $request->name;

        $category->save();
        
        return redirect()-> route('category.product.view')->with('success', '');
    }


    public function CategoryEdit($id){

        $data['category'] =  Category::find($id);

       
        
        return view('backend.category.edit_category', $data);
    }


    public function CategoryUpdate(Request $request, $id){

        $category =  Category::find($id);

        $category->name = $request->name;

        $category->save();
       
        
        return redirect()-> route('category.product.view')->with('success', '');
    }


    public function CategoryDelete(Request $request){

        $id =$request->id ;

        $category =  Category::find($id);


        $category->delete();
       
        
        return redirect()-> route('category.product.view')->with('success', '');
    }
}
