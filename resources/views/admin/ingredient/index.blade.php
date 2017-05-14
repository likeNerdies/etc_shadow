@extends('admin.index')
@section('title','ingredients')
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('right-panel')
    <h2>Ingredients</h2>

    <div class="error" role="alert"></div>

    <div class="d-flex justify-content-end mt-5">
      <div class="mr-auto"><button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Ingredients</button></div>
      <div class="col-md-6"><!--<i class="fa fa-search" aria-hidden="true"></i>-->
      <input type="text" id="search" class="form-control" placeholder="Search..."></div>
    </div>

    <div class="mt-5">
        <!-- Table-to-load-the-data Part -->
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Info</th>
                <th>Allergies</th>
                <th>Images</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody id="ingredient-list" name="ingredient-list">
              @foreach ($ingredients as $ingredient)
                  <tr id="ingredient{{$ingredient->id}}">
                    <td id="id">{{$ingredient->id}}</td>
                    <td>{{$ingredient->name}}</td>
                    <td>{{$ingredient->info}}</td>
                    <td>
                      @if(count($ingredient->allergies)==0)
                        This ingredient has no alergies
                      @else
                        @foreach($ingredient->allergies as $allergy)
                          <p>{{$allergy->name}}</p>
                        @endforeach
                      @endif
                    </td>
                    <td></td>
                    <td>{{$ingredient->created_at}}</td>
                    <td>
                      <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$ingredient->id}}">Edit</button>
                      <button class="btn btn-danger btn-xs btn-delete delete-ingredient" value="{{$ingredient->id}}">Delete</button>
                    </td>
                  </tr>
              @endforeach
            </tbody>
        </table> <!-- End of Table-to-load-the-data Part -->

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
                <label for="inputCategory" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control has-error" id="name" name="name"
                  placeholder="Category name" value="">
                </div>
              </div>

              <div class="form-group">
                <label for="info" class="col-sm-3 control-label">Info</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="info" name="info" placeholder="Info"
                  value="">
                </div>
              </div>

              <div class="form-group">
                <label for="tag_list">Allergies</label>
                <select id="tag_list" name="allergies[]" class="form-control" multiple></select>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="{{asset('/js/ingredient/ajax-crud.js')}}"></script>
    <!--<script src="{{asset('/fonts/Pe-icon-7-stroke.woff')}}"></script>-->
@endsection
