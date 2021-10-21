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
              <h2 class="content-heading">Employés Payé </h2>
            </div>
            <table class="table table-bordered table-striped table-vcenter">
              <thead>
                <tr>
                 
                  <th style="width: 30%;">Date</th>
                  <th style="width: 30%;">Actions</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($allData as $key => $paid_emp)
                <tr>
                  <td class="fw-semibold"> {{  date('m-Y', strtotime($paid_emp->date))  }}  </td>
                
                  <td>
                    <div class="btn-group">
                     
                      <a href=" {{ route('account.salary.detail', $paid_emp->date) }} " type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip"
                          title="Detail">
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
