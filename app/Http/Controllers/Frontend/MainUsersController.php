<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\minidoctoremail;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

use App\Models\Staticpages;

use Hash;
use App\Models\Doctors;
use App\Models\Patients;
use App\Models\Emailtemplates;

class MainUsersController extends Controller
{
    public function signuppatients(){

        return view("frontend.signuppatients",[
            'page_title'     => "Signup As Patients",
            'page_descp'     => "",
            "page_keyword"   => ""
        ]);
    }


    public function signupdoctors(){
        return view("frontend.signupdoctors",[
            'page_title'     => "Signup As Doctors",
            'page_descp'     => "",
            "page_keyword"   => ""
        ]);
    }

    public function login(){
        return view("frontend.login",[
            'page_title'     => "Login",
            'page_descp'     => "",
            "page_keyword"   => ""
        ]);
    }

    public function loginprocess(Request $request){
        $rules = [
            'email'       => 'required',
            'password'    => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
    
        if ($validator->fails()){
            //return redirect()->route("login")->withInput()->withErrors($validator);
            return back()->withInput()->withErrors($validator);
        }
        
        $email        = "";
        $password     = "";

        if (Auth::guard('doctors')->attempt(['email' => $request->email, 'password' => $request->password])) {
            //echo (Auth::guard('admin')->check());
            //exit;
            //return redirect()->route("administrative.dashboard")->with("msg","Data Added Successfully.");
            $request->session()->put('loggedin_user_id',Auth::guard('doctors')->user()->doctors_id);
            $request->session()->put('loggedin_user_name',Auth::guard('doctors')->user()->name);
            return redirect()->route("dashboarddoctor");
        }else{
            $request->session()->flash('msg','Invalid Information Provided.');
            return redirect()->back();
        }
        
    }


    public function signupdoctorsprocess(Request $request){


        $rules = [
            'name'                      => 'required',
            'surname'                   => 'required',
            'title'                     => 'required',
            'email'                     => 'required',
            'password'                  => 'required|confirmed',
            'password_confirmation'     => 'required',
            'services_id'               => 'required',
            'working_step'              => 'required',
            'graduated_from'            => 'required',
            'graduated_year'            => 'required',
            'phone1'                    => 'required',
            'phone2'                    => 'required',
            'gender'                    => 'required',
            'identity_no'               => 'required',
            'country_id'                => 'required',
            'state_id'                  => 'required',
            'work_district'             => 'required',
            'institutework_for'         => 'required',
            'institute_work_details'    => 'required',
            'image'                     => 'required'
        ];

        //'bFile' => 'required',
        if ($request->image != ""){
             $rules["image"] = 'required|mimes:jpg,jpeg|max:2048';
        }

        $validator = Validator::make($request->all(),$rules);
    
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }

        $doctors = new Doctors();
        $doctors->name              = $request->name;
        $doctors->surname           = $request->surname;
        $doctors->title             = $request->title;
        $doctors->email             = $request->email;
        $doctors->password          = Hash::make($request->password);
        $doctors->services_id       = $request->services_id;
        $doctors->working_step      = $request->working_step;
        $doctors->graduated_from    = $request->graduated_from;
        $doctors->graduated_year    = $request->graduated_year;
        $doctors->phone1            = $request->phone1;
        $doctors->phone2            = $request->phone2;
        $doctors->sendmsg           = 1;
        $doctors->gender            = $request->gender;
        $doctors->identity_no       = $request->identity_no;
        $doctors->country_id        = $request->country_id;
        $doctors->state_id          = $request->state_id;
        $doctors->work_district     = $request->work_district;
        $doctors->institutework_for              = $request->institutework_for;
        $doctors->institute_work_details         = $request->institute_work_details;
        $doctors->status                         = 1;
        $doctors->marked                         = 1;
        $doctors->account_type                   = 1;
        $doctors->location                       = "";
        $doctors->location_long                  = "";
        $doctors->location_lat                   = "";
        
        $doctors->save();

        if ($request->image != ""){

            $image      = $request->image;
            $ext        = $image->getClientOriginalExtension();
            $imageName  = time().'.'.$ext;

            $image->move(public_path('uploads/doctors/'),$imageName);
            
            $doctors->doctors_image = $imageName;
            $doctors->save();

        }

        if ($doctors){

            if ($request->title == 1){
                $email_title = "Dr.";
            }elseif ($request->title == 3){
                $email_title = "AR. Dr.";
            }elseif ($request->title == 4){
                $email_title = "Spc.";
            }elseif ($request->title == 5){
                $email_title = "Assit. Prof. Dr.";
            }elseif ($request->title == 6){
                $email_title = "Assit. Prof.";
            }elseif ($request->title == 7){
                $email_title = "Prof. Dr.";
            }

            $emailtemplate = Emailtemplates::findorFail(1);

                $toEmail = $request->email;
                $message = str_replace(array('{title}','{name}','{surname}','{company_name}','{company_phone}','{company_email}','{company_webaddress}'),array($email_title,$request->name,$request->surname,get_siteinfo('setting_name'),get_siteinfo('setting_phone'),get_siteinfo('setting_email'),url('')),$emailtemplate->email_content);
                $subject = $emailtemplate->email_subject;
                //echo $message;
                //exit;
                $emailrequest = Mail::to($toEmail)->send(new minidoctoremail($message,$subject));
        }

        return back()->with("success","Account Created Successfully.");
    }

    public function statesbycountry($country_id){
        return view('frontend.statesbycountry',[
            'country_id' => $country_id
        ]);
    }
}
