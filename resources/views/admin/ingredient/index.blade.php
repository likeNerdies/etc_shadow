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


    <div class="row mt-2">
        <!-- Table-to-load-the-data Part -->
        <div class="col-12 col-md-11">
            <table class="table mt-4">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th class="media-480-delete">Info</th>
                    <th class="media-480-delete">Allergies</th>
                    <th>Images</th>
                    <th class="media-480-delete">Created at</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="ingredient-list" name="ingredient-list">
                @foreach ($ingredients as $ingredient)
                    <tr id="ingredient{{$ingredient->id}}">
                        <td id="id">{{$ingredient->id}}</td>
                        <td>{{$ingredient->name}}</td>
                        <td class="media-480-delete">{{$ingredient->info}}</td>
                        <td class="media-480-delete">
                            @if(count($ingredient->allergies)==0)

                            @else
                                @foreach($ingredient->allergies as $allergy)
                                    <p>{{$allergy->name}}</p>
                                @endforeach
                            @endif
                        </td>

                        @if($ingredient->image_path==null)
                            <td id="ingredient-img"></td>
                        @else
                            <td id="ingredient-img"><img class="img-thumbnail" src="{{$ingredient->getPublicImgUrl($ingredient->image_path)}}" width="48.2"></td>
                        @endif

                        <td class="media-480-delete">{{$ingredient->created_at}}</td>

                        <td>
                            <button class="btn btn-warning btn-xs btn-detail open-modal hidden-sm-down" value="{{$ingredient->id}}">Edit</button>
                            <button class="btn btn-warning hidden-md-up" value="{{$ingredient->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></button>

                            <button class="btn btn-danger btn-xs btn-delete delete-category hidden-sm-down" value="{{$ingredient->id}}">Delete</button>
                            <button class="btn btn-danger hidden-md-up" value="{{$ingredient->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table> <!-- End of Table-to-load-the-data Part -->
        </div>
</div>

    {{$ingredients->links()}}

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
                  <input type="text" class="form-control has-error" id="name" name="name" placeholder="Wheat flour" value="" onblur="validateName(this)">

                </div>
              </div>

              <div class="form-group">
                <label for="info" class="col-sm-3 control-label">Info</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="info" name="info" placeholder=" "value="" onblur="validateName(this)">
                </div>
              </div>

              <div class="form-group  col-xs-12">
                <label for="tag_list">Allergies</label>
                  <select id="tag_list" name="allergies[]" class="input-group input-group-lg form-group" multiple></select>
              </div>

              {{--test--}}
              {{--end test--}}

            </form>
            <form id="formImage" class="formImage"  class="form-horizontal" novalidate="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="image">Upload images</label>
                    <input type="file" class="image btn btn-info" id="image" name="image" >
                </div>
            </form>
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
@endsection
