<?php
require 'vendor/autoload.php';

use MailerLite\MailerLite;

if (($_REQUEST["person_email"]!="") && ($_REQUEST["person_name"]!="")){

// Replace with your actual API key
$apiKey = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI0IiwianRpIjoiOGY4MWI1MGRiN2NmZDZjOGMyNThlZDY4MjdjYzc0NzFjY2FiZmU4ZjdmMDM0NjBmY2NhYjJmYTI2OWQwNWY3MTZiZjA2NTY5Njc2MDNiMTUiLCJpYXQiOjE3NDg5NjUxMjYuOTA1MDQ3LCJuYmYiOjE3NDg5NjUxMjYuOTA1MDQ5LCJleHAiOjQ5MDQ2Mzg3MjYuOTAxODM1LCJzdWIiOiIxNDExNzc3Iiwic2NvcGVzIjpbXX0.aCuKxBDIv2yY63lR8KL11ASBpXLJ_EBvnhOHb-5KgAtjr468CItN5ZkAU1u4rs5rWNJiL22OdJFXkmHhhWlnUr7iL05CMq8dvrnhkmd1FFhPx2x-0dHoQ6dqS23ed9e7jOAzPcoatYZkuy_yuZ8foWTZjF1p0bXfzZXp3rw2VIb7dj1m4KyckpA7hj4KPQ4d_OR-GoGLD5t8CbzAsy9lelBYQn7IUUnPKPWJ3ktxuB3338DSBRvqBRcGpK4I-xdNjYXexXEE9eDXl3U7nHMZyz-VFozGUzTFy5zJ2OY-JjbAy2pTDAvbD4osiAl4dwqlQkb1zMpoLY5LbGkg_2nttcrkIoxxNzz5DHtF-k5KdiNcagW-Z913u8XCUTzdhI6oS68ui2GRFUGB4nFVeKSeGRRfRTJJmzPuYHVjHj_2R-nSR_GqFce2dcCvAsIUM2dzU-psj5d9R_3tVDWIMh4PZACXEmrpNv0HJB8u3VO2TiyDFiPgCluy2dcjCLJ_LxE2oCrzzw2RV8eirNZdknVRow0oBbWepshkeQW-yxvQjtDrqrKcP1HRL9HP9pFxbZlvusC_D0cXcuU2p4JbkP-ckEX4zpqAOsClBr5K8x72QEC-oKsxlIv5aNeUMgObYuXfXLXYCJLvabi7gg9jGI6fOJMA8pSjNoSLrq_-1DT4oMI';

$mailerLite = new MailerLite(['api_key' => $apiKey]);

// Subscriber data
$data = [
    'email' => $_REQUEST["person_email"],
    'fields' => [
        'name' => $_REQUEST["person_name"],
        'company' => ''
    ],
    'groups' => ['156285899309581489'] // Optional: add subscriber to specific groups your_group_id
];

try {
    $response = $mailerLite->subscribers->create($data);
    //print_r($response);
     //print_r($response['status_code']);
     $res_status = $response['status_code'];
     if ($res_status == 200){
         $message = "The request was accepted.";
     }elseif ($res_status == 201){
        $message = "Resource was created.";
     }elseif ($res_status == 202){
        $message = "The request was accepted and further actions are taken in the background.";
     }elseif ($res_status == 204){
        $message = "The request was accepted and there is nothing to return.";
     }elseif ($res_status == 400){
        $message = "There was an error when processing your request. Please adjust your request based on the endpoint requirements and try again.";
     }elseif ($res_status == 401){
        $message = "The provided API token is invalid.";
     }elseif ($res_status == 403){
        $message = "The action is denied for that account or a particular API token.";
     }elseif ($res_status == 404){
        $message = "The requested resource does not exist on the system.";
     }elseif ($res_status == 405){
        $message = "HTTP method is not supported by the requested endpoint.";
     }elseif ($res_status == 408){
        $message = "There is an error on our system.";
     }elseif ($res_status == 422){
        $message = "There was a validation error found when processing the request. Please adjust it based on the endpoint requirements and try again.";
     }elseif ($res_status == 429){
        $message = "There were too many requests made to the API.";
     }elseif ($res_status == 500){
        $message = "There was an error on our system.";
     }elseif ($res_status == 502){
        $message = "There was an error on our system.";
     }elseif ($res_status == 503){
        $message = "There was an error on our system.";
     }elseif ($res_status == 504){
        $message = "There was an error on our system.";
     }
     
     if ($res_status < 204){
         
            $message = '<h1 style="font-family: Arial;font-size: 20px;">Thank you for subscribing to Tawheed Travels!</h1>
<p style="font-family: Arial;font-size: 16px;">You’ll now receive exclusive offers, travel tips, and early access to our Umrah & Hajj deals.</p>
<p style="font-family: Arial;font-size: 16px;">We’re glad to have you with us!<br><br>
<strong style="font-size:18px;">Team Tawheed Travels</strong><br>
<a href="https://tawheedtravel.co.uk" target="_blank">tawheedtravel.co.uk</a></p>';
     }
     

} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

}else{
    echo "No Data Found !";
}


echo '<div style="text-align:center;margin: 30px;">'.$message.'</div>';