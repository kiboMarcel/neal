<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\EmployeeSalaryLog;
use App\Models\User;

class EmployeePaidController extends Controller
{
    //
    public function ViewSalary(){
        $data['allData'] = EmployeeSalaryLog::select('date')
        ->groupBy('date')->cursorPaginate(20);
        return view('backend.employee.employee_paid.view_emp_paid', $data); 
    }


    public function SalaryAdd(){
      

        return view('backend.employee.employee_paid.add_emp_paid'); 
    }

  

    public function SalaryEmployeeGet(Request $request){
      
       
        $date = date('Y-m', strtotime($request->date));

        if($date != ''){
            $where[] =  ['date', 'like', $date.'%'];
        }
       
        $data =  User::where('usertype','employee')->get();
        //dd($data);

        if($data->toArray() == null || $date== '' ){

            $html['h5source']  = '<h5>Pas de correspondance</h5>';
            return response()->json(@$html); 
        }
        else{
            //dd($student->toArray());
            $html['thsource']  = '<th>#</th>';
            $html['thsource'] .= '<th> Nom Employé</th>';
            $html['thsource'] .= '<th> Sexe</th>';
            $html['thsource'] .= '<th>Salaire  </th>';
            $html['thsource'] .= '<th>Select </th>';


            foreach ($data as $key => $attend) {

                $account_salary = EmployeeSalaryLog::where('employee_id', $attend->id)
                ->where($where)->first();

                if($account_salary != null){
                    $checked = 'checked';
                }else{
                    $checked = '';
                }
                
               

                $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';

                $html[$key]['tdsource'] .= '<td>'.$attend->name.
                '<input type="hidden" name="date" value="'.$date.'">'.'</td>';

                $html[$key]['tdsource'] .= '<td>'.$attend->gender.'</td>';


                $html[$key]['tdsource'] .= '<td>'.number_format($attend->salary, 0, ',', ' ').' Fcfa' .'</td>';

               
                $html[$key]['tdsource'] .='<td>'.
                '<input type="hidden" name="employee_id[]" value="'.$attend->id.'">
                <label class="new-control new-checkbox checkbox-outline-success">
                <input type="checkbox" name="checkmanage[]" value="'.$key.'"
                '.$checked.' class="new-control-input" disabled>
                <span class="new-control-indicator"></span>Déjà payer
              </label>'.'</td>';
                
            

            } 
            return response()->json(@$html); 

        }
    }

    public function SalaryStore(Request $request){
      
        $date = date('Y-m', strtotime($request->date));
        

        $checkdata = $request->checkmanage;
        
        if($checkdata != null){
            for ($i=0; $i < count($checkdata)  ; $i++) { 
                $data = new EmployeeSalaryLog();

                $data->date = $date;
                $data->employee_id = $request->employee_id[ $checkdata[$i]];
                $data->amount = $request->amount[ $checkdata[$i]];
                //dd($request->employee_id[ $checkdata[$i]]);
                $data->save();

            }
        }

        if (!empty(@data) ||  empty($checkdata) ){
            return redirect()->route('account.salary.view')->with('success', '');
        }else{
            //dd('error');
            return redirect()->back()->with('error', '');
        }
    }
}
