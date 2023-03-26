<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Product;
use App\Models\Order;
use App\Cart;
use Carbon\Carbon;

use Session;
use DB;
use Auth;

class CartController extends Controller
{
    public function shop()
    {
        $products = Product::orderBy('product_id')->paginate(6);
        return view('shop.index', compact('products'));
    }

    public function getCart() {
        if (!Session::has('Cart')) {
            return view('shop.shopping-Cart');
        }
        $oldCart = Session::get('Cart');
        $Cart = new Cart($oldCart);
        // dd($oldCart);
        return view('shop.shopping-Cart', ['products' => $Cart->products, 'totalPrice' => $Cart->totalPrice]);
    }

    public function getAddToCart(Request $request , $id){
        $product= Product::find($id);
        $oldCart = Session::has('Cart') ? Session::get('Cart'): null;

        $Cart = new Cart($oldCart);
        $Cart->add($product, $product->product_id);
        Session::put('Cart', $Cart);
        Session::save();
        return redirect()->route('shop.index');
    }

    public function getRemoveItem($id){
        $oldCart = Session::has('Cart') ? Session::get('Cart') : null;
        $Cart = new Cart($oldCart);
        $Cart->removeItem($id);
        if (count($Cart->products) > 0) {
            Session::put('Cart',$Cart);
            Session::save();
        }else{
            Session::forget('Cart');
        }
         return redirect()->route('shop.shoppingCart');
    }

    public function getReduceByOne($id){
        $oldCart = Session::has('Cart') ? Session::get('Cart') : null;
        $Cart = new Cart($oldCart);
        $Cart->reduceByOne($id);
        if (count($Cart->products) > 0) {
            Session::put('Cart',$Cart);
            Session::save();
        }else{
            Session::forget('Cart');
        }        
        return redirect()->route('shop.shoppingCart');
    }

    public function postCheckout(Request $request) {
        // Get the currently authenticated student
        $student = Student::where('user_id', Auth::id())->first();
        
        if (!Session::has('Cart')) {
            return redirect()->route('shop.shoppingCart');
        }
                        
        $oldCart = Session::get('Cart');
        $Cart = new Cart($oldCart);
    
        try {
            DB::beginTransaction();
                
            $order = new Order();
            $order->student_id = $student->student_id;
            $order->date_placed = Carbon::now();
            $order->status = 'processing';
            $order->save();
    
            foreach($Cart->products as $product) {
                $id  = $product['product']['product_id'];
                    
                DB::table('orderline')->insert([
                    'product_id' => $id, 
                    'orderinfo_id' => $order->id,
                ]);
            }
        } catch(Exception $e) {
            DB::rollBack();
            return redirect()->route('shop.shopping-cart')->with('error', $e->getMessage());
        }
             
        DB::commit();
        Session::forget('Cart');
        return redirect()->route('shop.index')->with('success','Product Checkout Successful!');
    }
}
