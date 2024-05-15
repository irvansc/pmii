<div>
    <h3 class="sidebar-title">Categories</h3>
    <div class="sidebar-item categories">
        <ul>
            @foreach (categories() as $item)

            <li>
                <a href="{{ route('category_post',$item->slug) }}">{{$item->subcategory_name}}
                    <span>({{$item->posts->count()}})</span>
                </a>
            </li>
            @endforeach

        </ul>
    </div>
</div>
