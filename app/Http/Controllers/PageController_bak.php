<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\About;
use \App\Banner;
use \App\Client;
use \App\Featured;
use \App\HomeDetail;
use \App\Resource;
use \App\ResourceDownload;
use \App\ServiceCategory;
use \App\Teacher;
use \App\TeamMember;
use \App\Testimonial;
use \App\ServiceCategoryContact;
use \App\Subscription;
use \App\Contact;
use \App\Setting;
use \App\ContactUser;
use \App\Event;
use \App\EventPivot;
use Mailjet\LaravelMailjet\Facades\Mailjet;
use Mailjet\Resources;


class PageController extends Controller
{
    public function index(Request $request)
    {
        $home = HomeDetail::all()->toArray();
        $banner = Banner::orderby('id', 'asc')->get()->toArray();
        $featured = ServiceCategory::where('featured_service_category', 1)->orderBy('id', 'asc')->get()->toArray();
        $teacher = Teacher::orderBy('id', 'asc')->get()->toArray();
        $client = Client::where('status', '1')->orderby('id', 'asc')->get()->toArray();
        $testimonial = Testimonial::where('status', '1')->orderby('id', 'asc')->get()->toArray();
        $service_category = ServiceCategory::where('parent_category_id', '0')->where('status', '1')->orderby('id', 'asc')->get()->toArray();
        $all_events = Event::where('status','1')->orderby('id','desc')->take(4)->get()->toArray();  
        $all_images = EventPivot::where('status','1')->where('type','1')->orderby('id','desc')->get()->toArray();
        return view('frontend.pages.home')->with('home', $home[0])->with('banner', $banner)->with('featured', $featured)->with('teacher', $teacher)->with('client', $client)->with('testimonial', $testimonial)->with('service_category', $service_category)->with('all_events',$all_events)->with('all_images',$all_images);
    }

    public function testimonial(Request $request)
    {
        $testimonial = Testimonial::where('status', '1')->orderby('id', 'asc')->get()->toArray();
        return view('frontend.pages.testimonials')->with('testimonial', $testimonial);
    }

    public function client(Request $request)
    {
        $client = Client::where('status', '1')->orderby('id', 'asc')->get()->toArray();
        return view('frontend.pages.clients')->with('client', $client);
    }

    public function about(Request $request)
    {
        $about = About::all()->toArray();
        $team_member = TeamMember::where('status', '1')->orderby('id', 'asc')->get()->toArray();
        return view('frontend.pages.about')->with('about', $about[0])->with('team_member', $team_member);
    }

    public function resource(Request $request)
    {
        $resource = Resource::all()->toArray();
        $resource_download = ResourceDownload::where('status', '1')->orderby('id', 'asc')->get()->toArray();
        return view('frontend.pages.resource')->with('resource', $resource[0])->with('resource_download', $resource_download);
    }

    public function service(Request $request)
    {
        $service = ServiceCategory::where('status', '1')->where('parent_category_id', '0')->orderby('id', 'asc')->get()->toArray();
        return view('frontend.pages.services')->with('service', $service);
    }

    public function service_subcategory(Request $request, $id)
    {
        $main_category = ServiceCategory::find($id)->toArray();
        //echo '<pre>';print_r($main_category);

        $subcategory = ServiceCategory::where('status', '1')
        ->where('parent_category_id', $id)
        ->orderby('id', 'asc')->get()->toArray();

        //echo '<pre>';print_r($subcategory);die(); 
        return view('frontend.pages.service_subcategory')->with('main_category', $main_category)->with('subcategory', $subcategory);
    }

    public function subcategory_details(Request $request, $id){
     $subcategory = ServiceCategory::find($id)->toArray();
     return view('frontend.pages.subcategory')->with('subcategory', $subcategory);  
    }

