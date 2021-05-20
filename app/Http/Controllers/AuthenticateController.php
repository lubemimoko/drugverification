<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Drug;
use App\Models\User; 
use App\Models\Company;
use App\Models\Complain;

class AuthenticateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware("auth");
    }

    public function index()
    { 
        if(!empty(Auth::user()->role)){     
            if(Auth::user()->status == 1 && Auth::user()->role == "admin"){
                
            $approvedCompan = User::whereStatus("1")->get();
            $approvedCompanies = $approvedCompan->count("id");

            $unapprovedCompan = User::whereStatus("0")->get();
            $unapprovedCompanies = $unapprovedCompan->count("id");

            $disabledCompan = User::whereStatus("-1")->get("id");
            $disabledCompanies = $disabledCompan->count();

            $unapprovedCompla = Complain::whereStatus("0")->get();
            $unapprovedComplains = $unapprovedCompla->count("id");

            $approvedCompla = Complain::whereStatus("1")->get("id");
            $approvedComplains = $approvedCompla->count();
            return view("admin.index", compact("approvedCompanies", "unapprovedCompanies", "disabledCompanies", "unapprovedComplains", "approvedComplains"));

        }else if(Auth::user()->status == 1 && Auth::user()->role == "company"){
            $email = Auth::user()->email;
            $company = Company::where("email",$email)->first();
            return view("company.editbiodata", compact("company"));
        }else if(Auth::user()->status < 1){// if status !=1
            Auth::logout();
            Session::flash("errormessage", "Your Account Is Inactive And Needs To be Activated By Admin ");
            return view("register");
        }
    
    }else{//die;
            return view("register");
            
        }
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
        //
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