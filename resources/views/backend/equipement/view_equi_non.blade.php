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
                <h2 class="content-heading">Equipement Non Récupérable ( {{ $count }} )</h2>
                <a href="  " class="btn btn-hero btn-info me-1 mb-3" data-bs-toggle="modal"
                data-bs-target="#modal-block-popin">Ajouter</a>
            </div>
            <table class="table table-striped table-vcenter">
                <thead>
                    <tr class="table-dark">

                        <th style="width: 30%;">Designations </th>
                        <th style="width: 15%;">Prix unitaire</th>
                        <th style="width: 15%;">Quantité</th>
                        <th style="width: 15%;">Prix Total</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($allData as $key => $equipement)
                        <tr>
                            <td class="fw-semibold">
                                {{ $equipement->nom }}
                            </td>

                            <td class="text-center">
                                <span class="text-muted">{{ number_format($equipement->prix_unitaire, 0, ',', ' ') }}  cfa</span>
                            </td>

                          <td>
                                <span class="text-muted"> {{ ($equipement->quantite) }}
                                </span>
                            </td>

                            <td>
                                <span class="badge bg-success">{{ number_format(($equipement->quantite * $equipement->prix_unitaire), 0, ',', ' ') 
                                 }} cfa </span>
                            </td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <a href=" {{ route('equipement.edit', $equipement->id) }} " type="button"
                                        class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Modifier">
                                        <i class="far fa-2x fa-edit"></i>
                                    </a>
                                    <a type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip"
                                        title="Detail">
                                        <i class="far fa-2x fa-file-pdf"></i>
                                    </a>
                                    <a type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip"
                                        title="Supprimer">
                                        <i class="fa fa-2x fa-biohazard"  color="red"></i>
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
                         <h3 class="block-title">Ajout Equipement Récupérable</h3>
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
                                 <form method="post" action=" {{ route('equipement.store') }} "
                                     enctype="multipart/form-data">
                                     @csrf
                                     <div class="row mb-4">
                                         <div class="col-6">
                                             <label class="form-label" for="nom">Désignation </label>
                                             <input type="text" class="form-control" id="nom" required name="nom">
                                         </div>

                                         <div class="col-6">
                                             <label class="form-label" for="unite">Unité</label>
                                             <input type="text" class="form-control" id="unite" required
                                                 name="unite">
                                         </div>
                                        

                                     </div>
                                     <div class="row mb-4">
                                         <div class="col-6">
                                             <label class="form-label" for="prix_unitaire">Prix Unitaire</label>
                                             <input type="number" class="form-control" id="prix_unitaire" required
                                                 name="prix_unitaire">
                                         </div>

                                         <div class="col-6">
                                             <label class="form-label" for="quantite">Quantité</label>
                                             <input type="number" class="form-control" id="quantite" required
                                                 name="quantite">
                                         </div>

                                       

                                     </div>

                                     {{-- <div class="mb-4 bt-position">
                                         <button type="submit" class="btn btn-primary">Enregistrer</button>
                                     </div> --}}
                                     <div class="block-content block-content-full text-end bg-body">
                                         <button type="button" class="btn btn-sm btn-alt-secondary"
                                             data-bs-dismiss="modal">Annuller</button>

                                         <button type="submit" name="save" value="non recuperable" class="btn btn-primary">Enregistrer</button>

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
