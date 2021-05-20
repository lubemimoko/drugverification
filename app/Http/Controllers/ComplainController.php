<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Complain;
use Illuminate\Support\Facades\Auth;
use App\Models\Drug;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //make use of eloquent for pulling data from drugs table
        //pull from also company table
        //for admin
        // $complain = Complain::all();
        // return view("company.allcomplian", compact("compain"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // users to write complain on complain form
        $drugs = Drug::orderBy("DrugName", "asc")->get();
        
       return view("complain", compact("drugs"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'drugID' => ['required', 'string'],
            'reason' => ['required', 'string'],
            'sideEffect' => ['required', 'string'],
            'alergies' => ['required'],
            'addictive' => ['required'],
        ]);
        
        Session::flash("message", "Report Submitted Successfully And Currently Under Review");
            Complain::create($request->all() );
            $drugs = Drug::orderBy("drugName", "asc")->get();
       return view("complain", compact("drugs"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //all complain concerning a drug
        $complains= Complain::where("drugID", $id)->get();
        $drug = Drug::find($id);
        // var_dump($drug->drugName);die;
        return view("company.allcomplain", compact("complains", "drug"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $complain= Complain::find($id);
        $drugID = $complain->drugID;
        
        if(Auth::user()->role == "admin" ){
            $status = $complain->status;
            if($complain->status == 0){
                $complain->status = 1;
            }else{ 
                $complain->status = 0;
                // var_dump($complains);die;
            }
            $complain->save();

            $complains= Complain::where("status", $status)->get();
        }else{
            //when it's not the admin
        $complains= Complain::where("drugID", $drugID)->get();
        }

        //all complain concerning a drug
        $drug = Drug::find($drugID);
        
        return view("company.allcomplain", compact("complains", "drug"));
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


    
    public function index2()
    {
        $complains = DB::table('complain')-> select([DB::RAW('DISTINCT(complain.drugID)'), 'drugs.id', 'drugs.nafdac', 'drugs.drugName', 'drugs.logo', 'drugs.manufacturing_date', 'drugs.expiring_date', 'drugs.status'])->leftJoin("drugs", "complain.drugID", "drugs.id")->where("complain.status", 1)->get();
        // var_dump($complains);die;
        return view("allComplainDrugs", compact("complains"));
   }
    
    public function show3()
    {
        // $complain= Complain::whereDrug($id);
        $complains = $complains = DB::table('complain')-> select([DB::RAW('DISTINCT(complain.drugID)'), 'drugs.id', 'drugs.nafdac', 'drugs.drugName', 'drugs.logo', 'drugs.manufacturing_date', 'drugs.expiring_date', 'drugs.status'])->leftJoin("drugs", "complain.drugID", "drugs.id")->where("drugs.companyID", Auth::user()->email)->get();
        // $complain = 
        // var_dump($complain);die;
        return view("allComplainDrugs", compact("complains"));
    }


}
;