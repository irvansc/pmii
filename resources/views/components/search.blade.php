<div>
    <h3 class="sidebar-title">Search</h3>
    <div class="sidebar-item search-form">
        <form action="{{ route('search_post') }}">
            <input id="search-query" name="query" value="{{Request('query')}}" type="text" placeholder="Search...">
            <button type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div>
</div>
