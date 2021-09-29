@extends('admin.admin_master')


<style>
    
    .row{
        justify-content: center;
    }

  .bt-position {
      display: flex;
      justify-content: flex-end;
  }

</style>

@section('admin')

    <div class="content">
        <h2 class="content-heading">Mon profile</h2>
        <div class="row push">

            <div class="col-lg-10">
                <!-- Form Grid -->
                <form action="be_forms_layouts.html" method="POST" onsubmit="return false;">
                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="form-label" for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="name"
                               value=" {{$user->name}} " placeholder="Nom">
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                            value=" {{$user->email}} " placeholder="Email">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="form-label" for="name">Adresse</label>
                            <input type="text" class="form-control" id="name" name="name"
                            value=" {{$user->address}} " placeholder="Nom">
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="gender">Genre</label>
                            <select class="js-select2 form-select" name="gender" id="example-select2" name="example-select2" style="width: 100%;" data-placeholder="Choose one..">
                              <option disabled >Selectionez le sexe</option>
                              <option value="Masculin" 
                              {{ $user->gender == 'Masculin' ? 'selected' : '' }}>
                              Masculin</option>
                              <option value="Feminin"
                              {{ $user->gender == 'Feminin' ? 'selected' : '' }}>Feminin</option>
                     <label class="form-label" for="email">Numéro</label>
                                     
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-2">
                          
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" id="number" name="number"
                                placeholder="Numéro" value=" {{$user->address}} ">
                        </div>
                        <div class="col-2">
                          
                        </div>
                    </div>
                    <div class="mb-4 bt-position">
                      <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <!-- END Form Grid -->
            </div>
        </div>
    </div>
@endsection
