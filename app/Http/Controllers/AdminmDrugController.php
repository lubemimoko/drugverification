<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Drug;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class AdminmDrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyID = Auth::user()->email;
        $name = Auth::user()->name;
        $drugs=Drug::where("CompanyID", $companyID)->orderBy("id", "desc")->get();
        return view("company.allDrugs", compact("drugs", "name"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view("company.addDrugs");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           
        $this ->validate($request, [
            'name' => ['required', 'string', 'max:255', 'unique:drugs'],
            // 'verification_code' => ['required', 'string', 'email', 'max:255', 'unique:drugs'],
            'nafdac' => ['required' ],
            'logo' => ['required'],
            'expiring_date' => ['required' ],
            'manufacturing_date' => ['required' ],
        ]);

        // echo "inside";die;
        //remember to write JS to validate date and refresh on date attributes

        $data['name'] = $request->name;        
        // $data['verification_code'] = $request->verification_code;
        $data['nafdac'] = $request->nafdac;
        $data['expiring_date'] = $request->expiring_date;
        $data['manufacturing_date'] = $request->manufacturing_date;
        $data['companyID'] = Auth::User()->email;
        $companyID = Auth::User()->email;
        

        if($request->file('logo')){
            $image = $request->file('logo');
            
            $filename    = $image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('drugs_images/' .$filename));
            $data['logo'] = 'drugs_images/'.$filename;        
        }
        
        Drug::create([
            'drugName' => $data['name'],
            // 'verification_code' => $data['verification_code'],
            'nafdac' => $data['nafdac'],
            'logo' => $data['logo'],
            'expiring_date' => $data['expiring_date'],
            'manufacturing_date' => $data['manufacturing_date'],
            'companyID' => $data['companyID'],
            
        ]);
        Session::flash("message", "Drug Inserted Successfully");
            $drugs= Drug::whereCompanyID($companyID)->orderBy("id", "asc")->get();

     return view("company.addDrugs");
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
        if($drug){
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


}
