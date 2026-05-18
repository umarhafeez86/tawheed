<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Mail\MEmail;
use App\Mail\Estimationmail;
use App\Mail\Beatmyprice;
use App\Mail\Registerforprice;
use App\Mail\ContactEmail;
use App\Mail\Booknowemail;
use App\Mail\Customformemail;

use Illuminate\Support\Facades\Mail;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

use App\Models\Staticpages;

use App\Models\Emailtemplates;

class MainFormsController extends Controller
{
    public function beatmypriceprocess(Request $request){


       /*$rules =[
            'packagetype'     => 'required',
            'travelmonth'     => 'required',
            'nightsinfo'      => 'required',
            'passginfo'       => 'required',
            'personname'      => 'required',
            'phoneno'         => 'required',
            'txtemail'        => 'required',
        ];*/

        $validator = Validator::make($request->all(),
        [
            'packagetype'     => 'required',
            'travelmonth'     => 'required',
            'nightsinfo'      => 'required|numeric',
            'passginfo'       => 'required|numeric',
            'personname'      => 'required',
            'phoneno'         => 'required|numeric',
            'txtemail'        => 'required|email',
        ], [
            'packagetype.required' => 'Package Type is required.',
            'travelmonth.required' => 'Travel Month is required.',
            'nightsinfo.required'  => 'Days Information is required.',
            'nightsinfo.numeric'   => 'Days Information must be a number.',
            'passginfo.required'   => 'No. of Passengers is required.',
            'passginfo.numeric'    => 'No. of Passengers must be a number.',
            'personname'           => 'Name is required.',
            'phoneno.required'     => 'No. of Passengers is required.',
            'phoneno.numeric'      => 'Phone No. must be a number.',
            'txtemail.required'    => 'Email is required.',
            'txtemail.email'       => 'Valid Email is required.',
        ]);
    
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator);
            //echo '<span class="errormsg">Information Not Filled.</span>';
            //exit;
        }


        $emailtemplate = Emailtemplates::findorFail(1);

        $toEmail = $request->peremail;
        $message = str_replace(array('{fullname}','{phoneno}','{peremail}','{packagetype}','{travelmonth}','{nightsinfo}','{passginfo}','{company_name}','{company_phone}','{company_email}','{company_webaddress}'),array($request->personname,$request->phoneno,$request->txtemail,$request->packagetype,$request->travelmonth,$request->nightsinfo,$request->passginfo,get_siteinfo('setting_name'),get_siteinfo('setting_phone'),get_siteinfo('setting_email'),url('')),$emailtemplate->email_content);
        $subject = $emailtemplate->email_subject;
        //echo $message;
        //exit;
        /*
        Mail::to('recipient@example.com')
        ->cc(['cc1@example.com'])
        ->bcc(['bcc1@example.com'])
        ->queue(new MyTestMail($details));
        */
        Mail::to($toEmail)->cc([get_siteinfo('setting_email')])->send(new MEmail($message,$subject));

        return back()->with("success","Your request has been sent successfully.");
        //echo '<span class="successmsg">Your request has sent successfully.</span>';
        //exit;
        
    }

    public function registerforhajjpackages(Request $request){


        $rules = [
            'personname'         => 'required',
            'personemail'        => 'required',
            'phoneno'            => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
    
        if ($validator->fails()){
            echo '<span class="errormsg">Information Not Filled.</span>';
            exit;
        }


        $emailtemplate = Emailtemplates::findorFail(4);

        $toEmail = get_siteinfo('setting_email');
        $message = str_replace(array('{personname}','{personemail}','{phoneno}','{company_name}','{company_phone}','{company_email}','{company_webaddress}'),array($request->personname,$request->personemail,$request->phoneno,get_siteinfo('setting_name'),get_siteinfo('setting_phone'),get_siteinfo('setting_email'),url('')),$emailtemplate->email_content);
        $subject = $emailtemplate->email_subject;
        //echo $message;
        //exit;
        
        /*
        Mail::to('recipient@example.com')
        ->cc(['cc1@example.com'])
        ->bcc(['bcc1@example.com'])
        ->queue(new MyTestMail($details));
        */
        $emailrequest = Mail::to($toEmail)->send(new Registerforprice($message,$subject));

        echo '<span class="successmsg">Your request has sent successfully.</span>';
        exit;
        //return back()->with("success","Your request has sent successfully.");
    }

    public function booknowpackage(Request $request){


        $rules = [
            'frmbooknow_fname'            => 'required',
            'frmbooknow_contactno'        => 'required',
            'frmbooknow_email'            => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
    
        if ($validator->fails()){
            echo '<span class="errormsg">Required Information not Filled.</span>';
            exit;
        }


        $emailtemplate = Emailtemplates::findorFail(6);

        $toEmail = get_siteinfo('setting_email');
        $message = str_replace(array('{frmbooknow_fname}','{frmbooknow_contactno}','{frmbooknow_email}','{frmbooknow_travel_month}','{frmbooknow_guests}','{frmbooknow_total_days}','{frmbooknow_package_name}','{frmbooknow_package_price}','{company_name}','{company_phone}','{company_email}','{company_webaddress}'),array($request->frmbooknow_fname,$request->frmbooknow_contactno,$request->frmbooknow_email,$request->frmbooknow_travel_month,$request->frmbooknow_guests,$request->frmbooknow_total_days,$request->frmbooknow_package_name,$request->frmbooknow_package_price,get_siteinfo('setting_name'),get_siteinfo('setting_phone'),get_siteinfo('setting_email'),url('')),$emailtemplate->email_content);
        $subject = $emailtemplate->email_subject;
        //echo $message;
        //exit;
        
        /*
        Mail::to('recipient@example.com')
        ->cc(['cc1@example.com'])
        ->bcc(['bcc1@example.com'])
        ->queue(new MyTestMail($details));
        */
        $toEmail = get_siteinfo('setting_email');
        $emailrequest = Mail::to($toEmail)->send(new Booknowemail($message,$subject));

        echo 'Your request has been sent successfully.';
        exit;
        //return back()->with("success","Your request has sent successfully.");
    }

    public function submitcustomform(Request $request){


        $rules = [
            'customform_fname'            => 'required',
            'customform_contactno'        => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
    
        if ($validator->fails()){
            echo '<span class="errormsg">Required Information not Filled.</span>';
            exit;
        }


        $emailtemplate = Emailtemplates::findorFail(7);

        $toEmail = get_siteinfo('setting_email');
        $message = str_replace(array('{customform_fname}','{customform_contactno}','{company_name}','{company_phone}','{company_email}','{company_webaddress}'),array($request->customform_fname,$request->customform_contactno,get_siteinfo('setting_name'),get_siteinfo('setting_phone'),get_siteinfo('setting_email'),url('')),$emailtemplate->email_content);
        $subject = $emailtemplate->email_subject;
        //echo $message;
        //exit;
        
        /*
        Mail::to('recipient@example.com')
        ->cc(['cc1@example.com'])
        ->bcc(['bcc1@example.com'])
        ->queue(new MyTestMail($details));
        */
        $toEmail = get_siteinfo('setting_email');
        $emailrequest = Mail::to($toEmail)->send(new Customformemail($message,$subject));

        echo 'Your request has been sent successfully.';
        exit;
        //return back()->with("success","Your request has sent successfully.");
    }

    public function contactsubmit(Request $request){

        $rules = [
            'contact_fullname'  => 'required',
            'contact_email'     => 'required',
            'contact_phoneno'   => 'required',
            'contact_message'   => 'required'       
        ];

        $validator = Validator::make($request->all(),$rules);
    
        if ($validator->fails()){
            echo '<span class="errormsg">Information Not Filled.</span>';
            exit;
        }


        $emailtemplate = Emailtemplates::findorFail(5);

        $toEmail = get_siteinfo('setting_email');
        $message = str_replace(array('{contact_fullname}','{contact_email}','{contact_phoneno}','{contact_message}','{company_name}','{company_phone}','{company_email}','{company_webaddress}'),array($request->contact_fullname,$request->contact_email,$request->contact_phoneno,$request->contact_message,get_siteinfo('setting_name'),get_siteinfo('setting_phone'),get_siteinfo('setting_email'),url('')),$emailtemplate->email_content);
        $subject = $emailtemplate->email_subject;
        //echo $message;
        //exit;
        
        /*
        Mail::to('recipient@example.com')
        ->cc(['cc1@example.com'])
        ->bcc(['bcc1@example.com'])
        ->queue(new MyTestMail($details));
        */
        $emailrequest = Mail::to($toEmail)->send(new ContactEmail($message,$subject));

        echo '<span class="successmsg">Your request has sent successfully.</span>';
        exit;
        //return back()->with("success","Your request has sent successfully.");
    }

    public function estimateformprocess(Request $request){


        $rules = [
            'estimate_fullname'          => 'required',
            'estimate_phoneno'           => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
    
        if ($validator->fails()){
            echo '<span class="errormsg">Information Not Filled.</span>';
            exit;
        }


        $emailtemplate = Emailtemplates::findorFail(2);

        $toEmail = get_siteinfo('setting_email');
        $message = str_replace(array('{estimate_fullname}','{estimate_phoneno}','{estimate_msg}','{estimate_packagetype}','{company_name}','{company_phone}','{company_email}','{company_webaddress}'),array($request->estimate_fullname,$request->estimate_phoneno,$request->estimate_msg,$request->estimate_packagetype,get_siteinfo('setting_name'),get_siteinfo('setting_phone'),get_siteinfo('setting_email'),url('')),$emailtemplate->email_content);
        $subject = $emailtemplate->email_subject;
        //echo $message;
        //exit;
        
        /*
        Mail::to('recipient@example.com')
        ->cc(['cc1@example.com'])
        ->bcc(['bcc1@example.com'])
        ->queue(new MyTestMail($details));
        */
        $emailrequest = Mail::to($toEmail)->send(new Estimationmail($message,$subject));

        echo 'Your request has been sent successfully.';
        exit;
        //return back()->with("success","Your request has sent successfully.");
    }


    public function beatmypriceprocessold(Request $request){


        $rules = [
            'departurefrom'     => 'required',
            'destinationcity'   => 'required',
            'travel_date'       => 'required',
            'personname'        => 'required',
            'phoneno'           => 'required',
            'txtemail'          => 'required',
            'makkahnights'      => 'required',
            'madinahnights'     => 'required',
            'rooms'             => 'required',
            'accommodation'     => 'required',
            'adults'            => 'required',
            'child'             => 'required',
            'infants'           => 'required'

        ];

        $validator = Validator::make($request->all(),$rules);
    
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }


        $emailtemplate = Emailtemplates::findorFail(3);

        $toEmail = $request->txtemail;
        $message = str_replace(array('{departurefrom}','{destinationcity}','{travel_date}','{personname}','{phoneno}','{txtemail}','{makkahnights}','{madinahnights}','{rooms}','{accommodation}','{adults}','{child}','{infants}','{company_name}','{company_phone}','{company_email}','{company_webaddress}'),array($request->departurefrom,$request->destinationcity,$request->travel_date,$request->personname,$request->phoneno,$request->txtemail,$request->makkahnights,$request->madinahnights,$request->rooms,$request->accommodation,$request->adults,$request->child,$request->infants        ,get_siteinfo('setting_name'),get_siteinfo('setting_phone'),get_siteinfo('setting_email'),url('')),$emailtemplate->email_content);
        $subject = $emailtemplate->email_subject;
        //echo $message;
        //exit;
        /*
        Mail::to('recipient@example.com')
        ->cc(['cc1@example.com'])
        ->bcc(['bcc1@example.com'])
        ->queue(new MyTestMail($details));
        */
        $emailrequest = Mail::to($toEmail)->cc([get_siteinfo('setting_email')])->send(new Beatmyprice($message,$subject));

        return back()->with("success","Your request has sent successfully.");
    }
}
