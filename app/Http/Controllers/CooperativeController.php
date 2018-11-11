<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Cooporative;
use Illuminate\Http\Request;
use App\Http\Requests\createCooperativeForm;
class CooperativeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $title = 'Cooperative Management System | Staco Insurance | ERP';
        $cooporatives = Cooporative::all();
        //dd($cooperatives);

        $data = [
            'title' => $title,
            'cooporatives' => $cooporatives,
        ];

        return view('admin.cooperatives', $data);
    }

    public function create (){
        $title = 'Cooperative Management System | Staco Insurance | ERP';
      

        $data = [
            'title' => $title,
        ];

        return view('admin.createcooperative', $data);
    }

    public function viewCooporative ($cooporative_id){

    }

    public function doCreate (createCooperativeForm $requests){
       
        $cooporative = New Cooporative;
            $cooporative->cooporative_name = $requests['cooporative_name'];
            $cooporative->cooporative_desc = $requests['cooporative_description'];
            $cooporative->contact_name = $requests['contact_name'];
            $cooporative->contact_email = $requests['contact_email'];
            $cooporative->cooporative_status = 0;
        $cooporative->save();

        return \Redirect::back()->with('message', 'Cooperative has been successfully added!');
    }
}
