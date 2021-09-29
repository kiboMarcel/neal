@extends('admin.admin_master')


<style>
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

</style>

@section('admin')

    <div class="content">
        
        <div class="table-responsive">
            <div class="head">
                <h3>Employés Payé  </h3>
                <a href=" {{ route('employee.add') }} " class="btn btn-primary button mb-2">Ajouter</a>
            </div>
            <table class="table table-bordered table-striped table-vcenter">
              <thead>
                <tr>
                 
                  <th style="width: 30%;">Nom Prénoms</th>
                  <th >Numéro </th>
                  <th style="width: 15%;">Salaire</th>
                  <th style="width: 15%;"> Mois/Année</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($allData as $key => $employee)
                <tr>
                  <td class="fw-semibold">
                   
                  </td>

                  <td>{{$employee->mobile}} </em></td>

                 <td>
                    <span class="badge bg-success"> </span>
                  </td>

                  <td>
                    <span> </span>
                  </td>
                 
                
                </tr>
                @endforeach
                
               
              </tbody>
            </table>
          </div>
    </div>
@endsection
