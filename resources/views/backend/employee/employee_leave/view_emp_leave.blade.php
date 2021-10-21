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
                <h2 class="content-heading">Rupture de contrat</h2>
                <a href=" {{ route('leave.add') }} " class="btn btn-hero btn-info me-1 mb-3">Ajouter</a>
            </div>
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>

                        <th style="width: 30%;">Nom Prénoms</th>
                        <th>Numéro</th>
                        <th>Raison</th>
                        <th style="width: 15%;">Début Service</th>
                        <th style="width: 15%;">Fin de Service</th>
                        <th colspan="2" style="width: 15%;">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($allData as $key => $leave)
                        <tr>
                            <td class="fw-semibold">
                                {{ $leave['employee']->name }}
                            </td>

                            <td>{{ $leave['employee']->mobile }} </em></td>

                            <td>{{ $leave['purpose']->name }}
                            </td>

                            <td>
                                <span>{{ date('d-m-Y', strtotime($leave['employee']->join_date)) }} </span>
                            </td>

                            <td>
                                <span>{{ date('d-m-Y', strtotime($leave->end_date)) }} </span>
                            </td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <a href=" " data-bs-toggle="modal" data-bs-target="#modal-block-popin" type="button"
                                        class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Supprimer">
                                        <i class="fa fa-2x fa-trash"></i>
                                    </a>

                                </div>
                            </td>
                        </tr>

                        <!-- Pop In Block Modal -->
                        <div class="modal fade" id="modal-block-popin" tabindex="-1" role="dialog"
                            aria-labelledby="modal-block-popin" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-popin" role="document">
                                <div class="modal-content">
                                    <div class="block block-rounded block-themed block-transparent mb-0">
                                        <div class="block-header bg-primary-dark">
                                            <h3 class="block-title">Ete Vous sur</h3>
                                            <div class="block-options">
                                                <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="block-content">
                                            <p>Etes Vous Sur ?</p>
                                        </div>
                                        <div class="block-content block-content-full text-end bg-body">
                                            <button type="button" class="btn btn-sm btn-alt-secondary"
                                                data-bs-dismiss="modal">Annuler</button>
                                            <a type="button" href="{{ route('employee.leave.delete', $leave->id) }}"
                                                class="btn btn-sm btn-primary">Oui</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Pop In Block Modal -->
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>

    
@endsection
