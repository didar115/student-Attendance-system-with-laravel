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
    public function showData(){
        $showData=crud::all();

        return view('show_data',compact('showData'));

    }
    public function showAdmin(){
        $showAdmin=user::all();

        return view('show_admin',compact('showAdmin'));

    }
    public function getAttendance(){
        $attendance=crud::all();

        return view('get_attendance',compact('attendance'));

    }
    public function submitAttendance(Request $req){
        $data = $req->post();
        print_r($data);die;
        // $inputValue=$req->all();
        // $arrayToString= implode(',', $req->input('attendance'));
        // $inputValue= attendance::create($inputValue);
        // $attendance = new attendance();


        $roll_number = $req->roll_number;
        $name = $req->name;
        $action = $req->action;
        $date=$req-> date;
        // print_r($data);die;

            for($i=0;$i<count($roll_number);$i++){
                $datasave=[
                    'roll_number' =>$roll_number[$i],
                    'name' => $name[$i],
                    // if( 'action'=>$action[$i]!=1){
                    //     'action'=>$action[$i]=0;
                    // }else{
                    // }

                    'action' => $action[$i],
                    'date'=>$date,
                ];
        DB::table('attendance')->insert($datasave);
            }
            session::flash('mesg', 'Attendance added successfully');
        return redirect('/home');
            

    }



    public function showReport(){

        return view('show_report');

    }

    public function addData(){
        return view('add_data');
    }

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
    return redirect('/home');
    }



    public function editData($id=null){
        // $editData=crud::find($id);
         $editData = DB::table('cruds')->find($id);
        return view('edit_data',compact('editData'));
        // return view('edit_data',['users'=>$editData]);
    }




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

    public function deleteData($id=null){
        $deleteData=crud::find($id);
        $deleteData-> delete();
        session::flash('mesg', 'Data successfully Deleted');
        return redirect('/home');
    }





    public function search(Request $req){
        $formDate=$req->input('from');
        $toDate=$req->input('to');

        $query=DB::table('attendance')->select()
        ->where('date','>=',$formDate)
        ->where('date','>=',$toDate)
        ->get();
        return view('show_report',compact('query'));
        // return ($query);
    }
   
}
