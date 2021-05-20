<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Drug;
use App\Models\User; 
use App\Models\Company;
use App\Models\Complain;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function __construct(){
        $this->middleware("isAdmin");
    }

    public function company($status)
    {
        
        $companies = DB::table('users')->join("companies", "users.email", "companies.email")->where("status", $status)->orderBy("users.id", "desc")->get();
        return view("admin.allcompanies", compact("companies"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function complains($status)
    {
        $complains = DB::table('drugs')->join("complain", "drugs.id", "complain.drugID")->where("complain.status", $status)->orderBy("complain.id", "desc")->get();
        return view("company/allcomplain", compact("complains"));
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function drugs($id)
    {
        $drugs = Drug::where("companyID",$id)->get();
        $company = Company::whereEmail($id)->first();
        if($company){
            $name = $company->name;
        }
        
        if($drugs){
            Session::flash("error", "Records not found");
        }
        return view("admin/allDrugs", compact('drugs', 'name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drug = Drug::find($id);
        if(!$drug){
            Session::flash("error", "Records not found");
        }
        return view("company/editDrugs", compact('drug'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
    
            $drug = Drug::find($id);
            if($drug){
                Session::flash("error", "Records not found");
            }
            return view("company/editDrugs", compact('drug'));
    
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
                $this ->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'nafdac' => ['required' ],
            'expiring_date' => ['required' ],
            'manufacturing_date' => ['required' ],
        ]);

        //remember to write JS to validate date and refresh on date attributes

        $drug = Drug::find($id);
        
        if($request->file('logo')){
            $image = $request->file('logo');
            
            $filename    = $image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('drugs_images/' .$filename));
            $drug->logo = 'drugs_images/'.$filename;        
        }
        
        
       $drug->drugName = $request->name;        
        $drug->nafdac = $request->nafdac;
        $drug->expiring_date = $request->expiring_date;
        $drug->manufacturing_date = $request->manufacturing_date;

        $drug->save();
        

        Session::flash("message", "Records Inserted Successfully");
        $companyID=Auth::User()->email;
        $drugs= Drug::whereCompanyID($companyID)->order("id", "asc")->get();

     return view("company.editDrugs", compact("drugs"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Drug::delete($id);
        return view("company.allDrugs", compact("drugs"));
    }

    public function search($id)
    {
        // Model::where(function ($query) {
        //     $query->where('a', '=', 1)
        //           ->orWhere('b', '=', 1);
        // })->where(function ($query) {
        //     $query->where('c', '=', 1)
        //           ->orWhere('d', '=', 1);
        // });
        $drugs = DB::table('drugs')->where('drugName','LIKE','%'.$id.'%') ->orWhere('nafdac', 'LIKE', '%'.$id.'%')->limit(6)->get();
            //  var_dump($drugs);die;
        if(count($drugs)>0){
            return response()->json($drugs);
        }
         return response()->json("{'data':'Not Found!'}");
        
        
    }

    public function search2($id)
    {
        
        $drugs = DB::table('drugs')->join("companies", "drugs.companyID", "companies.email")->where('drugs.drugName','=', $id )->orWhere('drugs.nafdac', '=', $id)->orWhere('drugs.id', '=', $id)->first();
        $drug = DB::table('drugs')->where('drugs.drugName','=', $id )->orWhere('drugs.nafdac', '=', $id)->orWhere('drugs.id', '=', $id)->first();
        $complain = DB::table("complain")->where('drugID', '=', $drug->id)->count("id");
            //  var_dump($complain);die;
        if($drugs){
            $drugs->complain = $complain; //var_dump($drugs);die;
            return response()->json($drugs);
        }
         return response()->json("{'data':'Not Found!'}");
        
        
    }

    public function home()
    {
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
        // var_dump();
        return view("admin.index", compact("approvedCompanies", "unapprovedCompanies", "disabledCompanies", "unapprovedComplains", "approvedComplains"));
        // die;

    }
}
