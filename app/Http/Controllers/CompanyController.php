<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       return view("register");
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "create";die;
    //    return view("register");
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
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'logo' => ['required'],
            'address' => ['required', 'unique:companies'],
        ]);


        $data['name'] = $request->name;        
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['address'] = $request->address;
        

        if($request->file('logo')){
            $image = $request->file('logo');
            
            $filename    = $image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('images/' .$filename));
            $data['logo'] = 'images/'.$filename;        
        }
        

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => '1',
        ]);

        Company::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'logo' => $data['logo'],
            
        ]);

        Session::flash("message", "Records Inserted Successfully");
        return view("register");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        // return view("admin/admineditcompany", compact("company", 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::where("id",$id)->orWhere("email", $id)->first();
        return view("/company/editbiodata", compact('company'));
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
            'email' => ['required', 'string', 'email', 'max:255'],
            'address' => ['required'],
        ]);

        $company = Company::find($id);
        
        if($request->file('logo')){
            $image = $request->file('logo');
            $image_path = $company->logo;

            if (File::exists($image_path)) {
                unlink($image_path);
            }

            $filename    = $image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('images/' .$filename));
            $company ->logo= 'images/'.$filename; 
        }       
            
        $company ->name = $request->name;        
        $company->email = $request->email;
        $company-> address = $request->address;
        
        
        $user = User::whereEmail($company->email)->first();
        $user->name = $request->name;
        if($request->password){
            $this ->validate($request, [
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
    
            $password = Hash::make($request->password);
            $user->password = $password;
           
        }
        $company->save();
        
        $user->save();

        Session::flash("message", "Records Update Was Successfully");
        return view("company/editbiodata", compact('company'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "destroy";die;
    }



 //ADMIN STARTS HERE
    
    public function show2($id)
    {
        $company = Company::find($id);
        $user = User::whereEmail($company->email)->first();
        
        return view("admin/admineditcompany", compact("company", 'user'));
    }


    public function update2(Request $request, $id)
    {
        $company = Company::find($id);

        $this ->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'address' => ['required'],
            'status' => ['required'],
        ]);

        $company = Company::find($id);
        
        if($request->file('logo')){
            $image = $request->file('logo');
            $image_path = $company->logo;

            if (File::exists($image_path)) {
                unlink($image_path);
            }

            $filename    = $image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('images/' .$filename));
            $company ->logo= 'images/'.$filename; 
        }       
            
        $company ->name = $request->name;        
        $company->email = $request->email;
        $company-> address = $request->address;
        $company->save();
        
        $user = User::whereEmail($company->email)->first();
        $user->status = $request->status;
        $user->save();
        // echo $user->status; echo " ".$request->status;
            

        Session::flash("message", "Records Update Was Successfully");
        return view("admin/admineditcompany", compact('company', 'user'));
                
    }//end of update2



}