<?php

namespace App\Http\Controllers\administrative;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Settings;
use App\Models\Wladmins;
use App\Models\Emailtemplates;

class EmailtemplatesController extends Controller
{
    // This method will list
    public function index(){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"16_v")==true){
        
                $page_name     = "Manage Email Templates";
                $subpage_name  = "Manage Email Templates";
                
                $emailtemplates = Emailtemplates::orderBy('created_at','desc')->get();

                return view('administrative.emailtemplates.list',[
                    'page_name'     => $page_name,
                    'subpage_name'  => $subpage_name,
                    "emailtemplates"=> $emailtemplates 
                ]); 
        
        }else{

            $page_name     = "Manage Email Templates";
            $subpage_name  = "Manage Email Templates";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }

    // This method will create
    public function create (){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"16_a")==true){

            $page_name     = "Manage Email Templates";
            $subpage_name  = "Manage Email Templates";

            return view('administrative.emailtemplates.create',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }else{

            $page_name     = "Manage Email Templates";
            $subpage_name  = "Manage Email Templates";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }

    // This method will store
    public function store (Request $request){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"16_a")==true){
            $rules = [
                'email_title'         => 'required',
                'email_subject'       => 'required'
            ];
            $validator = Validator::make($request->all(),$rules);
        
            if ($validator->fails()){
                return redirect()->route("administrative.emailtemplates.create")->withInput()->withErrors($validator);
            }

            $emailtemplates = new Emailtemplates();
            $emailtemplates->email_title        = $request->email_title; 
            $emailtemplates->email_subject      = $request->email_subject;

            $emailtemplates->email_content      = $request->email_content;
            $emailtemplates->status             = $request->status;
            $emailtemplates->save();
            
            return redirect()->route("administrative.emailtemplates.index")->with("success","Data Added Successfully.");
        
        }else{

            $page_name     = "Manage Email Templates";
            $subpage_name  = "Manage Email Templates";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }  
    
    
    // This method will edit
    public function edit ($id){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        //echo $id;
        if (userpermission_status(session()->get('adminusergroups_id'),"16_e")==true){
                $page_name     = "Manage Email Templates";
                $subpage_name  = "Manage Email Templates";

                    $emailtemplates = Emailtemplates::findorFail($id);
                    return view('administrative.emailtemplates.edit',[
                        'page_name'      => $page_name,
                        'subpage_name'   => $subpage_name,
                        'emailtemplates' => $emailtemplates
                    ]);
        }else{

            $page_name     = "Manage Email Templates";
            $subpage_name  = "Manage Email Templates";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }


    // This method will update
    public function update ($id, Request $request){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"16_e")==true){

                $emailtemplates = Emailtemplates::findOrFail($id);

                $rules = [
                    'email_title'         => 'required',
                    'email_subject'       => 'required'
                ];

                $validator = Validator::make($request->all(),$rules);
            
                if ($validator->fails()){
                    return redirect()->route("administrative.emailtemplates.edit",$emailtemplates->id)->withInput()->withErrors($validator);
                }

                $emailtemplates->email_title                    = $request->email_title;
                $emailtemplates->email_subject                  = $request->email_subject; 
                $emailtemplates->email_content                  = $request->email_content;
                $emailtemplates->status                         = $request->status;
                $emailtemplates->save();
                
            return redirect()->route("administrative.emailtemplates.index")->with("success","Data Updated Successfully.");
                
        }else{

            $page_name     = "Manage Email Templates";
            $subpage_name  = "Manage Email Templates";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }   
    
    // This method will destroy
    public function destroy ($id){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"16_d")==true){
                
                $emailtemplates = Emailtemplates::findOrFail($id);
                $emailtemplates->delete();
                
                return redirect()->route("administrative.emailtemplates.index")->with("success","Data Deleted Successfully.");
        }else{

            $page_name     = "Manage Email Templates";
            $subpage_name  = "Manage Email Templates";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }
}
