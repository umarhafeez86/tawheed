<?php

namespace App\Http\Controllers\Administrative;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

use App\Models\User;
use App\Models\Wladmins;




class AdminController extends Controller
{
    public function index(){
            return view('administrative.login'); 
    }

    public function logincheck(Request $request){
        $rules = [
            'admin_username'    => 'required',
            'admin_password'    => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
    
        if ($validator->fails()){
            return redirect()->route("administrative.login")->withInput()->withErrors($validator);
        }
        //return view('administrative.login'); 
        
        $admin_username     = "";
        $admin_password     = "";

        if  ($request->remember_me==1){
               
               Cookie::queue('admin_username', $request->admin_username, 1440);
               Cookie::queue('admin_password', $request->admin_password, 1440);
            
        }else{
              Cookie::queue('admin_username', null, -1);
              Cookie::queue('admin_username', null, -1);
        }

        if (Auth::guard('admin')->attempt(['email' => $request->admin_username, 'password' => $request->admin_password])) {
            //echo (Auth::guard('admin')->check());
            //exit;
            //return redirect()->route("administrative.dashboard")->with("msg","Data Added Successfully.");
            $request->session()->put('admin_id',Auth::guard('admin')->user()->admin_id);
            $request->session()->put('admin_name',Auth::guard('admin')->user()->name);
            $request->session()->put('admin_rights	',Auth::guard('admin')->user()->admin_rights);
            $request->session()->put('adminusergroups_id',Auth::guard('admin')->user()->usergroups_id);
            return redirect()->route("administrative.dashboard");
        }else{
            $request->session()->flash('msg','Invalid Information Provided.');
            //return redirect()->route("administrative.login")->with("msg","Error Occured.");
            return redirect()->route("administrative.login");
        }
        
    }

    public function dashboard(){
        $page_name      = "Dashboard";
        $subpage_name   = "";
        if (session()->has("admin_name")){
            return view('administrative.dashboard',[
                'page_name' => $page_name,
                'subpage_name' => $subpage_name
            ]); 
        }else{
            return redirect()->route("administrative.login");
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        session()->forget(['admin_id','admin_name','admin_rights','adminusergroups_id']);
        return redirect()->route("administrative.login");
    }

    
}
