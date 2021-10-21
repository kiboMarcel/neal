<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;

class EmployeeLeaveController extends Controller
{
    //
    public function ViewLeave(){
       
        $data['allData'] = EmployeeLeave::orderBy('id', 'desc')->
        with(['employee', 'purpose'])->cursorPaginate(20);

        //dd($data['allData']);
        return view('backend.employee.employee_leave.view_emp_leave', $data);

    }


    public function LeaveAdd(){
       
        $data['employees'] = User::where('usertype','employee')->orderBy('name')->get();
        $data['leave_purpose'] = LeavePurpose::all();

        return view('backend.employee.employee_leave.add_emp_leave', $data);

    }

    

    public function LeaveStore(Request $request){
       
     
      if ($request->leave_purpose_id == "0"){
        $leavePurpose = new LeavePurpose();
        $leavePurpose->name = $request->name;

        $leavePurpose->save();

        $leave_purpose_id = $leavePurpose->id;
      }else{
        $leave_purpose_id = $request->leave_purpose_id;
      }
      

      $leave = User::find($request->employee_id);
      $leave->status = 0;

      $leave->save();


      $data = new EmployeeLeave();
      $data->employee_id = $request->employee_id;
      $data->leave_purpose_id = $leave_purpose_id;
      $data->end_date =  date('Y-m-d', strtotime($request->end_date));

      $data->save();


      return redirect()-> route('employee.leave.view');
    }


    public function LeaveEdit($id){
       
      $data['editData'] = EmployeeLeave::find($id);
      $data['employees'] = User::where('usertype', 'employee')->get();
      $data['leave_purpose'] = LeavePurpose::all();

      return view('backend.employee.employee_leave.edit_emp_leave', $data);

  }

    
  public function LeaveUpdate(Request $request, $id){
       
     
      if ($request->leave_purpose_id == "0"){
        $leavePurpose = new LeavePurpose();
        $leavePurpose->name = $request->name;

        $leavePurpose->save();

        $leave_purpose_id = $leavePurpose->id;
      }else{
        $leave_purpose_id = $request->leave_purpose_id;
      }

      $data = EmployeeLeave::find($id);
      $data->employee_id = $request->employee_id;
      $data->leave_purpose_id = $leave_purpose_id;
      $data->end_date =  date('Y-m-d', strtotime($request->end_date));

      $data->save();


      return redirect()-> route('employee.leave.view');
    }

    public function LeaveDelete($id){
      
       
      $leave = EmployeeLeave::find($id);

      $leave->delete();

      $user = User::find($leave->employee_id);

      $user->delete();

      return redirect()-> route('employee.leave.view');

  }
}
