<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\Qualification;
use Session;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

class QualificationController extends Controller
{
    function create()
    {
        return view('addqualification');
    }

    // function store(Request $request)
    // {
    //     $name = $request -> name;

    //     $generator = Helper::IDGenerator(new Qualification, 'custom_id', 5, 'KHS');
    //     $khmer = new Qualification;
    //     $khmer -> custom_id = $generator;
    //     $khmer -> name = $request->input('name');

    //     $khmer->save();
    //     Session::flash('success', "Qualification successfully added.");
    //     return redirect()->route('showQualif');
    // }

    public function save(Request $request) 
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $qualifications = new Qualification;

        $qualifications->name = $request->input('name');
        
        $qualifications->save();

        Session::flash('success', "Qualification successfully added.");
        return redirect()->route('showQualif');
    }

    function show()
    {
        $qualifications = Qualification::paginate(10);
        return view('qualificationpage')->with('qualifications', $qualifications);
    }

    function edit($id)
    {
        $qualifications = Qualification::find($id);
        return view('editqualif', compact('qualifications','id'));
    }

    function update()
    {
        $r=request();//retrive submited form data 
        $qualifications = Qualification::find($r->ID);

        $qualifications->name=$r->name;
        
        $qualifications->save(); //run the SQL update statment
        return redirect()->route('showQualif');
    }

    function delete($id)
    {
        $qualifications = Qualification::find($id);
        $qualifications->delete();

        Session::flash('success', "Qualification successfully deleted.");
        return redirect()->route('showQualif');
    }

    function search()
    {
        $request = request();
        $keyword = $request->search;
        $qualifications = DB::table('qualifications')
        ->where('name', 'like', '%' .$keyword. '%')
        ->get();

        return view('qualificationpage')->with('qualifications', $qualifications);
    }
}
