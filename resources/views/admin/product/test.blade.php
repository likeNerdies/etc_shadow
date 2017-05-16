@extends('admin.index')
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('right-panel')



    @if($errors->has())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif


    <h2>Products</h2>

                    <form id="formProducts" name="formProducts" class="form-horizontal" action="/admin/products" method="post" novalidate="">
                        {{ csrf_field() }}

                        <div class="form-group">
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
                            <label for="ingredient_list">Tags:</label>
                            <select id="ingredient_list" name="ingredients[]" class="form-control" multiple>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category_list">Tags:</label>
                            <select id="category_list" name="categories[]" class="form-control" multiple></select>
                        </div>

                        <div class="form-group">
                            <select class="custom-select" id="brand_id" name="brand_id">
                                <option value="1">brand</option>
                                <option value="1">brand</option>
                                <option value="1">brand</option>
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
                        <input type="submit" value="submit">
                        {{--END OPTION DATA--}}
                        {{--test--}}
                        {{--end test--}}
                    </form>
@endsection

@section('scripts')


@endsection
