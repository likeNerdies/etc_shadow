@extends('admin.layouts.app')
@section('title','Ingredients')
@section('styles')
    <link href="{{asset('/css/admin/libraries/select2/css/select2.min.css')}}" rel="stylesheet"/>
@endsection
@section('right-panel')

<div class="wrapper-content">
    <h2 class="text-left mt-4">Ingredients</h2>


    <div class="error" role="alert"></div>

    <div class="row mt-4">
        <div class="col-md-6 col-12 mt-4">
            <input type="text" id="search" class="form-control" placeholder="Search by ID or name">
        </div>

        <div id="add" class="col-md-6 col-12 mt-4">
            <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Ingredient</button>
        </div>
    </div>

    <div class="progress">
        <div id="progress" class="progress-bar progress-bar-striped" role="progressbar" style="display: none" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

    <div class="row mt-2">
        <!-- Table-to-load-the-data Part -->
        <div class="col-12">
            <table class="table mt-4">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th class="media-480-delete">Info</th>
                    <th class="media-767-delete">Allergies</th>
                    <th>Images</th>
                    <th class="media-767-delete">Created at</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="ingredient-list" name="ingredient-list">
                @foreach ($ingredients as $ingredient)
                    <tr id="ingredient{{$ingredient->id}}">
                        <td id="id">{{$ingredient->id}}</td>
                        <td>{{$ingredient->name}}</td>
                        <td class="media-480-delete">{{$ingredient->info}}</td>
                        <td class="media-767-delete">
                            @if(count($ingredient->allergies)==0)

                            @else
                                @foreach($ingredient->allergies as $allergy)
                                    <p>{{$allergy->name}}</p>
                                @endforeach
                            @endif
                        </td>

                        @if($ingredient->image==null)
                            <td id="ingredient-img"></td>
                        @else
                            <td id="ingredient-img"><img id="myImg_{{$ingredient->id}}" class="img-thumbnail modal-toggle"  width='48.2' height='48.2' src="/admin/ingredients/{{ $ingredient->id }}/image"></td>
                        @endif

                        <td class="media-767-delete">{{$ingredient->created_at}}</td>

                        <td>
                            <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$ingredient->id}}"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up" aria-hidden="true"></i></button>
                            <button class="btn btn-danger btn-xs btn-delete delete-ingredient" value="{{$ingredient->id}}"><span class="hidden-sm-down">Delete</span><i class="fa fa-trash hidden-md-up" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table> <!-- End of Table-to-load-the-data Part -->
        </div>
</div>

    <nav id="pagquit_search" class="mt-5">
        {{$ingredients->links()}}
    </nav>




    <!-- Modal Image -->
    <div id="myModalImage" class="modalimage">

        <!-- The Close Button -->
        <span class="close">&times;</span>

        <!-- Modal Content (The Image) -->
        <img class="modal-content img-fluid" id="img01">

    </div>
    <!-- /Modal Image -->

    <!-- Modal (Pop up when detail button clicked) -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">Ingredient Editor</h4>
        </div>

        <div id="ajaxerror"></div>

          <div class="modal-body">
            <form id="formIngredients" name="formIngredients" class="form-horizontal" novalidate="">
              {{ csrf_field() }}
              <div class="form-group error">
                <label for="name" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control has-error" id="name" name="name" placeholder=" ingredient name"  required />

                </div>
              </div>

              <div class="form-group">
                <label for="info" class="col-sm-3 control-label">Info</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="info" name="info" placeholder=" some information.." />
                </div>
              </div>

              <div class="form-group  col-xs-12">
                <label for="tag_list">Allergies</label>
                  <select id="tag_list" name="allergies[]" class="input-group input-group-lg form-group" multiple></select>
              </div>

              <script>
                  function preview_image() {
                      var fileUpload = document.getElementById("image");
                      if (typeof (FileReader) != "undefined") {
                          var dvPreview = document.getElementById("dvPreview");
                          dvPreview.innerHTML = "";
                          var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                          for (var i = 0; i < fileUpload.files.length; i++) {
                              var file = fileUpload.files[i];
                              if (regex.test(file.name.toLowerCase())) {
                                  var reader = new FileReader();
                                  reader.onload = function (e) {
                                      var img = document.createElement("IMG");
                                      img.height = "100";
                                      img.width = "100";
                                      img.src = e.target.result;
                                      dvPreview.appendChild(img);
                                  };
                                  reader.readAsDataURL(file);
                              }
                          }
                      }
                  }
              </script>

            </form>
            <form id="formImage" class="formImage"  class="form-horizontal" novalidate="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="image">Upload images</label>
                    <input type="file" class="image btn btn-info" id="image" name="image" onchange="preview_image()">
                </div>
            </form>
              <div id="dvPreview">
              </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
            <input type="hidden" id="category_id" name="category_id" value="0">
          </div>

        </div><!-- / modal content -->
      </div>
    </div><!-- / modal -->
  </div>
@endsection

@section('scripts')
    <script src="{{asset('/js/libraries/select2/js/select2.js')}}"></script>
    <script src="{{asset('/js/admin/ingredient/ajax-crud.js')}}"></script>
    <script src="{{asset('/js/admin/ingredient/modal_gallery.js')}}"></script>
@endsection
