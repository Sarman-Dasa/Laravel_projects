<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class departmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //--------------------// All Data Get //--------------------------//

        $data =  DB::table('departments')->get();

       //--------------------// Only '.com' email record get //--------------------------//

       // $data =  DB::table('departments')->where('department_email','like','%.com%')->get();

      //-----------------//Display only specific column name data //-----------------------//

     //   $data =  DB::table('departments')->where('department_email','like','%.com%')->value('department_name');
    //   dd($data);
    

    // ------------------// Key Value pair data get //-----------------//
        //$data =  DB::table('departments')->pluck('department_mobile_number','department_name');   
       // dd($data);
      
    
       //-----------// get how many record in database table //----------------//
        //Aggregates
        //$data  = DB::table('departments')->count();
        //dd($data);

        // //----------// if record is exists //---------------------//
        // if(DB::table('departments')->where('id',20)->exists()){
        //     dd('yes');
        // }

          //----------// if record is not exists //---------------------//
        //   if(DB::table('departments')->where('id',40)->doesntExist()){
        //     dd('data not found');
        // }

        //------------ get specifuc column on database table
        //$data = DB::table('departments')->select('department_name','department_email')->get();
        //dd($data);
        

        //orWhere Method

        // $data = DB::table('departments')->where('id','=','4')->orWhere('department_email','like','%com%')->get();
        // dd($data);

        //---------------//Oldest Data get //----------------------//

        // $data = DB::table('departments')->oldest('created_at')->first();
        // dd($data);

        //--------------// Random Order Data ger //------------------//

         // $data = DB::table('departments')->inRandomOrder()->get();
        // dd($data);


        //-------------------// take method //------------------//

        //$data =  DB::table('departments')->take(5)->get();

        //--------------//skip //-----------------//

       // $data =  DB::table('departments')->skip(5)->take(5)->get();

        return view('Department.DisplayData',['data'=>$data]);
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
