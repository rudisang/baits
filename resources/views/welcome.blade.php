@extends('layouts.main')

@section('content')
<section>


    <div class="row">
        <div class="container">
        <div class="col col-sm-12" style="margin-top:100px" >
        <img src="{{asset('images/svg-search.gif')}}" width=200 style="display:block;margin:auto" alt="">
            <h1 class="text-center" style="font-weight:bold;font-style:oblique;color:#11C1EC">Brand Search</h1>
            <div class="form-group">
                <input type="text" name="search" id="search" class="form-control">
            </div>
        </div>
        </div>
    </div>

    <div class="container">
  
            <div id="results" class="text-center">


            </div>
        
    </div>
</section>
@endsection

@section('scripts')
    <script type="application/javascript">
      $(document).ready(function(){
   
          $('#search').on('keyup', function(){
            var htmlOutput = '';
              var text = $('#search').val();
              var loading = '<div class="text-center mt-4" style="display:block;margin:auto">'+
                                '<div class="spinner-grow text-dark" role="status">'+
                                    '<span class="sr-only">Loading...</span>'+
                                '</div>'+
                                '<div class="spinner-grow text-dark ml-2" role="status">'+
                                    '<span class="sr-only">Loading...</span>'+
                                '</div>'+
                                '<div class="spinner-grow text-dark ml-2" role="status">'+
                                    '<span class="sr-only">Loading...</span>'+
                                '</div>'+
                                '<div class="spinner-grow text-dark ml-2" role="status">'+
                                    '<span class="sr-only">Loading...</span>'+
                                '</div>'+
                                '<div class="spinner-grow text-dark ml-2" role="status">'+
                                    '<span class="sr-only">Loading...</span>'+
                                '</div>'+
                            '</div>'
                   $( '#results' ).html( loading );

              $.ajax({
  
                  type:"GET",
                  url: '/search',
                  data: {text: $('#search').val()},
                  success: function(data) {
                
                      htmlOutput += '<div class="card shadow p-3 mb-5 bg-white rounded hoverable" style="border:none;border-radius:25px !important">'+
                      '<div class="card-body">'+
                          '<div class="media">'+
                             
                              '<div class="media-body">'+
                                '<h3 class="mt-0">'+data.name+" "+data.surname+'</h3>'+
                                '<span>'+data.email+'</span> <br>'+
                                '<span>'+data.mobile+'</span> <br>'+
                              '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
                
                    $( '#results' ).html( htmlOutput );
                   },
                   error: function(){
                    htmlOutput += '<div class="card shadow p-3 mb-5 bg-white rounded hoverable" style="border:none;border-radius:25px !important">'+
                      '<div class="card-body">'+
                          '<div class="media">'+
                             
                              '<div class="media-body">'+
                                '<h5 class="mt-0">No Match</h5>'+
                              '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
                
                    $( '#results' ).html( htmlOutput );
                   }
  
  
  
              });
  
  
          });
  
      });
      </script>
@endsection