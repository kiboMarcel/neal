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

@section('admin')

    <div class="content">
        <h2 class="content-heading">Ajouter Equipement</h2>
        <div class="row push">

            <div class="col-lg-10">
                <!-- Form Grid -->
                <form  method="post" action=" {{ route('equipement.store') }} " enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-4">
                            <label class="form-label" for="name">Nom </label>
                            <input type="text" class="form-control" id="name" required name="name"
                               >
                        </div>
                       
                        <div class="col-4">
                            <label class="form-label" for="unite">Unité</label>
                            <input type="integer" class="form-control" id="unite" required name="unite"
                               >
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="prix_unitaire">Prix Unitaire</label>
                            <input type="double" class="form-control" id="prix_unitaire" required name="prix_unitaire"
                               >
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="prix_total">Prix Total</label>
                            <input type="double" class="form-control" id="prix_total" required name="prix_total"
                               >
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="quantite">Quantité</label>
                            <input type="integer" class="form-control" id="quantite" required name="quantite"
                               >
                        </div>
                    </div>

                        <div class="col-4">
                            <label class="form-label" for="type">Type d'équipement</label>
                            <select class="js-select2 form-select" name="type" id="type" required name="type" style="width: 100%;" data-placeholder="Choose one..">
                              <option disabled  selected>Selectionez le type d'équipement</option>
                              <option>Récupérable</option>
                              <option>Non Récupérable</option>
                              
                            </select>
                        </div>
                     
                
                    <div class="mb-4 bt-position">
                      <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
                <!-- END Form Grid -->
            </div>
        </div>
        
    </div>
@endsection
