<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\crud;
use App\Models\user;
use Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\find;

class CrudController extends Controller
{

    // all student list  view: /table 
    public function showData()
    {
        $showData=crud::all();
        return view('show_data',compact('showData'));

    }


    // Admin list  view: /admin 
    public function showAdmin()
    {
        $showAdmin=user::all();

        return view('show_admin',compact('showAdmin'));

    }


    // student attendance  view: /get-attendance 
    public function getAttendance()
    {
        $attendance=crud::all();

        return view('get_attendance',compact('attendance'));

    }

    //Get attendance  view:  post: /submit-attendance
    public function submitAttendance(Request $req)
    {
        // $data = $req->post();
        // print_r($data);die;

        $roll_number = $req->roll_number;
        $name = $req->name;
        $action = $req->action;
        $date=$req-> date;

            for($i=0;$i<count($roll_number);$i++){
                $datasave=[
                    'roll_number' =>$roll_number[$i],
                    'name' => $name[$i],
                    'action' => $action[$i],
                    'date'=>$date,
                ];
                DB::table('attendance')->insert($datasave);
            }

        session::flash('mesg', 'Attendance added successfully');
        return redirect('/table');
            

    }

    //Add new student  view: /add-data
    public function addData()
    {
        return view('add_data');
    }


    //store new student data  view: post: /store-data
     public function storeData(Request $req)
     {
        $rules =[
            'name'=>'required| max:15',
            'email'=> 'required|email',
            'phone'=> 'required| max : 11'
        ];

        $customMessage=[
            'name.required'=>'Enter name',
            'name.max'=>'Name can not contain more then 30 character',
            'email.required'=>'Enter email',
            'email.email'=>'Email must be a valid email',
            'phone.required'=>'Enter phone number',
            'phone.max'=> 'phone can not contain more then 11 character'
        ];
        $this -> validate($req,$rules,$customMessage);

        $crud = new crud();
        $crud-> name = $req->name;
        $crud-> email = $req->email;
        $crud-> phone = $req->phone;
        $crud-> save();

        session::flash('mesg', 'Data successfully Added');
        return redirect('/table');
    }


    // edit student existing data  view: /edit-data/{id}
    public function editData($id=null)
    {
        // $editData=crud::find($id);
         $editData = DB::table('cruds')->find($id);
        return view('edit_data',compact('editData'));
        // return view('edit_data',['users'=>$editData]);
    }



    //After edit student data then update latest data.  view: post: /update-data/{id}
    public function updateData(Request $req,$id)
    {
        $rules =[
            'name'=>'required| max:15',
            'email'=> 'required|email',
            'phone'=> 'required| max : 11'
        ];

        $customMessage=[
            'name.required'=>'Enter name',
            'name.max'=>'Name can not contain more then 30 character',
            'email.required'=>'Enter email',
            'email.email'=>'Email must be a valid email',
            'phone.required'=>'Enter phone number',
            'phone.max'=> 'phone can not contain more then 11 character'
        ];
        $this -> validate($req,$rules,$customMessage);

        $crud = crud::find($id);
        $crud-> name = $req->name;
        $crud-> email = $req->email;
        $crud-> phone = $req->phone;
        $crud-> save();
        session::flash('mesg', 'Data successfully Updated');
        return redirect('/home');
    }


    // delete student data  view: /delete-data/{id}
    public function deleteData($id=null)
    {
        $deleteData=crud::find($id);
        $deleteData-> delete();
        session::flash('mesg', 'Data successfully Deleted');
        return redirect('/home');
    }

    // Student report generator  view: /report
    public function showReport()
    {

        return view('show_report');

    }

    // system dashboard  view: /dashboard
    public function dashboard(){

        return view('show_dashboard');

    }


    // search by date for genarating student report  view: /attendance-report
    public function search(Request $req)
    {
        $fromDate=$req->input('from');
        $toDate=$req->input('to');

        $report=DB::table('attendance')->select()
        ->where('date','>=',$fromDate)
        ->where('date','<=',$toDate)
        ->get();
        session::flash('mesg', 'Report Generated');

        // $data = $req->post();
        // print_r($data);die;

        return view('show_report',compact('report','fromDate','toDate'));

        // return view('show_report')-> with(['report' => $report]);
        // return ($report);
    }
   
}
