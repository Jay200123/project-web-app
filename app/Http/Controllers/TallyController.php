<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DomPDF;


class TallyController extends Controller
{
    // function for fetching data 
    public function testTally(){

        //tally for total orders mark as finished
        $finished = DB::table('products')
         ->join('orderline', 'products.product_id', '=', 'orderline.product_id')
         ->join('orderinfo', 'orderline.orderinfo_id', '=', 'orderinfo.id')
         ->where('orderinfo.status', '=', 'Finished')
         ->select(DB::raw('SUM(price) as total'))
         ->get('total');

         //tally for total orders mark as process
         $process = DB::table('products')
         ->join('orderline', 'products.product_id', '=', 'orderline.product_id')
         ->join('orderinfo', 'orderline.orderinfo_id', '=', 'orderinfo.id')
         ->where('orderinfo.status', '=', 'processing')
         ->select(DB::raw('SUM(price) as total'))
         ->get('total');

         $lace = DB::table('products')
         ->join('orderline', 'products.product_id', '=', 'orderline.product_id')
         ->join('orderinfo', 'orderline.orderinfo_id', '=', 'orderinfo.id')
         ->where('products.description', '=', 'ID Lace  ')
         ->select(DB::raw('SUM(price) as total'))
         ->get('total');

        //  tally for tech shirt small 
         $small = DB::table('products')
         ->join('orderline', 'products.product_id', '=', 'orderline.product_id')
         ->join('orderinfo', 'orderline.orderinfo_id', '=', 'orderinfo.id')
         ->where('products.description', '=', 'Tech Shirt - Small')
         ->select(DB::raw('SUM(price) as total'))
         ->get('total');

          //  tally for tech shirt medium 
         $medium = DB::table('products')
         ->join('orderline', 'products.product_id', '=', 'orderline.product_id')
         ->join('orderinfo', 'orderline.orderinfo_id', '=', 'orderinfo.id')
         ->where('products.description', '=', 'Tech Shirt Medium')
         ->select(DB::raw('SUM(price) as total'))
         ->get('total');

        //  tally for tech shirt large
         $large = DB::table('products')
         ->join('orderline', 'products.product_id', '=', 'orderline.product_id')
         ->join('orderinfo', 'orderline.orderinfo_id', '=', 'orderinfo.id')
         ->where('products.description', '=', 'Tech Shirt Large')
         ->select(DB::raw('SUM(price) as total'))
         ->get('total');

        //  total tally for printing service
         $print = DB::table('serviceinfo')
         ->select(DB::raw('SUM(cost) as total'))
         ->get('total');

         //total for colored printing service
         $colored = DB::table('serviceinfo')
         ->where('options', '=', 'colored')
         ->select(DB::raw('SUM(cost) as total'))
         ->get('total');

         //total for black printing service
         $black = DB::table('serviceinfo')
         ->where('options', '=', 'blackWhite')
         ->select(DB::raw('SUM(cost) as total'))
         ->get('total');

         //total for small size printing service
         $sml = DB::table('serviceinfo')
         ->where('size', '=', 'small')
         ->select(DB::raw('SUM(cost) as total'))
         ->get('total');

         //total for medium size printing service
         $mdm = DB::table('serviceinfo')
         ->where('size', '=', 'medium')
         ->select(DB::raw('SUM(cost) as total'))
         ->get('total');

         //total for large size printing service
         $lrg = DB::table('serviceinfo')
         ->where('size', '=', 'large')
         ->select(DB::raw('SUM(cost) as total'))
         ->get('total');

          //total for a4 size printing service
          $a4 = DB::table('serviceinfo')
          ->where('size', '=', 'A4')
          ->select(DB::raw('SUM(cost) as total'))
          ->get('total');

          $member = DB::table('membershipinfo')
          ->join('statusline', 'membershipinfo.info_id', '=', 'statusline.info_id')
          ->select(DB::raw('SUM(statusline.amount) as total'))
          ->get();

          $unpaid = DB::table('membershipinfo')
          ->join('statusline', 'membershipinfo.info_id', '=', 'statusline.info_id')
          ->where('membershipinfo.status', '=', 'unpaid')
          ->select(DB::raw('SUM(statusline.amount) as total'))
          ->get();

          $paid = DB::table('membershipinfo')
          ->join('statusline', 'membershipinfo.info_id', '=', 'statusline.info_id')
          ->where('membershipinfo.status', '=', 'paid')
          ->select(DB::raw('SUM(statusline.amount) as total'))
          ->get();

          $total = 0;

          // Sum up the value of the "total" column for each variable
          $total += $finished[0]->total; // gets the sum for finished orders
          $total += $print[0]->total; //gets the sum for paid printing services
          $total += $paid[0]->total; // gets the sum for paid membership

          $total2 = 0;

          $total2 += $process[0]->total;
          $total2 += $unpaid[0]->total;

         $data = [
             'finished' => $finished,
             'process' => $process,
             'small' => $small,
             'lace' => $lace,
             'medium' => $medium,
             'large' => $large,
             'print' => $print,
             'colored' => $colored,
             'black' => $black,
             'sml' => $sml,
             'mdm' => $mdm,
             'lrg' => $lrg,
             'a4' => $a4,
             'member' => $member,
             'unpaid' => $unpaid,
             'paid' => $paid,
         ];
 
         return view('tally', compact('data', 'total', 'total2'));
     }

