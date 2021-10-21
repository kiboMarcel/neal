@extends('admin.admin_master')


<style>
    .head {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }


    .row {
        justify-content: center;
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

@section('admin')

    <div class="content">

        <div class="table-responsive">
            <div class="head">
                <h2 class="content-heading">Employés ( {{ $count }} )</h2>

                <a href=" "   class="btn btn-alt-primary me-1 mb-3  {{ $count==0? 'd-none': '' }} " 
                    title="Imprimer liste">
                    <i class="fa fa-fw fa-print"></i>
                </a>

                <a href="  " class="btn btn-hero btn-info me-1 mb-3" data-bs-toggle="modal"
                    data-bs-target="#modal-block-popin">Ajouter</a>
            </div>
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>

                        <th style="width: 30%;">Nom Prénoms</th>
                        <th>Numéro </th>
                        <th style="width: 15%;">Fonction</th>
                        <th style="width: 15%;">Salaire</th>
                        <th style="width: 15%;">Début Service</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($allData as $key => $employee)
                        <tr>
                            <td class="fw-semibold">
                                {{ $employee->name }}
                            </td>

                            <td>{{ $employee->mobile }} </em></td>

                            <td>{{ $employee['designation']->name }} </em></td>

                            <td>
                                <span class="badge bg-success"> {{ number_format($employee->salary, 0, ',', ' ') }} cfa
                                </span>
                            </td>

                            <td>
                                <span>{{ date('d-m-Y', strtotime($employee->join_date)) }} </span>
                            </td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <a href=" {{ route('employee.edit', $employee->id) }} " type="button"
                                        class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                                        <i class="far fa-2x fa-edit"></i>
                                    </a>
                                    <a href=" {{ route('employee.detail.pdf', $employee->id) }} " type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip"
                                        title="Detail">
                                        <i class="far fa-2x fa-file-pdf"></i>
                                    </a>
                                    <a href=" {{ route('employee.promotion', $employee->id) }} " type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip"
                                        title="Mutation de Fonction">
                                        <i class="fa fa-2x fa-circle-notch"  color="red"></i>
                                    </a>
                                 
                                </div>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>



        <!-- Pop In Block Modal -->
        <div class="modal fade" id="modal-block-popin" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin"
            aria-hidden="true">
            <div class="modal-dialog  modal-xl modal-dialog-popin" role="document">
                <div class="modal-content">
                    <div class="block block-rounded block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Ajouter Personel</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                <div class="col-lg-10">
                                    <!-- Form Grid -->
                                    <form method="post" action=" {{ route('employee.store') }} "
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-4">
                                            <div class="col-4">
                                                <label class="form-label" for="name">Nom Prénoms</label>
                                                <input type="text" class="form-control" id="name" required name="name">
                                            </div>
                                            <div class="col-4">
                                                <label class="form-label" for="mobile">Numéros</label>
                                                <input type="text" class="form-control" id="mobile" required
                                                    name="mobile">
                                            </div>
                                            <div class="col-4">
                                                <label class="form-label" for="email">Date de Naissance</label>
                                                <input type="date" class="form-control" required id="date_of_birth"
                                                    name="date_of_birth">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-4">
                                                <label class="form-label" for="place_of_birth">Lieu de naissance</label>
                                                <input type="text" class="form-control" id="place_of_birth" required
                                                    name="place_of_birth">
                                            </div>
                                            <div class="col-4">
                                                <label class="form-label" for="person_to_contact">Personne à
                                                    prévenir</label>
                                                <input type="text" class="form-control" id="person_to_contact" required
                                                    name="person_to_contact">
                                            </div>
                                            <div class="col-4">
                                                <label class="form-label" for="gender">Genre</label>
                                                <select class="js-select2 form-select" name="gender" id="example-select2"
                                                    required>
                                                    <option value="" selected="" disabled="">Selectionez le sexe</option>
                                                    <option value="Masculin">Masculin</option>
                                                    <option value="Feminin">Feminin</option>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="row mb-4">

                                            <div class="col-4">
                                                <label class="form-label" for="awareness1">Connaissance N1</label>
                                                <input type="text" class="form-control" required id="awareness1"
                                                    name="awareness1">
                                            </div>
                                            <div class="col-4">
                                                <label class="form-label" for="awareness2">Connaissance N2</label>
                                                <input type="text" class="form-control" required id="awareness2"
                                                    name="awareness2">
                                            </div>
                                            <div class="col-4">
                                                <label class="form-label" for="awareness3">Connaissance N3</label>
                                                <input type="text" class="form-control" required id="awareness3"
                                                    name="awareness3">
                                            </div>

                                        </div>
                                        <div class="row mb-4">

                                            <div class="col-4">
                                                <label class="form-label" for="join_date">Date début Service </label>
                                                <input type="date" class="form-control" required id="join_date"
                                                    name="join_date">
                                            </div>
                                            <div class="col-4">
                                                <label class="form-label" for="salary">Fonction</label>
                                                <select class="js-select2 form-select" name="designation_id" id="example-select2"
                                                    required  style="width: 100%;">
                                                    <option value="" selected="" disabled="">Selectionez la fonction</option>
                                                    @foreach ($designations as $designation)
                                                    <option value="{{$designation->id}}"> {{ $designation->name }} </option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <label class="form-label" for="salary">Salaire</label>
                                                <input type="number" class="form-control" required id="salary"
                                                    name="salary">
                                            </div>
                                           

                                        </div>


                                        {{-- <div class="mb-4 bt-position">
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </div> --}}
                                        <div class="block-content block-content-full text-end bg-body">
                                            <button type="button" class="btn btn-sm btn-alt-secondary"
                                                data-bs-dismiss="modal">Annuller</button>

                                              <button type="submit" class="btn btn-primary">Enregistrer</button>

                                        </div>
                                    </form>
                                    <!-- END Form Grid -->
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- END Pop In Block Modal -->
    </div>
@endsection
