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
                <h3>Employés ( {{$count}} ) </h3>
                <a href=" {{ route('employee.add') }} " class="btn btn-primary button mb-2">Ajouter</a>
            </div>
            <table class="table table-bordered table-striped table-vcenter">
              <thead>
                <tr>
                 
                  <th style="width: 30%;">Nom Prénoms</th>
                  <th >Numéro </th>
                  <th style="width: 15%;">Salaire</th>
                  <th style="width: 15%;">Début Service</th>
                  <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($allData as $key => $employee)
                <tr>
                  <td class="fw-semibold">
                    {{$employee->name}}
                  </td>

                  <td>{{$employee->mobile}} </em></td>

                 <td>
                    <span class="badge bg-success"> {{ number_format($employee->salary, 0, ',', ' ') }} cfa </span>
                  </td>

                  <td>
                    <span>{{ date('d-m-Y', strtotime($employee->join_date)) }} </span>
                  </td>
                 
                  <td class="text-center">
                    <div class="btn-group">
                      <a href=" {{ route('employee.edit', $employee->id) }} "
                        type="button" class="btn btn-sm btn-alt-secondary" 
                      data-bs-toggle="tooltip" title="Edit">
                        <i class="far fa-2x fa-edit"></i>
                      </a>
                      <a type="button" class="btn btn-sm btn-alt-secondary" 
                      data-bs-toggle="tooltip" title="Delete">
                        <i class="far fa-2x fa-file-pdf"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
                
               
              </tbody>
            </table>
          </div>
    </div>
@endsection
