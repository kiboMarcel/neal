<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\EmployeeSalaryLog;
use App\Models\Designation;

use PDF;
use DB;

class EmployeeRegController extends Controller
{
    //
    public function ViewEmployee(){
        $data['allData'] = User::where('usertype', 'Employee')->with('designation')->
        where('status', 1)->orderBy('name')->get();
        
        $data['count'] = User::where('usertype', 'Employee')->where('status', 1)->count();

        $data['designations'] = Designation::all();

        return view('backend.employee.employee_reg.view_emp', $data);
    }

    public function EmployeeAdd(){
        $data['designation'] = Designation::all();
        return view('backend.employee.employee_reg.add_emp', $data);
    }


    public function EmployeeStore(Request $request){
        
        DB::transaction(function () use ($request) {
            
            $employee = User::where('usertype', 'employee')->orderBy('id', 'DESC')->first();

          /*   if($employee == null){
                $firstReg = 0;
                $employeeId = $firstReg+1;
                if ($employeeId < 10){
                    $id_no = '000'.$employeeId;
                }elseif($employeeId < 100){
                    $id_no = '00'.$employeeId;
                }elseif($employeeId < 1000){
                    $id_no = '0'.$employeeId;
                }
            }else{
                $employee = User::where('usertype', 'employee')->orderBy('id', 'DESC')->first()->id;
                $employeeId = $employee+1;
                if ($employeeId < 10){
                    $id_no = '000'.$employeeId;
                }elseif($employeeId < 100){
                    $id_no = '00'.$employeeId;
                }elseif($employeeId < 1000){
                    $id_no = '0'.$employeeId;
                }
            } */

            $user= new User();
            $user->name = $request->name;
            $user->usertype = 'employee';
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->date_of_birth =  date('Y-m-d', strtotime( $request->date_of_birth) );
            $user->place_of_birth = $request->place_of_birth;
            $user->join_date = date('Y-m-d', strtotime( $request->join_date) );
            $user->salary = $request->salary;
            $user->designation_id = $request->designation_id;
            $user->person_to_contact = $request->person_to_contact;
            $user->awareness1 = $request->awareness1;
            $user->awareness2 = $request->awareness2;
            $user->awareness3 = $request->awareness3;
            
            $user->save();
           
        });

        return redirect()-> route('employee.registration.view')->with('success', '');
    }

    public function EmployeeEdit($id){
        $data['editData'] = User::find($id);
        return view('backend.employee.employee_reg.edit_emp', $data);
    }

    public function EmployeeUpdate(Request $request ,$id){
       
            $user=  User::find($id);
            
            $user->name = $request->name;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->date_of_birth =  date('Y-m-d', strtotime( $request->date_of_birth) );
            $user->place_of_birth = $request->place_of_birth;
            $user->join_date = date('Y-m-d', strtotime( $request->join_date) );
            $user->salary = $request->salary;
            $user->person_to_contact = $request->person_to_contact;
            $user->awareness1 = $request->awareness1;
            $user->awareness2 = $request->awareness2;
            $user->awareness3 = $request->awareness3;
            

            $user->save();

        return redirect()-> route('employee.registration.view')->with('successUpdate', '');
    }

    public function EmployeeDetail(Request $request ,$id){
       
        $data['details'] =  User::find($id);
        $data['details'] =  User::where('id', $id)->with(['designation'])->first();
        //dd($data['details']);
        $pdf = PDF::loadView('backend.employee.employee_reg.details_employee_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

    }


    public function EmployeePromotion(Request $request ,$id){
       
        $data['details'] =  User::where('id', $id)->with('designation')->first();

        $data['designations'] = Designation::all();
        
        return view('backend.employee.employee_reg.promotion_emp', $data);

    }

    public function EmployeePromotionStore(Request $request, $id){
       
        $promotionStore =  User::find($id);

        $promotionStore->designation_id = $request->designation_id;
        $promotionStore->salary = $request->salary;

        $promotionStore->save();

       return redirect()-> route('employee.registration.view')->with('successUpdate', '');

    }
}
