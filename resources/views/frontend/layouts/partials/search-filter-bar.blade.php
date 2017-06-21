<div class="col-sm-10 col-sm-offset-1 col-xs-12 mb-20 search-bar">
        <form method="get" action="/search" class="search-form">
            <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default input-lg dropdown-toggle shadow-lite color" data-toggle="dropdown">
                        <span id="search_category color">Category</span> <span class="caret"></span>
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
                <input type="text" class="form-control simplebox input-lg" name="s_t" placeholder="Search items...">
                <span class="input-group-btn">
                    <button class="btn btn-success simplebox input-lg" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </form>
    </div>

{{--<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <form>
            <div class="row">
                <div class="col-sm-3 form-group">
                    <label for="filter">Category</label>
                    <select class="form-control">
                        <option value="0" selected>All Snippets</option>
                        <option value="1">Featured</option>
                        <option value="2">Most popular</option>
                        <option value="3">Top rated</option>
                        <option value="4">Most commented</option>
                    </select>
                </div>
                <div class="col-sm-3 form-group">
                    <label for="filter">Category</label>
                    <select class="form-control">
                        <option value="0" selected>All Snippets</option>
                        <option value="1">Featured</option>
                        <option value="2">Most popular</option>
                        <option value="3">Top rated</option>
                        <option value="4">Most commented</option>
                    </select>
                </div>
                <div class="col-sm-6 form-group">
                    <input type="text" class="form-control" placeholder="Search for snippets" />
                </div>
            </div>
        </form>
        --}}{{--<div class="input-group" id="adv-search">
            <input type="text" class="form-control" placeholder="Search for snippets" />
            <div class="input-group-btn">
                <div class="btn-group" role="group">
                    <div class="dropdown dropdown-lg">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                        <div class="dropdown-menu dropdown-menu-right col-sm-12 col-xs-12" role="menu">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="filter">Category</label>
                                    <select class="form-control">
                                        <option value="0" selected>All Snippets</option>
                                        <option value="1">Featured</option>
                                        <option value="2">Most popular</option>
                                        <option value="3">Top rated</option>
                                        <option value="4">Most commented</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="filter">State</label>
                                    <select class="form-control">
                                        <option value="0" selected>All Snippets</option>
                                        <option value="1">Featured</option>
                                        <option value="2">Most popular</option>
                                        <option value="3">Top rated</option>
                                        <option value="4">Most commented</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                            </form>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </div>
            </div>
        </div>--}}{{--
    </div>
</div>--}}
<div class="clearfix"></div>