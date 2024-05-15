@php
    $url = $_SERVER['REQUEST_URI'];
    $url = strtok($url, '?'); // Menghilangkan query string jika ada
    $pathSegments = explode('/', trim($url, '/'));
    $currentPath = '';
    $previousSegmentDisplayed = false; // Untuk mengecek apakah segmen sebelumnya ditampilkan
@endphp
<style>
    .breadcrumb {
    list-style: none;
    padding: 0;
    display: flex;
    align-items: center;
}

.breadcrumb-item a {
    text-decoration: none;
    color: #6c757d;

}

.breadcrumb-item.active a {
    color: #007bff;

}

.breadcrumb-item:not(:last-child)::after {
    content: ">";
    color: #6c757d; /* Sesuaikan warna sesuai dengan tema Anda */
}
</style>
    <ul class="breadcrumb">
        @if (!empty($pathSegments))
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            @php $previousSegmentDisplayed = true; @endphp
        @endif

        @foreach ($pathSegments as $key => $segment)
            @if ($segment == 'home' || $segment == 'dashboard')
                @continue
            @endif

            @php
                $currentPath .= '/' . $segment;
                $isActive = $key == count($pathSegments) - 1;
            @endphp

            @if (!is_numeric($segment))
                @if ($previousSegmentDisplayed)
                <li class="breadcrumb-separator"></li>
                @endif
                <li class="breadcrumb-item {{ $isActive ? 'active' : '' }}">
                    <a href="{{ url($currentPath) }}">{{ ucfirst($segment) }}</a>
                </li>
                @php $previousSegmentDisplayed = true; @endphp
            @endif
        @endforeach
    </ul>
