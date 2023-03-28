<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Student;
use Illuminate\Http\Request;
use App\DataTables\ServiceDataTable;
use Yajra\DataTables\Facades\DataTables;
use App\Events\ServiceMail;
use App\Events\ServiceMessageMail;
use DB;
use Auth;
use Event;
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

        //fetch all the data from serviceinfo table 
        $service = Service::orderBy('service_id', 'ASC')->paginate('5');

        //return to the service index views and passes the service variable as a string through compact()
        return view('service.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //gets the service form which is accessible to anyone
        return view('service.create');
    }

    public function studentCreate(){

        //gets the other service form which is only accessible to MTICS Students 
        $students = Student::where('user_id', Auth::id())->first();

        //return to the service student_create form and passes the student variable as a string through compact()
        return view('service.student_create', compact('students'));
    }


    public function getMessage(){
         // gets the service success message 
        return view('service.message');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //performs a service transaction for Services
        try{
            DB::beginTransaction();

            $service = new Service();

            $service->fname = $request->fname;
            $service->lname = $request->lname;
            $service->size = $request->size;
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
            Event::dispatch(new ServiceMessageMail($service)); //sends an email that the service transaction is a success
            

        }catch(\Exception $e){
            dd($e);
            DB::rollback();
            return redirect()->route('service.create')->with('error', $e->getMessage());
        }

        DB::commit();
        return redirect()->route('service.msg')->with('Success', 'Transaction Successful!');
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
    public function edit($id)
    {

        //edit form for services
        $service = Service::findOrFail($id);
        return view('service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //updates the MTICS Printing Service 
        $service = Service::findOrFail($id);

        $service->fname = $request->fname;
            $service->lname = $request->lname;
            $service->size = $request->size;
            $service->section = $request->section;
            $service->email = $request->email;
            $service->cost = $request->cost;
            $service->filename = $request->filename;
            $service->options = $request->options;
            $service->quantity = $request->quantity;
            $service->date_placed = $request->date_placed;

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

            
            $service->update();
            Event::dispatch(new ServiceMail($service)); //sends an email to the user detailing the service

            return redirect()->route('service.index')->with('success', 'Transaction Updated Sucessfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete function for service 
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('service.index')->with('success', 'Record Deleted');
        
    }

    public function getService(ServiceDataTable $dataTable){

        $service = Service::with([])->get();
        return $dataTable->render('service.services');

    }
}
