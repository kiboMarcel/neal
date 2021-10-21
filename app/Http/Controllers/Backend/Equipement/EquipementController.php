<?php

namespace App\Http\Controllers\Backend\Equipement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Equipement;

use DB;

class EquipementController extends Controller
{
    //

    public function ViewEquipement(){


        $data['allData'] = Equipement::where('type', 'recuperable')->cursorPaginate(15);
        $data['count'] = Equipement::where('type', 'recuperable')->count();        
        return view('backend.equipement.view_equipement', $data);

    }
    public function ViewEqui_non(){


        $data['allData'] = Equipement::where('type', 'non recuperable')->cursorPaginate(15);
        $data['count'] = Equipement::where('type', 'non recuperable')->count();        
        return view('backend.equipement.view_equi_non', $data);

    }

   


    public function EquipementAdd(){
        return view('backend.equipement.equipement.add_emp');
    }


    public function Equipementstore(Request $request){
        
        $check = Equipement::where('nom', $request->nom)->get();

        if(count($check->toArray()) > 0){
            dd('cet équipement éxiste déjà.');
        }else{

            if($request->save == 'recuperable'){

                $equipement= new Equipement();
                $equipement->nom = $request->nom;
                $equipement->unite = $request->unite;
                $equipement->prix_unitaire = $request->prix_unitaire;
                $equipement->quantite = $request->quantite;
                $equipement->type = 'recuperable';
                    
                $equipement->save();
                   
        
                return redirect()-> route('equip.registration.view')->with('success', '');
               
            }else{
                $equipement= new Equipement();
                $equipement->nom = $request->nom;
                $equipement->unite = $request->unite;
                $equipement->prix_unitaire = $request->prix_unitaire;
                $equipement->quantite = $request->quantite;
                $equipement->type = 'non recuperable';
                    
                $equipement->save();
                   
        
                return redirect()-> route('equipement.registration.view')->with('success', '');
               

                }


       
        }

           /*  $equipement = Equipement::where('type', 'equipement')->orderBy('id', 'DESC')->first();

          
            $equipement= new Equipement();
            $equipement->nom = $request->nom;
            $equipement->unite = $request->unite;
            $equipement->prix_unitaire = $request->prix_unitaire;
            $equipement->prix_total = $request->prix_total;
            $equipement->quantite = $request->quantite;
            $equipement->type = $request->type;
            
            $equipement->save();
           

        return redirect()-> route('equipement.registration.view')->with('success', ''); */
    }

    public function EquipementEdit($id){
        $data['editData'] = Equipement::find($id);
        return view('backend.equipement.edit_equipement', $data);
    }
    
    public function EquipementUpdate(Request $request ,$id){
       
        $equipement=  Equipement::find($id);
            
        $equipement->nom = $request->nom;
            $equipement->unite = $request->unite;
            $equipement->prix_unitaire = $request->prix_unitaire;
            $equipement->prix_total = $request->prix_total;
            $equipement->quantite = $request->quantite;
            $equipement->type = $request->type;
            

            $equipement->save();

        return redirect()-> route('equipement.registration.view')->with('successUpdate', '');
    }

    public function EmployeeDetail(Request $request ,$id){
       
        $data['details'] =  User::find($id);
        /* $data['details'] =  User::with(['student'])->
        where('student_id', $id)->first(); */


        //SCHOOL DATA
        $data['school_info'] =  schoolInfo::where('id', 1)->first();

        $pdf = PDF::loadView('backend.employee.employee_reg.employee_details_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

    }
}

//non recuperable


