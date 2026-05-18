<?php

namespace App\Http\Controllers\Administrative;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Wlusergroups;
use App\Models\Wladmins;


class UsergroupsController extends Controller
{

    // This method will list
    public function index(){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"3_v")==true){
        
                $page_name     = "Manage Website";
                $subpage_name  = "Manage User Groups";
                
                $usergroups = Wlusergroups::orderBy('created_at','desc')->get();

                return view('administrative.usergroups.list',[
                    'page_name'     => $page_name,
                    'subpage_name'  => $subpage_name,
                    "usergroups"    => $usergroups 
                ]); 
        
        }else{

            $page_name     = "Manage Website";
            $subpage_name  = "Manage User Groups";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"3_a")==true){

            $page_name     = "Manage Website";
            $subpage_name  = "Manage User Groups";

            return view('administrative.usergroups.create',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }else{

            $page_name     = "Manage Website";
            $subpage_name  = "Manage User Groups";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"3_a")==true){
            $rules = [
                'usergroups_name'   => 'required',
            ];
            $validator = Validator::make($request->all(),$rules);
        
            if ($validator->fails()){
                return redirect()->route("administrative.usergroups.create")->withInput()->withErrors($validator);
            }

            $usergroup = new Wlusergroups();
            $usergroup->usergroups_name          = $request->usergroups_name;
            $usergroup->usergroups_descp         = $request->usergroups_descp;
            $usergroup->usergroups_permissions   = implode(',',$request->usergroups_permissions);
            $usergroup->usergroups_status        = $request->usergroups_status;
            
            $usergroup->save();


            return redirect()->route("administrative.usergroups.index")->with("success","Data Added Successfully.");
        
        }else{

            $page_name     = "Manage Website";
            $subpage_name  = "Manage User Groups";

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
        if (userpermission_status(session()->get('adminusergroups_id'),"3_e")==true){
                $page_name     = "Manage Website";
                $subpage_name  = "Manage User Groups";

                    $usergroup = Wlusergroups::findorFail($id);
                    return view('administrative.usergroups.edit',[
                        'page_name'     => $page_name,
                        'subpage_name'  => $subpage_name,
                        'usergroup'     => $usergroup
                    ]);
        }else{

            $page_name     = "Manage Website";
            $subpage_name  = "Manage User Groups";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"3_e")==true){

                $usergroup = Wlusergroups::findOrFail($id);

                $rules = [
                    'usergroups_name'   => 'required',
                ];

                $validator = Validator::make($request->all(),$rules);
            
                if ($validator->fails()){
                    return redirect()->route("administrative.usergroups.edit",$usergroup->usergroups_id)->withInput()->withErrors($validator);
                }

                $usergroup->usergroups_name          = $request->usergroups_name;
                $usergroup->usergroups_descp         = $request->usergroups_descp;
                $usergroup->usergroups_permissions   = implode(',',$request->usergroups_permissions);
                $usergroup->usergroups_status        = $request->usergroups_status;
                $usergroup->save();

                return redirect()->route("administrative.usergroups.index")->with("success","Data Updated Successfully.");

        }else{

            $page_name     = "Manage Website";
            $subpage_name  = "Manage User Groups";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"3_d")==true){
                $usergroup = Wlusergroups::findOrFail($id);
                
                $usergroup->delete();

                return redirect()->route("administrative.usergroups.index")->with("success","Data Deleted Successfully.");
        }else{

            $page_name     = "Manage Website";
            $subpage_name  = "Manage User Groups";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }

}