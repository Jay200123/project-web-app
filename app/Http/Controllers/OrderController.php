<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\OrderDataTable;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Order;
use DomPDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('student','products')->orderBy('id', 'ASC')->paginate(5);   
        // foreach($orders as $order){
        //     $order->student->fname;
        //     $order->student->lname;

        //     foreach($order->products as $product)

        //     $product->description;
        //     $product->price;
        // }
        //  dd($product);
        return view('order.index', compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //are to be found in the CartController public function postCheckout
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders = Order::findOrFail($id);
        return view('order.edit', compact('orders'));
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        $order->date_placed = $request->date_placed;
        $order->status = "Finished";

        $products = $order->products;

        $data = [   
            'title' => 'MTICS Merchandise',
            'order_id' =>  $order->id,
            'date_placed' => $order->date_placed,
            'date_paid' => now(),
            'fname' => $order->student->fname,
            'lname' => $order->student->lname,
            'section' => $order->student->section,
            'products' => $products,
        ];

        $pdf = DomPDF::loadView('shop.reciept', $data)->setOptions(['defaultFont' => 'sans-serif']);

        // dd($orders);
        $order->update();

        return $pdf->download('shopreciept.pdf', ['order' =>$order]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders = Order::findOrFail($id);
        $orders->delete();

        return redirect()->route('order.index')->with('success','Transaction Record Deleted Successfully');
    }

    public function getOrder(OrderDataTable $dataTable){

        $orders = Order::with([])->get();
        return $dataTable->render('order.orders');

    }
}
