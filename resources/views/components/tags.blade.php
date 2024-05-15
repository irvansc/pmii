<div>
    <h3 class="sidebar-title">Tags</h3>
    <div class="sidebar-item tags">
        @php
        $tags = all_tags();
        @endphp
        <ul>

            @foreach($tags as $tag)
            <li><a href="{{ route('tag_post', $tag) }}">{{ $tag }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
