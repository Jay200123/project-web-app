<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\DataTables\ProductDataTable;
use Yajra\DataTables\Facades\DataTables;
use App\Imports\ProductImport;
use App\Rules\ExcelRule;
use Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //fetch all the data from the product table and passes it to the product index
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //gets the create form for product
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'description' => 'required|max:255',
            'price' => 'required|min:1',
            'product_image' => 'mimes:png,jpg,gif,svg',
        ]);

        // saves and store the data from product create form 
          $product = new Product();
          $product->description = $request->description;
          $product->price = $request->price;


         if($file = $request->hasFile('product_image')) {
         $file = $request->file('product_image') ;
         $fileName = $file->getClientOriginalName();
         $destinationPath = public_path().'/images' ;
         $input['product_image'] = 'images/'.$fileName;
         $image =  $input['product_image'] = 'images/'.$fileName;
         $file->move($destinationPath,$fileName);
         $product->product_image = $image;
        }

        $product->save(); //saves the data 

       return redirect()->route('products.datatable')->with('success','Product Successfully Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //finds the product id for updating data 
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //updates the data through getting the product id 
        $product = Product::findOrFail($id);

        $input = $request->all(); 

         $request->validate([

        'description' => 'required|max:255',
        'price' => 'required|min:1',
        'product_image' => 'mimes:png,jpg,gif,svg',
            
        ]);

        if($file = $request->hasFile('product_image')) {
        $file = $request->file('product_image');
        $fileName = $file->getClientOriginalName();
        $destinationPath = public_path().'/img_path' ;
        $input['product_image'] = 'img_path/'.$fileName;
        $image = $input['product_image'] = 'img_path/'.$fileName;
        $file->move($destinationPath, $fileName);
        }

        $product->description = $request->description;
        $product->price = $request->price;
        $product->product_image = $image;
        
        $product->update($input);
        return redirect()->route('products.datatable')->with('Success', 'Product Record Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {

        //finds the product id to a specific row and perform a delete request
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.datatable')->with('success', 'Product Successfully Deleted');    
    }

    public function getProduct(ProductDataTable $dataTable){

        $products = Product::with([])->get();
        return $dataTable->render('product.products');

    }

    public function import(Request $request){

        $request->validate(['product_import'  => ['required', new ExcelRule($request->file('product_import'))], ]);

        Excel::import(new ProductImport, request()->file('product_import'));

        return redirect()->back()->with('success', 'Excel File Imported Successfully');

    }
}
