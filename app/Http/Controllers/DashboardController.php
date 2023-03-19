<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
}
