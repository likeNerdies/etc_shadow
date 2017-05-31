
<div id="side-block">
    <form action="" name="filter_form" id="filter_form">
        <div class="filter-block">
            <div id="title-categories" class="filter-title filter-title-toggled">
                <span class="text-left pull-left">Categories</span>
                <i id="tog-1" class="fa fa-plus pull-right rotate-45-initial"></i>
            </div>
            <div id="categories" class="filter-content open-filter">
                <div id="content-categories" class="d-flex flex-column">

                    @if(isset($categories[0]))
                        <div class="my-form-check pt-2">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="categories[]" class="categories"
                                       value="{{$categories[0]->id}}">
                                {{$categories[0]->name}}
                            </label>
                        </div>
                    @endif

                    @if(isset($categories[1]))
                        <div class="my-form-check pt-2">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="categories[]" class="categories"
                                       value="{{$categories[1]->id}}">
                                {{$categories[1]->name}}
                            </label>
                        </div>
                    @endif

                    @if(isset($categories[2]))
                        <div class="my-form-check pt-2">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="categories[]" class="categories"
                                       value="{{$categories[2]->id}}">
                                {{$categories[2]->name}}
                            </label>
                        </div>
                    @endif

                    @if(isset($categories[3]))
                        <div class="my-form-check pt-2">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="categories[]"  class="categories"
                                       value="{{$categories[3]->id}}">
                                {{$categories[3]->name}}
                            </label>
                        </div>
                    @endif

                    @if(count($categories)>=5)
                        <span class="tog-more pt-3"><i class="fa fa-plus ml-2rem toggle"
                                                       aria-hidden="true"></i>See More</span>
                        <div id="sm-categories">
                            @for($i=4;$i<count($categories);$i++)
                                <div class="my-form-check pt-2">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="categories[]" value="{{$categories[$i]->id}}" class="categories">
                                        {{$categories[$i]->name}}
                                    </label>
                                </div>
                            @endfor
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="filter-block mt-2">
            <div id="title-brands" class="filter-title filter-title-closed">
                <span class="text-left pull-left">Brands</span>
                <i id="tog-2" class="fa fa-plus pull-right rotate-0"></i>
            </div>
            <div id="brands" class="filter-content">
                <div id="content-brands" class="d-flex flex-column">

                    @if(isset($brands[0]))
                        <div class="my-form-check pt-2 pl-0">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="brands[]" value="{{$brands[0]->id}}" class="brands">
                                {{$brands[0]->name}}
                            </label>
                        </div>
                    @endif
                    @if(isset($brands[1]))
                        <div class="my-form-check pt-2">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="brands[]" value="{{$brands[1]->id}}" class="brands">
                                {{$brands[1]->name}}
                            </label>
                        </div>
                    @endif

                    @if(isset($brands[2]))
                        <div class="my-form-check pt-2">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="brands[]" value="{{$brands[2]->id}}" class="brands">
                                {{$brands[2]->name}}
                            </label>
                        </div>
                    @endif

                    @if(isset($brands[3]))
                        <div class="my-form-check pt-2">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="brands[]" value="{{$brands[3]->id}}" class="brands">
                                {{$brands[3]->name}}
                            </label>
                        </div>
                    @endif

                    @if(count($brands)>=5)
                        <span class="tog-more pt-3"><i class="fa fa-plus ml-2rem toggle"
                                                       aria-hidden="true"></i>See More</span>
                        <div id="sm-brands">
                            @for($i=4;$i<count($brands);$i++)
                                <div class="my-form-check pt-2">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="brands[]" value="{{$brands[$i]->id}}" class="brands">
                                        {{$brands[$i]->name}}
                                    </label>
                                </div>
                            @endfor
                        </div>
                    @endif

                </div>
            </div>
        </div>

        <div class="filter-block mt-2 mb-3">
            <div id="title-diets" class="filter-title filter-title-closed">
                <span class="text-left pull-left">Diets</span>
                <i id="tog-3" class="fa fa-plus pull-right rotate-0"></i>
            </div>

            <div id="diets" class="filter-content">
                <div id="content-diets" class="d-flex flex-column">
                    <div class="my-form-check pt-2">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="organic" value="1" id="organic">
                            Organic
                        </label>
                    </div>

                    <div class="my-form-check pt-2">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="vegetarian" value="1" id="vegetarian">
                            Vegetarian
                        </label>
                    </div>

                    <div class="my-form-check pt-2">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="vegan" value="1" id="vegan">
                            Vegan
                        </label>
                    </div>

                    <!--
                    <span class="tog-more pt-3"><i class="fa fa-plus ml-2rem toggle"
                                                   aria-hidden="true"></i>See More</span>

                    <div id="sm-diets">

                        <div class="my-form-check pt-2">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Check me out
                            </label>
                        </div>

                        <div class="my-form-check pt-2">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Check me out
                            </label>
                        </div>

                        <div class="my-form-check pt-2">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Check me out
                            </label>
                        </div>

                    </div>
-->

                </div>
            </div>
        </div>

        <div class="filter-block text-center">
            <button class="btn btn-info" id="filter_submit_btn">Search</button>
        </div>

    </form>
</div>
