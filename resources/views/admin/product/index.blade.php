@extends('admin.layouts.app')

@section('title','products')

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('right-panel')

    <h2 class="text-left mt-4">Products</h2>

    <div class="error" role="alert"></div>

    <div class="row mt-4">
        <div class="col-md-6 col-12 mt-4">
            <input type="text" id="search" class="form-control" placeholder="Search by ID or name">
        </div>

        <div id="add" class="col-md-6 col-12 mt-4">
            <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Product</button>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12 col-md-11">
            <!-- Table-to-load-the-data Part -->
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
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
        </div>
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
              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control has-error" id="name" name="name" placeholder="Cashew drink" value="" onblur="validateName(this)">
                </div>
              </div>

              <div class="form-group">
                <label for="price" class="col-sm-3 control-label">Price</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="price" name="price" placeholder="price example: 31.95" value="" onblur="validatePrice(this)">
                </div>
              </div>

                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" rows="5" cols="38" id="description" name="description" placeholder="description of the product" onblur="validateName(this)"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="expiration_date" class="col-sm-3 control-label">Expiration Date</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="expiration_date" name="expiration_date" placeholder="09/02/2018"  value="" onblur="validateExpDate(this)">
                    </div>
                </div>

                <div class="form-group">
                    <label for="weight" class="col-sm-3 control-label">Weight</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="weight" name="weight" placeholder="weight of kg/l the product example : 2.65" value="" onblur="validateWeight(this)">
                    </div>
                </div>

                <div class="form-group">
                    <label for="stock" class="col-sm-3 control-label">Stock</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="stock" name="stock" placeholder="13" value="" onblur="validateStock(this)">
                    </div>
                </div>

                <div class="form-group">
                    <label for="ingredient_list">Ingredients</label>
                    <select id="ingredient_list" name="ingredients[]" class="form-control" multiple></select>
                </div>

                <div class="form-group">
                    <label for="category_list">Categories</label>
                    <select id="category_list" name="categories[]" class="form-control" multiple></select>
                </div>

                <div class="form-group">
                    <select class="custom-select" id="brand_id" name="brand_id">
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach

                    </select>
                </div>

            {{--OPTIONAL DATA--}}

                <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseformoptionaldata" aria-expanded="false" aria-controls="collapseformoptionaldata">Click me to add option data</button>

                <div class="collapse" id="collapseformoptionaldata">
                    <div class="card card-block">

                        <div class="form-group">
                            <label for="dimension" class="col-sm-3 control-label">Dimension</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="dimension" name="dimension" placeholder="" value=""><!-- afegir exemple -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="real_weight" class="col-sm-3 control-label">Real weight</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="real_weight" name="real_weight" placeholder="weight of the product example kg/l : 2.65" value="" onblur="validateWeight(this)">
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
                      <input type="file" class="image btn btn-info" id="image" name="image[]" multiple >
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
    <script src="{{asset('/js/admin/product/ajax-crud.js')}}"></script>
    <!--<script src="{{asset('/fonts/Pe-icon-7-stroke.woff')}}"></script>-->

@endsection
