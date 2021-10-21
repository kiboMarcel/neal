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

    .bt-position {
       margin-top: 1.7rem !important;
    }

</style>

@section('admin')

    <div class="content">
        <h2 class="content-heading">Mutation de service</h2>
        <div class="col-lg-6 col-md-6  col-6 alert alert-primary mb-5" role="alert">
            <span>Employé : <strong> {{ $details->name }}</strong> </span>
        </div>
        
        <div class="row ">

            <div class="col-lg-12">
                <!-- Form Grid -->
                <form method="post" action=" {{ route('employee.promotion.store', $details->id) }} " enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                     
                        <div class="col-4">
                            <label class="form-label" for="salary">Fonction</label>
                            <select class="js-select2 form-select" name="designation_id" id="example-select2"
                            required style="width: 100%;"
                            data-placeholder="Choose one..">
                            <option disabled selected>Selectionez la fonction</option>
                            @foreach ($designations as $designation)
                            <option value="{{$designation->id}}"
                                {{$designation->id == $details->designation_id ? 'selected': ''}} >
                                 {{ $designation->name }} </option>
                            @endforeach
                            

                        </select>
                        </div>

                       <div class="col-4">
                            <label class="form-label" for="name">Fonction</label>
                            <input type="text" name="salary" value=" {{ $details->salary}} " class="form-control" >
                        </div> 

                       <div class="col-4 bt-position">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div> 

                      
                       
                    </div>

                 
                </form>
                <!-- END Form Grid -->
            </div>
        </div>

    </div>
@endsection
