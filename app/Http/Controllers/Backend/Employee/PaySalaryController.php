<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\EmployeeSalaryLog;
use App\Models\User;

use PDF;

class PaySalaryController extends Controller
{
    //
    public function ViewPaySalary(){
        return view('backend.employee.pay_salary.view_pay_emp'); 
    }


    public function SalaryPayEmployeeGet(Request $request){
      
       
        $date = date('Y-m', strtotime($request->date));
        

        if($date != ''){
            $where[] =  ['date', 'like', $date.'%'];
        }
       
        $data =  User::where('usertype','employee')->where('status', 1)->get();
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

              
                $color = 'success';
                $color2nd = 'info';
                
               

                $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';

                $html[$key]['tdsource'] .= '<td>'.$attend->name.
                '<input type="hidden" name="pay_date" value="'.$date.'">'.'</td>';

                $html[$key]['tdsource'] .= '<td>'.$attend->gender.'</td>';


                $html[$key]['tdsource'] .= '<td>'.number_format($attend->salary, 0, ',', ' ').' Fcfa' .'</td>';

               
                $html[$key]['tdsource'] .='<td>';
                    
               

                if( $account_salary == null){
                    $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color2nd.'" 
                    title="Pay" 
                      target="_blanks" 
                    href="'.route("pay.salary.store",[$attend->id,$request->date]).
                    '?employee_id='.$attend->id.'?date='.$request->date.'">Payer</a>';
    
                }else{
                    $html[$key]['tdsource'] .='<a class="btn btn-sm disabled btn-'.$color.'" 
                    title="Pay">Déjà Payé</a>';
                }
                
                $html[$key]['tdsource'] .= '</td>';
                
            

            } 
            return response()->json(@$html); 

        }
    }

    public function PaySalaryStore(Request $request, $id, $date ){
        $data['pay_date'] = date('Y-m', strtotime($date));
        
        $data['employee'] = User::find($id);

        $check = EmployeeSalaryLog::where('employee_id', $id)->where('date',$data['pay_date'])->first();

        if($check == null){
            $paySalary = new EmployeeSalaryLog();
            $paySalary->employee_id = $data['employee']->id;
            $paySalary->date = $data['pay_date'];
            $paySalary->salary =  $data['employee']->salary;
    
            $paySalary->save();
        }else{
            $check->employee_id = $data['employee']->id;
            $check->date = $data['pay_date'];
            $check->salary =  $data['employee']->salary;
    
            $check->save();
        }

     

        $pdf = PDF::loadView('backend.employee.pay_salary.pay_salary_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');


        return redirect()->back();
        
    }
}
