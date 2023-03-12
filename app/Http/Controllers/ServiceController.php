<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try{
            DB::beginTransaction();

            $service = new Service();

            $service->fname = $request->fname;
            $service->lname = $request->lname;
            $service->section = $request->section;
            $service->email = $request->email;
            $service->cost = "00.00";
            $service->filename = $request->filename;
            $service->options = $request->options;
            $service->quantity = $request->quantity;
            $service->date_placed = Carbon::now();

            //inserting file
            if($file=$request->hasFile('service_file')){
                $file = $request->file('service_file');
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/files';
                $input['service_file'] = 'files/'.$fileName;
                $file->move($destinationPath, $fileName);
                $serv_file = $input['service_file'] = 'files/'.$fileName;
                $service->service_file = $serv_file;
            }

            $service->save();
            

        }catch(\Exception $e){
            dd($e);
            DB::rollback();
            return redirect()->route('service.create')->with('error', $e->getMessage());
        }

        DB::commit();
        return redirect('/')->with('Success', 'Transaction Successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
