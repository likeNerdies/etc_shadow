@extends('admin.layouts.app')

@section('title','products')

@section('styles')
    <link href="{{asset('/css/admin/libraries/select2/css/select2.min.css')}}" rel="stylesheet"/>
@endsection

@section('right-panel')
    <div class="wrapper-content">
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
                            <th>Images</th>
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
                                @if(count($product->images) == 0)
                                    <td id="product-img"></td>
                               @else
                                    <td id="product-img"><img class="img-thumbnail" src="/admin/products/{{$product->images->first()->id}}/image" width="48.2" height="48.2"></td>
                                @endif
                                <td>
                                    <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$product->id}}"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up" aria-hidden="true"></i></button>
                                    <button class="btn btn-danger btn-xs btn-delete delete-product" value="{{$product->id}}"><span class="hidden-sm-down">Delete</span><i class="fa fa-trash hidden-md-up" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> <!-- End of Table-to-load-the-data Part -->
            </div>
        </div>
    </div>
    {{$products->links()}}

    <!-- Modal (Pop up when detail button clicked) -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">Product Editor</h4>
        </div>
        <div id="ajaxerror"></div>
          <div class="modal-body">
              <div class="display-center">
                  <form id="formProducts" name="formProducts" class="form-horizontal" novalidate="">
                      {{ csrf_field() }}

                      <div class="d-flex flex-md-row display-767-column">
                          <div class="group-input">
                              <label for="name" class="col-form-label">Name</label>
                              <input type="text" class="form-control col-md-11 col-12 has-error" id="name" name="name" placeholder="Cashew drink" value="" required onblur="validateName(this)" />
                          </div>

                          <div class="group-input">
                              <label for="price" class="col-form-label">Price</label>
                              <input type="text" class="form-control col-md-11 col-12" id="price" name="price" placeholder="5.95" value="" required onblur="validatePrice(this)" />
                          </div>

                      </div>

                      <div class="d-flex flex-md-row display-767-column mt-2">
                          <div class="group-input">
                              <label for="description" class="col-form-label">Description</label>
                              <textarea class="form-control col-md-11 col-12" rows="5" cols="38" id="description" name="description" placeholder="Description of the product" required onblur="validateName(this)"></textarea>
                          </div>

                          <div class="group-input">
                              <label for="expiration_date" class="col-form-label">Expiration Date</label>
                              <input type="date" class="form-control col-md-11 col-12" id="expiration_date" name="expiration_date" placeholder="09/02/2018"  value="" required onblur="validateExpDate(this)" />
                          </div>
                      </div>

                      <div class="d-flex flex-md-row display-767-column mt-2">
                          <div class="group-input">
                              <label for="weight" class="col-form-label">Weight (in grams)</label>
                              <input type="text" class="form-control col-md-11 col-12" id="weight" name="weight" placeholder="1200" value="" required onblur="validateWeight(this)" />
                          </div>

                          <div class="group-input">
                              <label for="stock" class="col-form-label">Stock</label>
                              <input type="number" class="form-control col-md-11 col-12" id="stock" name="stock" placeholder="13" value="" required=" "onblur="validateStock(this)" />
                          </div>
                      </div>

                      <div class="d-flex flex-md-row display-767-column mt-2">
                          <div id="ing-parent" class="group-input">
                              <label for="ingredient_list" class="col-form-label">Ingredients</label>
                              <select style="width: 91.6%" id="ingredient_list" name="ingredients[]" class="form-control" multiple></select>
                          </div>

                          <div id="cat-parent" class="group-input">
                              <label for="category_list" class="col-form-label">Categories</label>
                              <select style="width: 91.6%" id="category_list" name="categories[]" class="form-control" multiple></select>
                          </div>
                      </div>

                      <div class="d-flex flex-md-row display-767-column mt-2">
                          <div class="group-input" id="brand-container">
                              <label style="display: block" for="brand_id" class="col-form-label">Brand</label>
                              <select style="width:46%; position:relative;" class="custom-select form-control" id="brand_id" name="brand_id">
                                  @foreach($brands as $brand)
                                      <option value="{{$brand->id}}">{{$brand->name}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>

                      {{--OPTIONAL DATA--}}

                      <div class="d-flex justify-content-center mt-4">
                          <button id="test" class="btn btn-red" type="button" data-toggle="collapse" data-target="#collapseformoptionaldata" aria-expanded="false" aria-controls="collapseformoptionaldata">Click me to add option data</button>
                      </div>


                      <div class="collapse mt-1" id="collapseformoptionaldata">
                          <div class="card card-block">

                              <div class="d-flex flex-md-row display-767-column mt-2">
                                  <div class="group-input">
                                      <label for="dimension" class="col-form-label">Dimension (L x W x H) in cm</label>
                                      <input type="text" class="form-control col-md-11 col-12" id="dimension" name="dimension" placeholder="10x5.80x25" value="" onblur="validateDimensions(this)"><!-- afegir exemple -->
                                  </div>
                                  <div class="group-input">
                                      <label for="real_weight" class="col-form-label">Real weight (in grams)</label>
                                      <input type="text" class="form-control col-md-11 col-12" id="real_weight" name="real_weight" placeholder="1300" value="" onblur="validateWeight(this)" />
                                  </div>
                              </div>
                              <div class="d-flex flex-row mt-4 justify-content-center">
                                  <div class="form-check ml-md-4 ml-1">
                                      <label class="form-check-label" for="vegetarian">
                                          <input class="form-check-input" type="checkbox" value="1" id="vegetarian" name="vegetarian" />
                                          Vegetarian
                                      </label>
                                  </div>

                                  <div class="form-check ml-md-4 ml-2">
                                      <label class="form-check-label" for="vegan">
                                          <input class="form-check-input" type="checkbox" value="1" id="vegan" name="vegan" />
                                          Vegan
                                      </label>
                                  </div>
                                  <div class="form-check ml-md-4 ml-2">
                                      <label class="form-check-label" for="organic">
                                          <input class="form-check-input" type="checkbox" value="1" id="organic" name="organic" />
                                          Organic
                                      </label>
                                  </div>
                              </div>

                          </div><!-- / card -->
                      </div> <!--collapse -->

                      {{--END OPTION DATA--}}
                      {{--test--}}
                      {{--end test--}}
                  </form>
                  <form id="formImage" class="formImage form-horizontal mt-4" novalidate="" enctype="multipart/form-data">
                      <div class="group-input">
                          <label for="image" class="col-form-label">Upload images</label>
                          <input type="file" class="form-control-file" id="image" name="image[]" multiple >
                      </div>
                  </form>
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
    <script src="{{asset('/js/admin/product/ajax-crud.js')}}"></script>
@endsection
