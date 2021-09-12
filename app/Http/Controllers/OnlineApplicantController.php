<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OnlineApplicant;
use Illuminate\Support\Facades\Storage;
use File;
use Response;
use App\Models\Country;
use App\Models\City;
use App\Models\State;
use App\Models\Jobtitle;
use App\Models\Employee;
use Session;
use DB;
use Notification;
use App\Notifications\Congratulation;
use App\Notifications\Unfortunately;

class OnlineApplicantController extends Controller
{
    //
    function show()
    {
        return view('guest.onlinerecruitment')->with("countries", Country::all())
                                              ->with("cities", City::all())
                                              ->with("states", State::all())
                                              ->with("jobtitles", Jobtitle::all());
    }

    function store(Request $request)
    {
        $image=$request->file('profile-image');   
        $image->move('images',$image->getClientOriginalName());                
        $imageName=$image->getClientOriginalName();

        $document=$request->file('resume-file');   
        $document->move('documents',$document->getClientOriginalName());   
        $documentName=$document->getClientOriginalName();

        $addApplicant = OnlineApplicant::create([
            'name' => $request -> name,
            'ic' => $request -> noic,
            'dob' => $request -> dob,
            'gender' => $request -> gender,
            'marital_status' => $request -> maritalstatus,
            'race' => $request -> race,
            'religion' => $request -> religion,
            'nationality' => $request -> nationality,
            'email' => $request -> email,
            'phone_num' => $request -> phone,
            'address' => $request -> address,
            'city' => $request -> city,
            'state' => $request -> state,
            'zipcode' => $request -> zipcode,
            'country' => $request -> country,
            'position_applied' => $request -> position,
            'expected_salary' => $request -> Esalary,
            'document' => $documentName,
            'image' => $imageName,
            'emergency_contact_name'  => $request -> Ename,
            'emergency_contact_number' => $request -> Ephone,
            'relation_emergency' => $request -> Erelation,
        ]);
        
        return view('guest.recruitment');
    }

    function adminshow()
    {
        $onlineapplicants = OnlineApplicant::all();
        return view('admin.adminrecruit')->with('onlineapplicants', $onlineapplicants);
        
    }

    function view($id)
    {
        $onlineapplicants = OnlineApplicant::all()->where('id', $id);
        return view('admin.recruitmentdetail')->with('onlineapplicants', $onlineapplicants);
    }

    function download($id)
    {
        $onlineapplicants = OnlineApplicant::where('id', $id)->firstOrFail();
        $pathToFile = public_path('documents/'. $onlineapplicants->document);
        return response()->download($pathToFile);
    }

    function moverecord(Request $request, $id)
    {
        $onlineapplicants = OnlineApplicant::where('id',$id)->first();
        
        $OAname = $onlineapplicants -> name;
        $OAic = $onlineapplicants -> ic;
        $OAdob = $onlineapplicants -> dob;
        $OAgender = $onlineapplicants -> gender;
        $OAmarital = $onlineapplicants -> marital_status;
        $OArace = $onlineapplicants -> race;
        $OAreligion = $onlineapplicants -> religion;
        $OAnation = $onlineapplicants -> nationality;
        $OAemail = $onlineapplicants -> email;
        $OAphone = $onlineapplicants -> phone_num;
        $OAaddress = $onlineapplicants -> address;
        $OAcountry = $onlineapplicants ->country;
        $OAdocument = $onlineapplicants -> document;
        $OAimage = $onlineapplicants -> image;
        $OAemergency_name = $onlineapplicants -> emergency_contact_name;
        $OAemergency_num = $onlineapplicants -> emergency_contact_number;

        $addEmployees = Employee::create([
            'ic' => $request = $OAic,
            'employee_Name' => $request = $OAname,
            'image' => $request = $OAimage,
            'gender' => $request = $OAgender,
            'date_of_birth' => $request = $OAdob,
            'race' => $request = $OArace,
            'country' => $request = $OAcountry,
            'national' => $request = $OAnation,
            'address' => $request = $OAaddress,
            'contact_number' => $request = $OAphone,
            'email' => $request = $OAemail,
            'emergency_Name' => $request = $OAemergency_name,
            'emergency_Contact_Number' => $request = $OAemergency_num,
            'document' => $request = $OAdocument,
            'marital_status' => $request = $OAmarital,
        ]);

        $onlineapplicants->delete();

        return view('admin.employeepage')->with("employees", Employee::all());
    }
    
    function search()
    {
        $request = request();
        $keyword = $request->search;
        $onlineapplicants = DB::table('online_applicants')
        ->where('name', 'like', '%' . $keyword . '%')
        ->orWhere('gender', 'like', '%' . $keyword . '%')
        ->get();
        
        return view('admin.adminrecruit')->with('onlineapplicants', $onlineapplicants);
    }

    public function sendSuccessful($id)
    {
        $onlineapplicants = OnlineApplicant::where('id',$id)->first();

        $successdetails = [

            'greeting' => 'Hi,',
            'body'=>'Congratulations on being included in our interview list. 
                    Our human resources department will 
                    contact you as soon as possible. Thank you!',
            'lastline'=>'Hope you have a nice day!',

        ];

        Notification::send($onlineapplicants, new Congratulation($successdetails));

        Session::flash('success', "Email successfully send.");
        return redirect()->route('admin.recruitment');
    }

    public function sendUnfortunately($id)
    {
        $onlineapplicants = OnlineApplicant::where('id',$id)->first();

        $faildetails = [

            'greeting' => 'Hi,',
            'body'=>'We regret to inform you that you were not included in the interview list. 
                    I hope you don’t get discouraged and keep going!',
            'lastline'=>'Hope you have a nice day!',

        ];

        Notification::send($onlineapplicants, new Unfortunately($faildetails));

        Session::flash('success', "Email successfully send.");
        return redirect()->route('admin.recruitment');
    }
    
}
