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
        <h2 class="content-heading">Modifier fonctions</h2>
        <div class="row push">

            <div class="col-lg-10">
                <!-- Form Grid -->
                <form method="post" action=" {{ route('category.product.update', $category->id) }} " enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                       
                        <div class="col-3">
                          
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="name">Fonction</label>
                            <input type="text" value="{{ $category->name }}" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="col-3">
                        
                        </div>

                    </div>

                    <div class="mb-4 bt-position">
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
                <!-- END Form Grid -->
            </div>
        </div>

    </div>


@endsection
