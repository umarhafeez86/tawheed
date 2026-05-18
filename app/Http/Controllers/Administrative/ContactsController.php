<?php

namespace App\Http\Controllers\Administrative;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Settings;
use App\Models\Wladmins;
use App\Models\Freequotes;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FreequotesExport;

class ContactsController extends Controller
{
    // This method will list
    public function index(){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"23_v")==true){
        
                $page_name     = "Manage Contacts";
                $subpage_name  = "Manage Contacts";
                
                return view('administrative.contacts.list',[
                    'page_name'     => $page_name,
                    'subpage_name'  => $subpage_name,
                ]); 
        
        }else{

            $page_name     = "Manage Contacts";
            $subpage_name  = "Manage Contacts";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }

    // Export to Excel
    public function exportcontacts(Request $request)
    {
        $request->validate([
            'freequotes_date_from' => 'required|date',
            'freequotes_date_to'   => 'required|date|after_or_equal:freequotes_date_from',
        ]);

       return Excel::download(
        new FreequotesExport($request->freequotes_date_from, $request->freequotes_date_to),
        'Contacts_' . $request->freequotes_date_from . '_to_' . $request->freequotes_date_to . '.xlsx'
        );
    }


    // Empty Contact Lists
    public function emptycontacts()
    {

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"23_d")==true){
            
                Freequotes::query()->delete();
                return redirect()->route("administrative.contacts.index")->with("success","Data Deleted Successfully.");
        
        }else{

            $page_name     = "Manage Contacts";
            $subpage_name  = "Manage Contacts";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }

}
