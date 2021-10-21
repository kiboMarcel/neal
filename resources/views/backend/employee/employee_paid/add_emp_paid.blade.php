@extends('admin.admin_master')


<script src=" {{ asset('js/jquery-3.6.0.js') }}"></script>


<script src=" {{ asset('js/handlebars-v4.7.7.js') }}"></script>

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

  #loaderDiv{
        display: flex;
        flex-direction:column;
    }

    .save{
        float: right;
    }


</style>

@section('admin')

    <div class="content">
        <h2 class="content-heading">Ajouter Employé Payé</h2>
       
        <div class="row push">
            <div class="col-lg-10">
              
                    <div class="row mb-4">
                        <div class="col-4">
                            <input type="date" name="date" id="date" class="form-control" required 
                               >
                        </div>
                        <div class="col-4">
                            
                        </div>
                        <div class="col-4">
                            <div class="mb-4 bt-position">
                                <a  id="search" name="search" class="btn btn-primary">Chercher</a>
                              </div>
                        </div>
                    </div>
            </div>
        </div>
        <hr>
        <div class="row push">
            <div class="col-lg-10">
              
                <div class="row">
                    <div class="col-12 col-md-12">
                    {{-- SPINNER LOAD START --}} 
                        <div id="loaderDiv" class="  justify-content-between mx-5 mt-3 mb-5">
                            <div class="spinner-grow text-warning align-self-center"></div>
                        </div>
                    {{-- SPINNER LOAD END --}} 
                        <div id="DocumentResults">
                            <script id="document-template" type="text/x-handlebars-template">
                                <form action=" {{ route('account.salary.store') }} " method="POST">
                                    @csrf
                                    <table class="table table-bordered  table-hover">
                                        @{{{ h5source }}}
                                        <thead> 
                                            <tr>
                                                @{{{ thsource }}}
                                            </tr>
                                        </thead>
    
                                        <tbody>
                                            @{{#each this}}
                                            <tr class="tr_style">
                                                @{{{tdsource}}}
                                            </tr>
                                            @{{/each}}
                                        </tbody>
                                    </table>
                                    
                                    <input type="submit" class="btn btn-outline-info save mb-2 " 
                                    value="Enregistrer" id="">
                 
                                </form>
                            </script>
                        </div>
                    </div>
                  
                </div>
                
            </div>
        </div>

        
    </div>


    <script>
        $("#loaderDiv").hide();
    </script>

   <script>
          $(document).on('click', '#search', function() {
            var date = $('#date').val();
            feetch(date);
        });

        function feetch(date){
            $.ajax({
                url: "{{ route('account.salary.getemployee') }}",
                type: "get",
                data: {'date':date,},
                beforeSend: function() {  
                    $("#loaderDiv").show();     
                }, 
                complete: function() {
                    $("#loaderDiv").hide();
                 },
                success: function (data) {
                    console.log(data);
                    render(data);
                }

            });
        } 
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        

        function render(data){
            var html = template(data);
            $('#DocumentResults').empty().html(html);
         //$('[data-toggle="tooltip"]').tooltip();
        }
    </script>
@endsection