    public function subcategory_contact(Request $request){

     $service_category_contact = new ServiceCategoryContact();
     $service_category_contact->name = $request->contact_name;
     $service_category_contact->email = $request->contact_email;
     $service_category_contact->phone_no = $request->contact_no;
     $service_category_contact->teaching = $request->service_cat_1;
     $service_category_contact->services = $request->service_cat_2;
     $service_category_contact->individual = $request->individual;
     $service_category_contact->corporate = $request->corporate;
     $service_category_contact->institute = $request->institute;
     $service_category_contact->message = $request->message;
     $service_category_contact->sub_category_id = $request->subcategory;
      
     if ($service_category_contact->save()) {
        return 1;
     }          
    }

    public function subscription_add(Request $request){

      $name = $request->subscription_name;
      $email = $request->subscription_email;
      $contact_no = $request->subscription_phone;


        $mj = new \Mailjet\Client(env('MAILJET_APIKEY'), env('MAILJET_APISECRET'),
              true,['version' => 'v3.1']);
        
        $body_1 = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "info@wrctpl.com",
                        'Name' => "ELTA"
                    ],
                    'To' => [
                        [
                            'Email' => "kalyan@wrctpl.com",
                            'Name' => "kalyan"
                        ]
                    ],
                    'Subject' => "Subscription Request",
                    'HTMLPart' => "<h3>Dear Admin,</h3>
                    <br />A new subscription has been submitted.
                    <br />Name: ".$name."   
                    <br />Email: ".$email."
                    <br />Contact No: ".$contact_no
                ]
            ]
        ];

        $body_2 = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "info@wrctpl.com",
                        'Name' => "ELTA"
                    ],
                    'To' => [
                        [
                            'Email' => $email,
                            'Name' => $name
                        ]
                    ],
                    'Subject' => "ELTA Subscription",
                    'HTMLPart' => "<h3>Dear ".$email.",</h3>
                    <br /> Your request has been sent successfully. We'll get back to you shortly."
                ]
            ]
        ];

        try{
            $response = $mj->post(Resources::$Email,['body' => $body_1]);
            $response = $mj->post(Resources::$Email,['body' => $body_2]);
            
            $subscription = new Subscription();
            $subscription->name = $request->subscription_name;
            $subscription->email = $request->subscription_email;
            $subscription->phone_no = $request->subscription_phone;
            $subscription->teaching = $request->subscription_teaching;
            $subscription->services = $request->subscription_hiring;
            $subscription->individual = $request->subscription_individual;
            $subscription->corporate = $request->subscription_corporate;
            $subscription->institute = $request->institute;

            if ($subscription->save()) {
                return 1;
            } 
        }catch(Exception $e){
            throw $e;
        }

    }

    public function contact(Request $request){  

     $contact_data = Contact::all()->toArray();
     $setting_data = Setting::all()->toArray();
     return view('frontend.pages.contact')->with('contact_data',$contact_data[0])->with('setting_data',$setting_data[0]);
    }

    public function contact_add(Request $request){

      $contact_user = new ContactUser();
      $contact_user->name = $request->contact_user_name;
      $contact_user->email = $request->contact_user_email;
      $contact_user->phone_no = $request->contact_user_phone;
      $contact_user->subject = $request->contact_user_subject;
      $contact_user->message = $request->contact_user_message;

       if ($contact_user->save()) {
        return 1;
     } 
   }

   public function quick_contact_add(Request $request){ 

      $quick_contact_user = new ContactUser();
      $quick_contact_user->name = $request->quick_contact_name;
      $quick_contact_user->email = $request->quick_contact_email;
      $quick_contact_user->phone_no = '';
      $quick_contact_user->subject = '';
      $quick_contact_user->message = $request->quick_contact_message;

       if ($quick_contact_user->save()) {  
        return 1;
     } 
   }

   public function gallery(Request $request){
    $all_events = Event::where('status','1')->orderby('id','desc')->take(4)->get()->toArray();  
    $all_images = EventPivot::where('status','1')->where('type','1')->orderby('id','desc')->get()->toArray();
    $about = About::all()->toArray();
    return view('frontend.pages.gallery')->with('all_events',$all_events)->with('all_images',$all_images)->with('about', $about[0]); 
   }

}
