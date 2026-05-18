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
use App\Models\Faqs;
use App\Models\Faqsdetails;

class FaqsController extends Controller
{
    // This method will list
    public function index(){

        if (session()->has("admin_name")){
        
        }else{
            return redirect()->route("administrative.login");
        }

        if (userpermission_status(session()->get('adminusergroups_id'),"7_v")==true){
        
                $page_name     = "Manage FAQs";
                $subpage_name  = "Manage FAQs";
                
                $faqs = Faqs::orderBy('created_at','desc')->get();

                return view('administrative.faqs.list',[
                    'page_name'     => $page_name,
                    'subpage_name'  => $subpage_name,
                    "faqs"          => $faqs 
                ]); 
        
        }else{

            $page_name     = "Manage FAQs";
            $subpage_name  = "Manage FAQs";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"7_a")==true){

            $page_name     = "Manage FAQs";
            $subpage_name  = "Manage FAQs";

            return view('administrative.faqs.create',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }else{

            $page_name     = "Manage FAQs";
            $subpage_name  = "Manage FAQs";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"7_a")==true){
            $rules = [
                'faqs_heading'         => 'required',
            ];
            $validator = Validator::make($request->all(),$rules);
        
            if ($validator->fails()){
                return redirect()->route("administrative.faqs.create")->withInput()->withErrors($validator);
            }

            $faqs = new Faqs();
            $faqs->faqs_heading            = $request->faqs_heading;            
            $faqs->save();

            if ($request->faqs_image != ""){

                $faqs_image       = $request->faqs_image;
                $ext              = $faqs_image->getClientOriginalExtension();
                $faqs_imageName   = time().'.'.$ext;
        
                $faqs_image->move(public_path('uploads/faqs/'),$faqs_imageName);
                
                $faqs->faqs_image = $faqs_imageName;
                $faqs->save();
        
            }

            $faqs_id = $faqs->faqs_id;
            $faqsdetails_questions = $request->faqsdetails_question;
            $faqsdetails_answers   = $request->faqsdetails_answer;
            $faqsdetails_sort      = $request->faqsdetails_sort;
            $status                = $request->status;
            //print_r ($faqsdetails_questions);
            //print_r ($faqsdetails_answers);
            //exit;

            for ($i=0;$i<count($faqsdetails_questions);$i++){
                $faqsdetails = new Faqsdetails();
                $faqsdetails->faqs_id = $faqs_id;
                $faqsdetails->faqsdetails_question   = $faqsdetails_questions[$i];
                $faqsdetails->faqsdetails_answer	 = $faqsdetails_answers[$i];
                $faqsdetails->faqsdetails_sort		 = $faqsdetails_sort[$i];
                $faqsdetails->status	             = $status[$i];
                $faqsdetails->save();
            }
           
            return redirect()->route("administrative.faqs.index")->with("success","Data Added Successfully.");
        
        }else{

            $page_name     = "Manage FAQs";
            $subpage_name  = "Manage FAQs";

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
        if (userpermission_status(session()->get('adminusergroups_id'),"7_e")==true){
                $page_name     = "Manage FAQs";
                $subpage_name  = "Manage FAQs";

                    $faqs = Faqs::findorFail($id);
                    return view('administrative.faqs.edit',[
                        'page_name'     => $page_name,
                        'subpage_name'  => $subpage_name,
                        'faqs'          => $faqs
                    ]);
        }else{

            $page_name     = "Manage FAQs";
            $subpage_name  = "Manage FAQs";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"7_e")==true){

                $faqs = Faqs::findOrFail($id);

                $rules = [
                    'faqs_heading'         => 'required'
                ];

                $validator = Validator::make($request->all(),$rules);
            
                if ($validator->fails()){
                    return redirect()->route("administrative.faqs.edit",$faqs->faqs_id)->withInput()->withErrors($validator);
                }

                $faqs->faqs_heading     =     $request->faqs_heading;
                $faqs->save();

                if ($request->faqs_image != ""){

                    $faqs_image       = $request->faqs_image;
                    $ext              = $faqs_image->getClientOriginalExtension();
                    $faqs_imageName   = time().'.'.$ext;
            
                    $faqs_image->move(public_path('uploads/faqs/'),$faqs_imageName);
                    
                    $faqs->faqs_image = $faqs_imageName;
                    $faqs->save();
            
                }

                $faqsdetail = Faqsdetails::where('faqs_id',$id);
                $faqsdetail->delete();

            $faqs_id = $id;
            $faqsdetails_questions = $request->faqsdetails_question;
            $faqsdetails_answers   = $request->faqsdetails_answer;
            $faqsdetails_sort      = $request->faqsdetails_sort;
            $status                = $request->status;
            //print_r ($faqsdetails_questions);
            //print_r ($faqsdetails_answers);
            //exit;

            for ($i=0;$i<count($faqsdetails_questions);$i++){
                $faqsdetails = new Faqsdetails();
                $faqsdetails->faqs_id = $id;
                $faqsdetails->faqsdetails_question   = $faqsdetails_questions[$i];
                $faqsdetails->faqsdetails_answer	 = $faqsdetails_answers[$i];
                $faqsdetails->faqsdetails_sort		 = $faqsdetails_sort[$i];
                $faqsdetails->status	             = $status[$i];
                $faqsdetails->save();
            }
                
            return redirect()->route("administrative.faqs.index")->with("success","Data Updated Successfully.");
                
        }else{

            $page_name     = "Manage FAQs";
            $subpage_name  = "Manage FAQs";

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

        if (userpermission_status(session()->get('adminusergroups_id'),"7_d")==true){
                $faqs = Faqs::findOrFail($id);
                $faqs->delete();

                $faqsdetail = Faqsdetails::where('faqs_id',$id);
                $faqsdetail->delete();

                return redirect()->route("administrative.faqs.index")->with("success","Data Deleted Successfully.");
        }else{

            $page_name     = "Manage FAQs";
            $subpage_name  = "Manage FAQs";

            return view('administrative.permissions',[
                'page_name'     => $page_name,
                'subpage_name'  => $subpage_name
            ]); 
        }
    }

    // This method will create
    public function addnewrow ($rownumber){
        return view('administrative.faqs.addnewrow',[
            'rownumber' => $rownumber,
        ]); 
    }
}
