<?php

namespace App\Http\Controllers\Backend\Produit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Casier;

class ProduitController extends Controller
{
    //
    public function ViewProduit(){
        
        $data['allData'] = Product::all();
        $data['categories'] = Category::all();
        $data['casiers'] = Casier::all();
        
        return view('backend.product.view_product', $data);
    }

    public function ProduitAdd(){
        return view('backend.product.add_product');
    }


    public function ProduitStore(Request $request){

        
        if($request->categoriy_id== 1){
            $casier_id = $request->casier_id;
        }else{
            $casier_id = null;
        }
            $product = new Product();

            $product->name = $request->name;
            $product->unite = $request->unit;
            $product->prix_unitaire = $request->unit_price;
            $product->quantite = $request->quantity;
            $product->categoriy_id  = $request->categoriy_id;
            $product->casier_id = $casier_id;

            $product->save();
            
            return redirect()-> route('product.view')->with('success', '');
     
        
    }


    public function ProduitEdit($id){

        $data['category'] =  Category::find($id);

       
        
        return view('backend.product.edit_product', $data);
    }


    public function ProduitUpdate(Request $request, $id){

        $category =  Category::find($id);

        $category->name = $request->name;

        $category->save();
       
        
        return redirect()-> route('category.product.view')->with('success', '');
    }


    public function ProduitDelete(Request $request){

        $id =$request->id ;

        $category =  Category::find($id);


        $category->delete();
       
        
        return redirect()-> route('category.product.view')->with('success', '');
    }
}
