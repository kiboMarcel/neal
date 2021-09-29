@extends('admin.admin_master')

<style>
    .row{
        justify-content: center;
    }
    
  .head {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }


    .button {
        float: right;
        margin-top: 5px;
    }

    .bt-position {
      display: flex;
      justify-content: flex-end;
  }

</style>

@php
$dob = date('Y-m-d', strtotime($editData->date_of_birth));
$joindate = date('Y-m-d', strtotime($editData->join_date));
@endphp

@section('admin')

    <div class="content">
        <h2 class="content-heading">Modifier Employé</h2>
        <div class="row push">

            <div class="col-lg-10">
                <!-- Form Grid -->
                <form  method="post" action=" {{ route('employee.update',$editData->id ) }} " enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-4">
                            <label class="form-label" for="name">Nom Prénoms</label>
                            <input type="text" class="form-control" value="{{$editData->name}}"
                             id="name" required name="name"
                               >
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="mobile">Numéros</label>
                            <input type="text" class="form-control" id="mobile" value="{{$editData->mobile}}" 
                            required name="mobile"
                               >
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="email">Date de Naissance</label>
                            <input type="date" class="form-control"  value="{{$dob}}"
                            required id="date_of_birth" name="date_of_birth">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">
                            <label class="form-label" for="place_of_birth">Lieu de naissance</label>
                            <input type="text" class="form-control"  value="{{$editData->place_of_birth}}"
                             id="place_of_birth" required name="place_of_birth"
                            >
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="person_to_contact">Personne à prévenir</label>
                            <input type="text" class="form-control"  value="{{$editData->person_to_contact}}"
                             id="person_to_contact" required name="person_to_contact"
                            >
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="gender">Genre</label>
                            <select class="js-select2 form-select" name="gender" id="example-select2" required name="example-select2" style="width: 100%;" data-placeholder="Choose one..">
                              <option disabled  selected>Selectionez le sexe</option>
                              <option value="Masculin" >Masculin</option>
                              <option value="Feminin">Feminin</option>
                              
                            </select>
                        </div>
                     
                    </div>
                    <div class="row mb-4">
                      
                        <div class="col-4">
                            <label class="form-label" for="awareness1">Connaissance N1</label>
                            <input type="text" class="form-control" required value="{{$editData->awareness1}}"
                             id="awareness1" name="awareness1"
                           >
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="awareness2">Connaissance N2</label>
                            <input type="text" class="form-control" required value="{{$editData->awareness2}}"
                             id="awareness2" name="awareness2"
                            >
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="awareness3">Connaissance N3</label>
                            <input type="text" class="form-control" required value="{{$editData->awareness3}}"
                             id="awareness3" name="awareness3"
                            >
                        </div>
                      
                    </div>
                    <div class="row mb-4">
                       
                        <div class="col-4">
                            <label class="form-label" for="join_date">Date début Service </label>
                            <input type="date" class="form-control"required id="join_date"
                            value="{{$joindate}}" name="join_date">
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="salary">Salaire</label>
                            <input type="text" class="form-control"  value="{{$editData->salary}}"
                             required id="salary" name="salary"
                            >
                        </div>
                        <div class="col-4">
                        </div>
                      
                    </div>
                

                    <div class="mb-4 bt-position">
                      <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
                <!-- END Form Grid -->
            </div>
        </div>
        
    </div>
@endsection
