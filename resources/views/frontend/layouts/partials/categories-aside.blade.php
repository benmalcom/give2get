<div class="col-lg-3 col-md-3 simplebox categories sidebar-offcanvas">

        <div class="list-group" style="background-color: #C4D3C3 !important;">
            <div class="list-group-item text-center text-muted categories-title bg-custom" style="box-shadow: none !important;">
                <h4><i class="fa fa-tags"></i> Item Categories</h4>
            </div>
           @if(isset($categories) && count($categories) > 0)
              @foreach($categories as $category)
                    <a class="list-group-item" href="/categories/{{$category->hashed_id}}/items">
                        <span class="badge">{{$category->items_count}}</span>
                        {{ucfirst($category->name)}}
                    </a>
                  @endforeach

            @else
            <div class="panel panel-default">
                <div class="panel-body">
                    <p class="text-danger">No categories yet!</p>
                </div>
            </div>
            @endif
        </div>
</div>