     //function for creating pdf
     public function generatePDF(){

         //tally for total orders mark as finished
         $finished = DB::table('products')
         ->join('orderline', 'products.product_id', '=', 'orderline.product_id')
         ->join('orderinfo', 'orderline.orderinfo_id', '=', 'orderinfo.id')
         ->where('orderinfo.status', '=', 'Finished')
         ->select(DB::raw('SUM(price) as total'))
         ->first();

         //tally for total orders mark as process
         $process = DB::table('products')
         ->join('orderline', 'products.product_id', '=', 'orderline.product_id')
         ->join('orderinfo', 'orderline.orderinfo_id', '=', 'orderinfo.id')
         ->where('orderinfo.status', '=', 'processing')
         ->select(DB::raw('SUM(price) as total'))
         ->first();

         $lace = DB::table('products')
         ->join('orderline', 'products.product_id', '=', 'orderline.product_id')
         ->join('orderinfo', 'orderline.orderinfo_id', '=', 'orderinfo.id')
         ->where('products.description', '=', 'ID Lace  ')
         ->select(DB::raw('SUM(price) as total'))
         ->first();

        //  tally for tech shirt small 
         $small = DB::table('products')
         ->join('orderline', 'products.product_id', '=', 'orderline.product_id')
         ->join('orderinfo', 'orderline.orderinfo_id', '=', 'orderinfo.id')
         ->where('products.description', '=', 'Tech Shirt - Small')
         ->select(DB::raw('SUM(price) as total'))
         ->first();

          //  tally for tech shirt medium 
         $medium = DB::table('products')
         ->join('orderline', 'products.product_id', '=', 'orderline.product_id')
         ->join('orderinfo', 'orderline.orderinfo_id', '=', 'orderinfo.id')
         ->where('products.description', '=', 'Tech Shirt Medium')
         ->select(DB::raw('SUM(price) as total'))
         ->first();

        //  tally for tech shirt large
         $large = DB::table('products')
         ->join('orderline', 'products.product_id', '=', 'orderline.product_id')
         ->join('orderinfo', 'orderline.orderinfo_id', '=', 'orderinfo.id')
         ->where('products.description', '=', 'Tech Shirt Large')
         ->select(DB::raw('SUM(price) as total'))
         ->first();

        //  total tally for printing service
         $print = DB::table('serviceinfo')
         ->select(DB::raw('SUM(cost) as total'))
         ->first();

         //total for colored printing service
         $colored = DB::table('serviceinfo')
         ->where('options', '=', 'colored')
         ->select(DB::raw('SUM(cost) as total'))
         ->first();

         //total for black printing service
         $black = DB::table('serviceinfo')
         ->where('options', '=', 'blackWhite')
         ->select(DB::raw('SUM(cost) as total'))
         ->first();

         //total for small size printing service
         $sml = DB::table('serviceinfo')
         ->where('size', '=', 'small')
         ->select(DB::raw('SUM(cost) as total'))
         ->first();

         //total for medium size printing service
         $mdm = DB::table('serviceinfo')
         ->where('size', '=', 'medium')
         ->select(DB::raw('SUM(cost) as total'))
         ->first();

         //total for large size printing service
         $lrg = DB::table('serviceinfo')
         ->where('size', '=', 'large')
         ->select(DB::raw('SUM(cost) as total'))
         ->first();

          //total for a4 size printing service
          $a4 = DB::table('serviceinfo')
          ->where('size', '=', 'A4')
          ->select(DB::raw('SUM(cost) as total'))
          ->first();

          $member = DB::table('membershipinfo')
          ->join('statusline', 'membershipinfo.info_id', '=', 'statusline.info_id')
          ->select(DB::raw('SUM(statusline.amount) as total'))
          ->first();

          $unpaid = DB::table('membershipinfo')
          ->join('statusline', 'membershipinfo.info_id', '=', 'statusline.info_id')
          ->where('membershipinfo.status', '=', 'unpaid')
          ->select(DB::raw('SUM(statusline.amount) as total'))
          ->first();

          $paid = DB::table('membershipinfo')
          ->join('statusline', 'membershipinfo.info_id', '=', 'statusline.info_id')
          ->where('membershipinfo.status', '=', 'paid')
          ->select(DB::raw('SUM(statusline.amount) as total'))
          ->first();

          $total = 0;

          // Sum up the value of the "total" column for each variable
          $total += $finished->total; // gets the sum for finished orders
          $total += $print->total; //gets the sum for paid printing services
          $total += $paid->total; // gets the sum for paid membership

          $total2 = 0;

          $total2 += $process->total;
          $total2 += $unpaid->total;

          $data = [
            'finished' => $finished,
            'process' => $process,
            'small' => $small,
            'lace' => $lace,
            'medium' => $medium,
            'large' => $large,
            'print' => $print,
            'colored' => $colored,
            'black' => $black,
            'sml' => $sml,
            'mdm' => $mdm,
            'lrg' => $lrg,
            'a4' => $a4,
            'member' => $member,
            'unpaid' => $unpaid,
            'paid' => $paid,
            'total' => [$total, $total2],
        ];

        $pdf = DomPDF::loadView('tally_reciept', $data)->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('transactionReports.pdf');


     }

}
