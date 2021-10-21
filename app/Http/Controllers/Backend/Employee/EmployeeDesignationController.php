<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Designation;

class EmployeeDesignationController extends Controller
{
    //
    public function ViewDesignation(){
        
        $data['allData'] = Designation::all();
        
        return view('backend.employee.designation.view_designation', $data);
    }


    public function DesignationAdd(){
        return view('backend.employee.designation.add_designation');
    }


    public function DesignationStore(Request $request){

        $designation = new Designation();

        $designation->name = $request->name;

        $designation->save();
        
        return redirect()-> route('employee.designation.view')->with('success', '');
    }


    public function DesignationEdit($id){

        $data['designation'] =  Designation::find($id);

       
        
        return view('backend.employee.designation.edit_designation', $data);
    }


    public function DesignationUpdate(Request $request, $id){

        $designation =  Designation::find($id);

        $designation->name = $request->name;

        $designation->save();
       
        
        return redirect()-> route('employee.designation.view')->with('success', '');
    }


    public function DesignationDelete(Request $request){

        $id =$request->id ;

        $designation =  Designation::find($id);


        $designation->delete();
       
        
        return redirect()-> route('employee.designation.view')->with('success', '');
    }
}
