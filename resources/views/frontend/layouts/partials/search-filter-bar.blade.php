<div class="row col-sm-12">
    <div class="col-sm-4 mt-20 mb-2">
        <div class="shadow-lite bg-white p-3 simplebox">
            <h4 class="ml-5 text-muted"><strong>Latest Items <i class="fa fa-arrow-down text-info"></i> </strong></h4>
        </div>
    </div>
    <div class="col-sm-8 pull-right col-xs-12 mt-20 mb-20">
        <form method="get" action="/search" class="search-form">
            <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle shadow-lite" data-toggle="dropdown">
                        <span id="search_category">Category</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu simplebox" role="menu">
                        @if(isset($categories) && !empty($categories))
                            @foreach($categories as $category)
                                <li><a class="list-group-item" href="#{{$category->hashed_id}}">
                                    {{ucfirst($category->name)}}
                                </a></li>
                            @endforeach

                        @else
                            <li>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <p class="text-danger">No categories!</p>
                                    </div>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
                <input type="hidden" name="s_c" value="all" id="search_category">
                <input type="text" class="form-control simplebox" name="s_t" placeholder="Search items...">
                <span class="input-group-btn">
                    <button class="btn btn-warning simplebox" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </form>
    </div>
</div>
<div class="clearfix"></div>