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

use App\Models\Freequotes;

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
            'personname.required'  => 'Name is required.',
            'phoneno.required'     => 'Phone No. is required.',
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

        $toEmail = $request->txtemail;
        $message = str_replace(array('{fullname}','{phoneno}','{txtemail}','{packagetype}','{travelmonth}','{nightsinfo}','{passginfo}','{company_name}','{company_phone}','{company_email}','{company_webaddress}'),array($request->personname,$request->phoneno,$request->txtemail,$request->packagetype,$request->travelmonth,$request->nightsinfo,$request->passginfo,get_siteinfo('setting_name'),get_siteinfo('setting_phone'),get_siteinfo('setting_email'),url('')),$emailtemplate->email_content);
        $subject = $emailtemplate->email_subject;
        //echo $message;
        //exit;

            $freequotes = new Freequotes();
            $freequotes->request_date        = date("Y-m-d");
            $freequotes->triptype            = $request->packagetype;
            $freequotes->person_fname        = $request->personname;
            $freequotes->person_email        = $request->txtemail;
            $freequotes->person_phone        = $request->phoneno;
            
            $freequotes->travel_month        = $request->travelmonth;
            $freequotes->guests_info         = $request->passginfo;
            $freequotes->nights_info         = $request->nightsinfo;
            
            $freequotes->form_name           = "Beat My Price";
            $freequotes->page_url            = $request->page_url;
            $freequotes->gclid               = $request->gclid;

            $freequotes->save();

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

    public function fastquoteprocess(Request $request){


        $rules = [
            'packagetype'     => 'required',
            'travelmonth'     => 'required',
            'nightsinfo'      => 'required',
            'passginfo'       => 'required',
            'personname'      => 'required',
            'phoneno'         => 'required',
            'txtemail'        => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
    
        if ($validator->fails()){
            echo '<span class="errormsg">Required Information not Filled.</span>';
            exit;
        }

        $emailtemplate = Emailtemplates::findorFail(1);

        $toEmail = $request->txtemail;
        $message = str_replace(array('{fullname}','{phoneno}','{txtemail}','{packagetype}','{travelmonth}','{nightsinfo}','{passginfo}','{company_name}','{company_phone}','{company_email}','{company_webaddress}'),array($request->personname,$request->phoneno,$request->txtemail,$request->packagetype,$request->travelmonth,$request->nightsinfo,$request->passginfo,get_siteinfo('setting_name'),get_siteinfo('setting_phone'),get_siteinfo('setting_email'),url('')),$emailtemplate->email_content);
        $subject = $emailtemplate->email_subject;
        //echo $message;
        //exit;

            $freequotes = new Freequotes();
            $freequotes->request_date        = date("Y-m-d");
            $freequotes->triptype            = $request->packagetype;
            $freequotes->person_fname        = $request->personname;
            $freequotes->person_email        = $request->txtemail;
            $freequotes->person_phone        = $request->phoneno;
            
            $freequotes->travel_month        = $request->travelmonth;
            $freequotes->guests_info         = $request->passginfo;
            $freequotes->nights_info         = $request->nightsinfo;
            
            $freequotes->form_name           = "Your Trusted Partner for a Hassle-Free Umrah Journey";
            $freequotes->page_url            = $request->page_url;
            $freequotes->gclid               = $request->gclid;

            $freequotes->save();

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

    public function customholidayformsubmit(Request $request)
    {
        //print_r (request('DepartureFrom'));
        //print_r (request('Destination'));
        //exit;
        $travel_plan = "";

        $rules = [
            'DepartureFrom'      => 'required',
            'Destination'        => 'required',
            'DepartureDate'      => 'required',
            'personname'         => 'required',
            'personphone'        => 'required',
            'personemail'        => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            //return redirect()->back()->withInput()->withErrors($validator);
            echo '<span class="errormsg">Required Information not Filled.</span>';
            exit;
        }

        $DepartureFrom =  request('DepartureFrom');
        $Destination   =  request('Destination');
        $DepartureDate =  request('DepartureDate');

        $personname    =  request('personname');
        $personphone   =  request('personphone');
        $personemail   =  request('personemail');

        $travel_plan  .= '<table width="450" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                        <td><b>Departure Form</b></td>
                        <td><b>Destination</b></td>
                        <td><b>Travel Date</b></td>
                        </tr>';
                            for ($i = 0; $i < count($DepartureFrom); $i++) {
                                $travel_plan  .= '<tr>
                        <td>'.$DepartureFrom[$i].'</td>
                        <td>'.$Destination[$i].'</td>
                        <td>'.get_formated_date($DepartureDate[$i],"d M, Y").'</td>
                        </tr>';
                            }
                            $travel_plan  .= '</tbody>
                    </table>';

        $emailtemplate = Emailtemplates::findorFail(8);
        $toEmail = $request->txtemail;
        $message = str_replace(array('{personname}', '{phoneno}', '{txtemail}','{travel_plan_details}', '{company_name}', '{company_phone}', '{company_email}', '{company_webaddress}'), array($request->personname, $request->personphone, $request->personemail, $travel_plan, get_siteinfo('setting_name'), get_siteinfo('setting_phone'), get_siteinfo('setting_email'), url('')), $emailtemplate->email_content);
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

        echo '<h3 class="thanks-msg-head">Thank You Valued Customer<h3><p class="thanks-msg-details">We have got your enquiry and we will be really happy to assist you with your future trips.</p>';
        exit;
        //return back()->with("success","Your request has sent successfully.");

    }

    public function customholidayplanenquiry(Request $request){

        $rules = [
            'journeytype'        => 'required',
            'needguidance'       => 'required',
            'destinationtype'    => 'required',
            'destinationname'    => 'required',
            'monthtogo'          => 'required',
            'traveldatefixed'    => 'required',
            'travel_date'        => 'required',
            'totaldays'          => 'required',
            'fullname'           => 'required',
            'emailaddress'       => 'required',
            'contactno'          => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
    
        if ($validator->fails()){
            echo '<span class="errormsg">Required Information not Filled.</span>';
            exit;
        }

        $emailtemplate = Emailtemplates::findorFail(10);

        $toEmail = $request->txtemail;
        $message = str_replace(array('{journeytype}','{needguidance}','{destinationtype}','{destinationname}','{monthtogo}','{traveldatefixed}','{travel_date}','{totaldays}','{fullname}','{emailaddress}','{contactno}','{company_name}','{company_phone}','{company_email}','{company_webaddress}'),array($request->journeytype,$request->needguidance,$request->destinationtype,$request->destinationname,$request->monthtogo,$request->traveldatefixed,$request->travel_date,$request->totaldays,$request->fullname,$request->emailaddress,$request->contactno,get_siteinfo('setting_name'),get_siteinfo('setting_phone'),get_siteinfo('setting_email'),url('')),$emailtemplate->email_content);
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

        echo '<button type="button" class="btn-close float-end position-absolute" data-bs-dismiss="modal"
                        aria-label="Close"></button> <h3 class="thanks-msg-head">Thank You Valued Customer<h3><p class="thanks-msg-details">We have got your enquiry and we will be really happy to assist you with your future trips.</p>';
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
        $message = str_replace(array('{frmbooknow_fname}','{frmbooknow_contactno}','{frmbooknow_email}','{frmbooknow_travel_month}','{frmbooknow_guests}','{frmbooknow_total_days}','{frmbooknow_package_name}','{frmbooknow_package_price}','{frmbooknow_message}','{company_name}','{company_phone}','{company_email}','{company_webaddress}'),array($request->frmbooknow_fname,$request->frmbooknow_contactno,$request->frmbooknow_email,$request->frmbooknow_travel_month,$request->frmbooknow_guests,$request->frmbooknow_total_days,$request->frmbooknow_package_name,$request->frmbooknow_package_price,$request->frmbooknow_message,get_siteinfo('setting_name'),get_siteinfo('setting_phone'),get_siteinfo('setting_email'),url('')),$emailtemplate->email_content);
        $subject = $emailtemplate->email_subject;
        //echo $message;
        //exit;
            $freequotes = new Freequotes();
            $freequotes->request_date        = date("Y-m-d");
            $freequotes->triptype            = "Umrah";
            $freequotes->person_fname        = $request->frmbooknow_fname;
            $freequotes->person_email        = $request->frmbooknow_email;
            $freequotes->person_phone        = $request->frmbooknow_contactno;
            $freequotes->person_msg          = $request->frmbooknow_message;
            
            $freequotes->travel_month        = $request->frmbooknow_travel_month;
            $freequotes->guests_info         = $request->frmbooknow_guests;
            $freequotes->nights_info         = $request->frmbooknow_total_days;

            $freequotes->form_name           = "Enquire Now";
            $freequotes->page_url            = $request->page_url;
            $freequotes->gclid               = $request->gclid;

            $freequotes->save();
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

    public function customholidayplansubmit(Request $request){


        $rules = [
            'triptype'              => 'required',
            'DepartureCity'         => 'required',
            'hotel_type'            => 'required',
            'dateOption'            => 'required',
            'noofdays'              => 'required',
            'personname'            => 'required',
            'personemail'           => 'required',
            'personphoneno'         => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
    
        if ($validator->fails()){
            echo '<span class="errormsg">Required Information not Filled.</span>';
            exit;
        }

            // echo $request->DepartureCity."<br>";
            // echo $request->DestinationCity."<br>";
            // echo $request->DestinationCity2."<br>";
            // exit;

            if ($request->triptype == "umrah"){
                    $DestinationCity = $request->DestinationCity;
                    $TripType        = "Umrah";
            }else{
                    $DestinationCity = $request->DestinationCity2;
                    $TripType        = "Hajj";
            }


        $emailtemplate = Emailtemplates::findorFail(9);

        $toEmail = get_siteinfo('setting_email');
        $message = str_replace(array('{personname}','{personphoneno}','{personemail}','{triptype}','{DepartureCity}','{DestinationCity}','{noofpax}','{hotel_type}','{dateOption}','{selected_dates}','{noofdays}','{whatsapp_opt_status}','{company_name}','{company_phone}','{company_email}','{company_webaddress}'),array($request->personname,$request->personphoneno,$request->personemail,$TripType,$request->DepartureCity,$DestinationCity,$request->noofpax,$request->hotel_type,$request->dateOption,$request->selected_dates,$request->noofdays,$request->whatsapp_opt_status,get_siteinfo('setting_name'),get_siteinfo('setting_phone'),get_siteinfo('setting_email'),url('')),$emailtemplate->email_content);
        $subject = str_replace(array('{triptype}'),array($TripType),$emailtemplate->email_subject);
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

        echo '<div class="float-left custom-mt">
                        <h2 class="info-head">All set! We’ve received your details.</h2>
                        <p class="mt-6 info-p">Our team will get in touch with your customized Umrah plan shortly. You\'ll receive your package details on WhatsApp or email within 24 hours.</p>
                        <p class="mt-6 info-p text-start"> If you have any urgent questions, feel free to reach out to us anytime.</p>
                        <div class="mt-10 lg:mt-20 grid grid-cols-1 lg:grid-cols-2 gap-5">
                            <a href="tel:02030628929" class="umrah-btn">Talk to a Expert Now</a>
                            <a href="https://tawheedtravel.co.uk/" class="hajj-btn">View Packages & Offers</a>
                        </div>
                    </div>';
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
            $freequotes = new Freequotes();
            $freequotes->request_date        = date("Y-m-d");
            $freequotes->triptype            = "";
            $freequotes->person_fname        = $request->contact_fullname;
            $freequotes->person_email        = $request->contact_email;
            $freequotes->person_phone        = $request->contact_phoneno;
            $freequotes->person_msg          = $request->contact_message;
            
            $freequotes->travel_month        = "";
            $freequotes->guests_info         = "";
            $freequotes->nights_info         = "";
            
            $freequotes->form_name           = "Contact Us";
            $freequotes->page_url            = $request->page_url;
            $freequotes->gclid               = $request->gclid;

            $freequotes->save();
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
        $message = str_replace(array('{estimate_fullname}','{estimate_phoneno}','{estimate_email}','{travel_date}','{estimate_noofpassg}','{estimate_message}','{company_name}','{company_phone}','{company_email}','{company_webaddress}'),array($request->estimate_fullname,$request->estimate_phoneno,$request->estimate_email,$request->travel_date,$request->estimate_noofpassg,$request->estimate_message,get_siteinfo('setting_name'),get_siteinfo('setting_phone'),get_siteinfo('setting_email'),url('')),$emailtemplate->email_content);
        $subject = $emailtemplate->email_subject;
        //echo $message;
        //exit;
            $freequotes = new Freequotes();
            $freequotes->request_date        = date("Y-m-d");
            $freequotes->triptype            = "";
            $freequotes->person_fname        = $request->estimate_fullname;
            $freequotes->person_email        = $request->estimate_email;
            $freequotes->person_phone        = $request->estimate_phoneno;
            $freequotes->person_msg          = $request->estimate_message;
            
            $freequotes->travel_month        = "";
            $freequotes->guests_info         = $request->estimate_noofpassg;
            $freequotes->nights_info         = $request->travel_date;
            
            $freequotes->form_name           = "Book an Umrah/Hajj Consultancy Appointment";
            $freequotes->page_url            = $request->page_url;
            $freequotes->gclid               = $request->gclid;

            $freequotes->save();
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
