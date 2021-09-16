<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\HealthFacility;
use App\Models\Employee;
use App\Models\VaccinationInfo;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;


class VaccinationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function addVA($id)
    {
        $employees = Employee::all()->where('id', $id);
        $hfs = HealthFacility::all();

        return view('admin.vaccination-mgmt.addVA')
            ->with('employees', $employees)
            ->with('hfs', $hfs);
    }

    public function findAddress(Request $request)
    {
        $address = HealthFacility::select('address')->where('id', $request->id)->first();

        return response()->json($address);
    }


    //addEmployee
    public function storeVA()
    {    //step 2 
        $r = request(); //step 3 get data from HTML

        $addCPD = VaccinationInfo::create([    //step 3 bind data
            'employee_Vaccination_ID' => $r->employee_Vaccination_ID, //add on 
            'employee_ID' => $r->employee_ID, //id
            'employee_IC' => $r->employee_IC, //id
            'employee_Name' => $r->employee_Name,
            'vaccine_Type' => $r->vaccine_Type,
            'health_Facility' => $r->health_Facility,
            'vaccination_Location' => $r->vaccination_Location,
            'vaccination_Date' => $r->vaccination_Date,
            'vaccination_Time' => $r->vaccination_Time,
            'vaccination_Status' => $r->vaccination_Status,

        ]);


        Session::flash('success', "Add New Vaccination Appointment Succesful!");

        return redirect()->route('viewVA');
    }

    //show employee
    public function show()
    {

        $employees = Employee::all();

        return view('admin.vaccination-mgmt.index')->with('employees', $employees);
    }

    public function showVA()
    {

        $vas = VaccinationInfo::all();

        return view('admin.vaccination-mgmt.indexVA')->with('vas', $vas);
    }

    //find employee to edit
    public function editVA($id)
    {

        $vas = VaccinationInfo::all()->where('id', $id);

        return view('admin.vaccination-mgmt.edit')
            ->with('vas', $vas)
            ->with('hfs', HealthFacility::all());
    }

    public function delete($id)
    {
        $vas = VaccinationInfo::find($id);
        $vas->delete();

        Session::flash('delete', "Vaccination Appointment Deleted Succesful!");
        return redirect()->route('viewVA');
    }

    //edit
    public function updateVA()
    {
        $r = request(); //retrive submited form data
        $vas = VaccinationInfo::find($r->ID);  //get the record based on product ID      

        $vas->employee_Vaccination_ID = $r->employee_Vaccination_ID;
        $vas->employee_ID = $r->employee_ID;
        $vas->employee_IC = $r->employee_IC;
        $vas->employee_Name = $r->employee_Name;
        $vas->vaccine_Type = $r->vaccine_Type;
        $vas->health_Facility = $r->health_Facility;
        $vas->vaccination_Location = $r->vaccination_Location;
        $vas->vaccination_Date = $r->vaccination_Date;
        $vas->vaccination_Time = $r->vaccination_Time;
        $vas->vaccination_Status = $r->vaccination_Status;
        $vas->save(); //run the SQL update statment
        Session::flash('update', "Vaccination Appointment Updated Succesful!");
        return redirect()->route('viewVA');
    }

    //search employee
    function searchVA()
    {
        $request = request();
        $keyword = $request->search;
        $vas = DB::table('vaccination_infos')
            ->where('employee_Vaccination_ID', 'like', '%' . $keyword . '%')
            ->orWhere('employee_ID', 'like', '%' . $keyword . '%')
            ->get();

        return view('admin.vaccination-mgmt.searchVA')->with('vas', $vas);
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $employees = DB::table('employees')
            ->where('employee_ID', 'like', '%' . $keyword . '%')
            ->orWhere('department', 'like', '%' . $keyword . '%')
            ->get();

        return view('admin.vaccination-mgmt.search')->with('employees', $employees);
    }


    public function showVADetail($id)
    {

        $vas = VaccinationInfo::all()->where('id', $id);
        //select * from products where id='$id'

        return view('admin.vaccination-mgmt.profileVA')->with('vas', $vas);
    }

    //--------------------------------------------------------------------//

    public function showMeVA()
    {

        $vas = VaccinationInfo::all()->where('employee_ID', Auth::id());
        $vaS = DB::table('vaccination_infos')
            ->get();

        foreach ($vaS as $va) {
            $va = VaccinationInfo::find($va->id);
            $today = Carbon::today();
            $date = $va->vaccination_Date;
            $time = $va->vaccination_Time;

            $datetime = $date . " " . $time;
            if ($today->gt($date)) {
                
                    $va->vaccination_Status = 'Unvaccinated';
                    $va->save();
                
            }
        }

        return view('employee.vaccination-mgmt.indexVA')->with('vas', $vas);
    }

    public function updateMeVA($id)
    {
        //retrive submited form data

        $cpds = VaccinationInfo::find($id);  //get the record based on product ID      

        $cpds->vaccination_Status = 'Vaccinated';
        $cpds->save(); //run the SQL update statment
        Session::flash('update', "Congratulations! You're vaccinated");
        return redirect()->route('viewMeVA');
    }

    function searchMeVA()
    {
        $request = request();
        $keyword = $request->search;
        $vas = DB::table('vaccination_infos')
            ->where('employee_Vaccination_ID', 'like', '%' . $keyword . '%')
            ->get();

        return view('employee.vaccination-mgmt.searchVA')->with('vas', $vas);
    }

    public function showMeVADetail($id)
    {

        $vas = VaccinationInfo::all()->where('id', $id);
        //select * from products where id='$id'

        return view('employee.vaccination-mgmt.profileVA')->with('vas', $vas);
    }
}
