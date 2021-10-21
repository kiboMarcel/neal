@extends('admin.admin_master')


<script src=" {{ asset('js/jquery-3.6.0.js') }}"></script>

<style>
    .bt-position {
        display: flex;
        justify-content: flex-end;
    }

</style>

@section('admin')
    <div class="content">
        <h2 class="content-heading">Rupture de Contrat</h2>
        <div class="row push">

            <div class="col-lg-10">
                <!-- Form Grid -->
                <form method="post" action=" {{ route('employee.leave.store') }} " enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="form-label" for="name">Employé</label>
                            <select class="js-select2 form-select" name="employee_id" id="example-select2" required
                                style="width: 100%;">
                                <option disabled selected>Selectionez employé</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">
                                        {{ $employee->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="name">Raisons</label>
                            <select class="js-select2 form-select" name="leave_purpose_id" id="leave_purpose_id"
                                required style="width: 100%;">
                                <option  selected="" disabled="">Sélectionner raison</option>
                                @foreach ($leave_purpose as $purpose)
                                    <option value="{{ $purpose->id }}">{{ $purpose->name }}</option>
                                @endforeach
                                <option value="0">Autres raisons</option>
                            </select>
                            <input type="text"  id="add_other" name="name" class="form-control" 
                            placeholder="Ecrire raison" style="display: none">
                        </div>

                    </div>

                    <div class="row mb-4">
                      
                        <div class="col-2">
                            
                        </div>
                        <div class="col-8">
                            <label class="form-label" >Date de fin</label>
                            <input type="date" name="end_date" class="form-control" required >
                        </div>
                        <div class="col-2">
                          
                        </div>

                    </div>

                    <div class="mb-4 bt-position">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
                <!-- END Form Grid -->
            </div>
        </div>

    </div>


    <script text="text/javascript">
        $(document).ready(function() {
            $(document).on('change', '#leave_purpose_id', function() {
                var leave_purpose_id = $(this).val();
                if (leave_purpose_id == '0') {
                    $('#add_other').show();
                } else {
                    $('#add_other').hide();
                }
            })
        })
    </script>

@endsection
