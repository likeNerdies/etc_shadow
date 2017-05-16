@extends('admin.index')
@section('title','products')
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('right-panel')


    <h2>Products</h2>


    <div class="error" role="alert"></div>

    <div class="d-flex justify-content-end mt-5">
      <div class="mr-auto"><button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Products</button></div>
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
                <th>Pice</th>
                <th>Expiration Date</th>
                <th>Weight</th>
                <th>Stock</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody id="product-list" name="product-list">
              @foreach ($products as $product)
                  <tr id="product{{$product->id}}">
                    <td id="id">{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                   {{-- <td>{{$product->description}}</td>--}}
                    <td>{{$product->expiration_date}}</td>
                    {{-----------------------
                      @if($product->dimension==null)
                          <td></td>
                      @else
                          <td>{{$product->dimension}}</td>
                      @endif
                       ----}}
                      {{------------------------}}
                      @if($product->weight==null)
                          <td id="$product-img"></td>
                      @else
                          <td>{{$product->weight}}</td>
                      @endif

                      {{-------------
                      @if($product->real_weight==null)
                          <td id="$product-img"></td>
                      @else
                          <td>{{$product->real_weight}}</td>
                      @endif
                        --------------}}
                      {{----------------
                      @if($product->stock==null)
                          <td id="$product-img"></td>
                      @else----------default 0 stock--}}
                          <td>{{$product->stock}}</td>
                    {{--  @endif --}}
                      {{-----------------------------}}

                    <td>
                      @if(count($product->categories)==0)

                      @else
                        @foreach($product->cateogries as $cateogry)
                          <p>{{$cateogry->name}}</p>
                        @endforeach
                      @endif
                    </td>


                  {{--    @if($ingredient->image_path==null)
                          <td id="ingredient-img"></td>
                      @else
                          <td id="ingredient-img"><img src="{{$ingredient->getPublicImgUrl($ingredient->image_path)}}" width="165" height="110"></td>
                      @endif
                      --}}
                    <td>
                      <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$product->id}}">Edit</button>
                      <button class="btn btn-danger btn-xs btn-delete delete-product" value="{{$product->id}}">Delete</button>
                    </td>
                  </tr>
              @endforeach
            </tbody>
        </table> <!-- End of Table-to-load-the-data Part -->

    {{$products->links()}}

    <!-- Modal (Pop up when detail button clicked) -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">Product Editor</h4>
        </div>

        <div id="ajaxerror"></div>

          <div class="modal-body">
            <form id="formProducts" name="formProducts" class="form-horizontal" novalidate="">
              {{ csrf_field() }}
              <div class="form-group error">
                <label for="name" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control has-error" id="name" name="name"
                  placeholder="Category name" value="">
                </div>
              </div>

              <div class="form-group">
                <label for="price" class="col-sm-3 control-label">Price</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="price" name="price" placeholder="price example: 31.95" value="">
                </div>
              </div>

                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" rows="5" id="description" name="description" placeholder="description of the product"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="expiration_date" class="col-sm-3 control-label">Expiration Date</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="expiration_date" name="expiration_date" placeholder="date" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="weight" class="col-sm-3 control-label">Weight</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="weight" name="weight" placeholder="weight of kg/l the product example : 2.65" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="stock" class="col-sm-3 control-label">Stock</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="stock" name="stock" placeholder="stock units" value="">
                    </div>
                </div>


                <div class="form-group">
                    <label for="ingredient_list">Allergies</label>
                    <select id="ingredient_list" name="ingredients[]" class="form-control" multiple></select>
                </div>

                <div class="form-group">
                    <label for="category_list">Allergies</label>
                    <select id="category_list" name="categories[]" class="form-control" multiple></select>
                </div>

                <div class="form-group">
                    <select class="custom-select" id="brand_id" name="brand_id">

                    </select>
                </div>



            {{--OPTIONAL DATA--}}

                <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseformoptionaldata" aria-expanded="false" aria-controls="collapseformoptionaldata">Click me to add option data</button>

                <div class="collapse" id="collapseformoptionaldata">
                    <div class="card card-block">

                        <div class="form-group">
                            <label for="dimension" class="col-sm-3 control-label">Expiration Date</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="dimension" name="dimension" placeholder="dimension of the product" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="real_weight" class="col-sm-3 control-label">Real weight</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="real_weight" name="real_weight" placeholder="weight of the product example kg/l : 2.65" value="">
                            </div>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label" for="vegetarian">
                                <input class="form-check-input" type="checkbox" value="1" id="vegetarian" name="vegetarian">
                               Vegetarian
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="vegan">
                                <input class="form-check-input" type="checkbox" value="1" id="vegan" name="vegan">
                                Vegan
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="organic">
                                <input class="form-check-input" type="checkbox" value="1" id="organic" name="organic">
                                Organic
                            </label>
                        </div>



                    </div>
                </div>

                {{--END OPTION DATA--}}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="{{asset('/js/product/ajax-crud.js')}}"></script>
    <!--<script src="{{asset('/fonts/Pe-icon-7-stroke.woff')}}"></script>-->

@endsection
