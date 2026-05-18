<?php

namespace App\Http\Controllers\Administrative;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Wlusergroups;

use Hash;
use App\Models\Wladmins;

class WladminsController extends Controller
{

    // This method will list
    public function index(){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"4_v")==true){
        
                $page_name     = "Manage Website";
                $subpage_name  = "Manage Admin Users";
                
                $usersadmin = Wladmins::orderBy('created_at','desc')->get();

                return view('administrative.usersadmin.list',[
                    'page_name'     => $page_name,
                    'subpage_name'  => $subpage_name,
                    "usersadmin"    => $usersadmin 
                ]); 
        
        }else{

            $page_name     = "Manage Website";
            $subpage_name  = "Manage Admin Users";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"4_a")==true){

            $page_name     = "Manage Website";
            $subpage_name  = "Manage Admin Users";

            return view('administrative.usersadmin.create',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }else{

            $page_name     = "Manage Website";
            $subpage_name  = "Manage Admin Users";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"4_a")==true){
            $rules = [
                'name'   => 'required',
            ];
            $validator = Validator::make($request->all(),$rules);
        
            if ($validator->fails()){
                return redirect()->route("administrative.usergroups.create")->withInput()->withErrors($validator);
            }

            $usersadmin = new Wladmins();
            $usersadmin->name          = $request->name;
            $usersadmin->email         = $request->email;
            $usersadmin->password      = Hash::make($request->password);
            $usersadmin->admin_rights  = "adm";
            $usersadmin->usergroups_id = $request->usergroups_id;
            $usersadmin->status        = $request->status;
            
            $usersadmin->save();


            return redirect()->route("administrative.usersadmin.index")->with("success","Data Added Successfully.");
        
        }else{

            $page_name     = "Manage Website";
            $subpage_name  = "Manage Admin Users";

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
        if (userpermission_status(session()->get('adminusergroups_id'),"4_e")==true){
                $page_name     = "Manage Website";
                $subpage_name  = "Manage Admin Users";

                    $usersadmin = Wladmins::findorFail($id);
                    return view('administrative.usersadmin.edit',[
                        'page_name'     => $page_name,
                        'subpage_name'  => $subpage_name,
                        'usersadmin'    => $usersadmin
                    ]);
        }else{

            $page_name     = "Manage Website";
            $subpage_name  = "Manage Admin Users";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"4_e")==true){

                $usersadmin = Wladmins::findOrFail($id);

                $rules = [
                    'name'   => 'required',
                ];

                $validator = Validator::make($request->all(),$rules);
            
                if ($validator->fails()){
                    return redirect()->route("administrative.usersadmin.edit",$usersadmin->admin_id)->withInput()->withErrors($validator);
                }

                $usersadmin->name          = $request->name;
                $usersadmin->email         = $request->email;

                if ($request->password!=""){
                    $usersadmin->password  = Hash::make($request->password);
                }
                
                $usersadmin->admin_rights  = "adm";
                $usersadmin->usergroups_id = $request->usergroups_id;
                $usersadmin->status        = $request->status;
                $usersadmin->save();

                return redirect()->route("administrative.usersadmin.index")->with("success","Data Updated Successfully.");

        }else{

            $page_name     = "Manage Website";
            $subpage_name  = "Manage Admin Users";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"4_d")==true){
                $usersadmin = Wladmins::findOrFail($id);
                
                $usersadmin->delete();

                return redirect()->route("administrative.usersadmin.index")->with("success","Data Deleted Successfully.");
        }else{

            $page_name     = "Manage Website";
            $subpage_name  = "Manage Admin Users";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }

}
