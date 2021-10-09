<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\crud;
use Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\find;

class CrudController extends Controller
{
    public function showData(){
        $showData=crud::all();

        return view('show_data',compact('showData'));

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
   
}
