<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Order;

class DashboardController extends Controller
{

    public function index(){

        return view('dashboard.index');
    }

    public function MemberChart(){
        $member = DB::table('membershipinfo')->where(['status' => 'paid'])->groupBy('date_placed')->orderBy('total')->pluck(DB::raw('count(date_placed) as total'), 'date_placed')->all();
        $labels = (array_keys($member));

        $data = array_values($member);
       
        return response()->json(array('data' => $data, 'labels' => $labels));
    }

    public function ServiceChart(){
        $service = DB::table('serviceinfo')->groupBy('section')->orderBy('total')->pluck(DB::raw('count(section) as total'), 'section')->all();
        $labels = (array_keys($service));

        $data = array_values($service);
       
        return response()->json(array('data' => $data, 'labels' => $labels));
    }

    public function serviceQty(){
        
        $service = DB::table('serviceinfo')->groupBy('quantity')->orderBy('total')->pluck(DB::raw('count(quantity) as total'), 'quantity')->all();
        $labels = (array_keys($service));

        $data = array_values($service);
       
        return response()->json(array('data' => $data, 'labels' => $labels));
    }

    public function serviceColor()
    {
        $service = DB::table('serviceinfo')->groupBy('options')->orderBy('total')->pluck(DB::raw('count(options) as total'), 'options')->all();
        $labels = (array_keys($service));

        $data = array_values($service);

        return response()->json(array('data' => $data, 'labels' => $labels));
    }

    public function userRole(){

        $user = DB::table('users')->groupBy('role')->orderBy('total')->pluck(DB::raw('count(role) as total'), 'role')->all();
        $labels = (array_keys($user));

        $data = array_values($user);

        return response()->json(array('data' => $data, 'labels' => $labels));
        
    }

    public function orderProducts(){

      $products = DB::table('orderinfo')
        ->leftJoin('orderline', 'orderinfo.id', '=', 'orderline.orderinfo_id')
        ->leftJoin('products', 'orderline.product_id', '=', 'products.product_id')
        ->groupBy('products.description')
        ->orderBy('total')
        ->pluck(DB::raw('count(products.description) as total'), 'products.description')->all();

        $labels = (array_keys($products));
        $data  = array_values($products);

        return response()->json(array('data' => $data, 'labels' => $labels));
    }
}
