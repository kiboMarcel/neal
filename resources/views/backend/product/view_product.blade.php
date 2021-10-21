@extends('admin.admin_master')

<script src=" {{ asset('js/jquery-3.6.0.js') }}"></script>

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
                <h2 class="content-heading">List des Produits</h2>
                
                <a href="  " class="btn btn-hero btn-info me-1 mb-3" data-bs-toggle="modal"
                    data-bs-target="#modal-block-popout">Ajouter</a>
            </div>

            <table class="table table-bordered table-striped table-vcenter" style="width: 85%;">
                <thead>
                    <tr>

                        <th >Nom</th>
                        <th >Unité</th>
                        <th >prix Unitaire</th>
                        <th >Quantité</th>
                        <th >Prix total</th>
                        <th colspan="3" class="text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($allData as $key => $product)
                        <tr>
                            <td class="fw-semibold">
                                {{ $product->name }}
                            </td>

                            <td class="fw-semibold">
                                {{ $product->unite }}
                            </td>

                            <td class="fw-semibold">
                                {{ number_format($product->prix_unitaire, 0, ',', ' ') }} cfa
                            </td>

                            <td class="fw-semibold">
                                {{ $product->quantite }}
                            </td>

                            <td class="fw-semibold">
                               {{ number_format(($product->prix_unitaire*$product->quantite), 0, ',', ' ') }} cfa
                            </td>


                            <td class="text-center">
                                <div class="btn-group">
                                    <a href=" {{ route('product.edit', $product->id) }} " type="button"
                                        class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                                        <i class="far fa-2x fa-edit"></i>
                                    </a>

                                </div>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href=" {{ route('product.edit', $product->id) }} " type="button"
                                        class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                                        <i class="far fa-2x fa-edit"></i>
                                    </a>

                                </div>
                            </td>

                            <td class="text-center">
                                <div class="btn-group">

                                    <a href="" data-id='{{ $product->id }}' data-bs-toggle="modal"
                                        data-bs-target="#modal-block-popin" type="button"
                                        class="btn btn-sm btn-alt-secondary delete" data-bs-toggle="tooltip" title="Supprimer">
                                        <i class="fa fa-2x fa-trash"></i>
                                    </a>
                                    </a>

                                </div>
                            </td>
                        </tr>


                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Delete Confirmation modal -->
        <div class="modal fade" id="modal-block-popin" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-popin" role="document">
                <div class="modal-content">
                    <form method="post" action=" {{ route('product.delete', 'id') }} ">
                        @csrf
                        @method('GET')
                        <div class="block block-rounded block-themed block-transparent mb-0">
                            <div class="block-header bg-primary-dark">
                                <input type="hidden" id="id" name="id">
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
                                <button type="submit" class="btn btn-sm btn-alt-secondary">Oui</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END Delete Confirmation modal -->


        <!-- Add Modal -->
        <div class="modal fade" id="modal-block-popout" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout"
            aria-hidden="true">
            <div class="modal-dialog  modal-lg modal-dialog-popin" role="document">
                <div class="modal-content">
                    <div class="block block-rounded block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Ajouter Categorie</h3>
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
                                    <form method="post" action=" {{ route('product.store') }} "
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-4">

                                            
                                            <div class="col-4">
                                                <label class="form-label" for="name">Désignation</label>
                                                <input type="text" id="name" name="name" class="form-control" required>
                                            </div>

                                            <div class="col-4">
                                                <label class="form-label">Unite</label>
                                                <input type="text" name="unit" class="form-control" required>
                                            </div>

                                            <div class="col-4">
                                                <label class="form-label" >Prix unitaire</label>
                                                <input type="number"  name="unit_price" class="form-control" required>
                                            </div>
                          
                                        </div>
                                        <div class="row mb-4">

                                            <div class="col-4" >
                                                <label class="form-label">Quantité</label>
                                                <input type="number"  name="quantity" class="form-control" required>
                                            </div>

                                            <div class="col-4">
                                                <label class="form-label" >Catégorie</label>
                                                <select class="js-select2 form-select" name="categoriy_id" id="categoriy_id"
                                                required  style="width: 100%;">
                                                <option value="" selected="" disabled="">Selectionez la catégorie</option>
                                                @foreach ($categories as $category)
                                                <option value="{{$category->id}}"> {{ $category->name }} </option>
                                                @endforeach
                                                
                                            </select>
                                            </div>

                                            <div class="col-4" id="casier">
                                                <label class="form-label" >Casier de:</label>
                                                <select class="js-select2 form-select" name="casier_id" id="casier_id"
                                                  style="width: 100%;">
                                                <option value="" selected="" disabled="">Selectionez la fonction</option>
                                                @foreach ($casiers as $casiers)
                                                <option value="{{$casiers->id}}"> {{ $casiers->name }} </option>
                                                @endforeach
                                                
                                            </select>
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
        <!-- END Add Modal -->



    </div>

    <script>
        $("#casier").hide();
   </script>

    <script text="text/javascript" >
        $(document).ready(function(){
            $(document).on('change', '#categoriy_id', function(){
                var leave_purpose_id = $(this).val();
                if(leave_purpose_id == '1'){
                    $('#casier').show();
                }else{
                    $('#casier').hide();
                }
            } )
        } )
        </script>
    

    <!--BEGIN SWEET ALERT DELETE CONFIRMATION SCRIPTS -->
    <script>
       $(document).on('click','.delete',function(){
         let id = $(this).attr('data-id');
         $('#id').val(id);
    });
    </script>
    <!-- END SWEET ALERT DELETE CONFIRMATION  SCRIPTS -->
@endsection
