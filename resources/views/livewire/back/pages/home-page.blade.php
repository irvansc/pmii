<div>
    <div class="app-container container-xxl" id="kt_app_content_container">

        @if (auth()->user()->hasRole(['author']))

        @else
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <!-- BEGIN: General Report -->
            <div class="">
                <div class="row g-3">
                    <div class="col-12 col-sm-6 col-xl-4">
                        <div class="card card-flush shadow-sm">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="card-title d-flex flex-column">
                                            <!--begin::Amount-->
                                            <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $totalUsers
                                                }}</span>
                                            <!--end::Amount-->
                                            <!--begin::Subtitle-->
                                            <span class="text-dark opacity-75 pt-1 fw-semibold fs-6">Users</span>
                                            <!--end::Subtitle-->
                                        </div>
                                        <div class="symbol symbol-70px">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                viewBox="0 0 24 24" fill="none" stroke="#3E97FF" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="9" cy="7" r="4"></circle>
                                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-4">
                        <div class="card card-flush shadow-sm">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="card-title d-flex flex-column">
                                            <!--begin::Amount-->
                                            <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $totalAnggota
                                                }}</span>
                                            <!--end::Amount-->
                                            <!--begin::Subtitle-->
                                            <span class="text-dark opacity-75 pt-1 fw-semibold fs-6">Anggota</span>
                                            <!--end::Subtitle-->
                                        </div>
                                        <div class="symbol symbol-70px">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                viewBox="0 0 24 24" fill="none" stroke="#3E97FF" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="9" cy="7" r="4"></circle>
                                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-4">
                        <div class="card card-flush shadow-sm">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="card-title d-flex flex-column">
                                            <!--begin::Amount-->
                                            <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $totalAlumni
                                                }}</span>
                                            <!--end::Amount-->
                                            <!--begin::Subtitle-->
                                            <span class="text-dark opacity-75 pt-1 fw-semibold fs-6">Alumni</span>
                                            <!--end::Subtitle-->
                                        </div>
                                        <div class="symbol symbol-70px">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                viewBox="0 0 24 24" fill="none" stroke="#3E97FF" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="9" cy="7" r="4"></circle>
                                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-2 mt-3">
                    <div class="col-12 col-sm-8 col-xl-6">
                        <div class="card mt-3">
                            <div class="card-body">
                                <div>Data Anggota berdasarkan jenis kelamin</div>
                                <canvas id="anggotaGenderChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-8 col-xl-6">
                        <div class="card mt-3">
                            <div class="card-body">
                                <div>Data Alumni berdasarkan jenis kelamin</div>
                                <canvas id="alumniGenderChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: General Report -->
        </div>
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <!--begin::Col-->
            <div class="col-xl-8">
                <!--begin::Chart Widget 1-->
                <div class="card card-flush h-lg-100">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">Most Visited Post</span>

                        </h3>

                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-1 px-1">
                        <div class="table-responsive">
                            <table class="table table-striped gy-7 gs-7">
                                <thead>
                                    <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                        <th>No</th>
                                        <th>Post title</th>
                                        <th>Author</th>
                                        <th>Views Today</th>
                                        <th>View last 30 days</th>
                                        <th>View last 90 days</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $e=> $item)

                                    <tr>
                                        <td> {{ $e+1 }}</td>
                                        <td>
                                            <a href="{{ route('read_post',['any'=> $item->slug]) }}"
                                                style="font-size: 12px">{{ Str::limit($item->post_title, 20, '...')
                                                }}</a>
                                        </td>
                                        <td>{{ $item->author->name }}</td>
                                        <td>{{
                                            views($item)->period(\CyrildeWit\EloquentViewable\Support\Period::since(today()))->count()}}
                                        </td>
                                        <td>{{
                                            views($item)->period(\CyrildeWit\EloquentViewable\Support\Period::pastDays(30))->count()}}
                                        </td>
                                        <td>{{
                                            views($item)->period(\CyrildeWit\EloquentViewable\Support\Period::pastDays(90))->count()}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Chart Widget 1-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            @can('read setting')
            <div class="col-xl-4">
                <div class="card">
                    <!--begin::Card head-->
                    <div class="card-header card-header-stretch">
                        <!--begin::Title-->
                        <div class="card-title d-flex align-items-center">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-1 svg-icon-primary me-3 lh-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M3 20h18L12 4z" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <h3 class="fw-bold m-0 text-gray-800">Activities</h3>
                        </div>
                        <!--end::Title-->
                        <!--begin::Toolbar-->
                        <div class="card-toolbar m-0">
                            <!--begin::Tab nav-->
                            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0 fw-bold" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link justify-content-center text-active-gray-800 active"
                                        target="_blank" href="{{ url('admin/user-activity') }}"
                                        aria-selected="true">View details</a>
                                </li>

                            </ul>
                            <!--end::Tab nav-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card head-->
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Tab Content-->
                        <div class="tab-content">
                            <!--begin::Tab panel-->
                            <div class="card-body p-0 tab-pane fade active show" role="tabpanel"
                                aria-labelledby="kt_activity_today_tab">
                                <!--begin::Timeline-->
                                @foreach ($activities->slice(0, 5) as $activity)

                                <div class="timeline">
                                    <!--begin::Timeline item-->
                                    <div class="timeline-item">
                                        <!--begin::Timeline line-->
                                        <div class="timeline-line w-40px"></div>
                                        <!--end::Timeline line-->
                                        <!--begin::Timeline icon-->
                                        <div class="timeline-icon symbol symbol-circle symbol-40px me-4">
                                            <div class="symbol-label bg-light">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
                                                <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="#808080"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path
                                                            d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3" />
                                                        <circle cx="12" cy="10" r="3" />
                                                        <circle cx="12" cy="12" r="10" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                        </div>
                                        <!--end::Timeline icon-->
                                        <!--begin::Timeline content-->
                                        <div class="timeline-content mb-10 mt-n1">
                                            <!--begin::Timeline heading-->
                                            <div class="pe-3 mb-5">
                                                <!--begin::Title-->
                                                <div class="fs-5 fw-semibold mb-2">{{ $activity->user->name }} - {{
                                                    $activity->log_type }}</div>
                                                <!--end::Title-->
                                                <!--begin::Description-->
                                                <div class="d-flex align-items-center mt-1 fs-6">
                                                    <div class="text-muted me-2 fs-7">{{ $activity->log_date }} </div>

                                                </div>
                                                <!--end::Description-->
                                            </div>
                                        </div>
                                        <!--end::Timeline content-->
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <!--end::Tab panel-->

                        </div>
                        <!--end::Tab Content-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
            @endcan
            <!--end::Col-->
        </div>
        @endif

        @if (auth()->user()->hasAnyRole(['author','admin']))
        <div class="row g-3">
            <div class="col-12 col-sm-8 col-xl-8">
                <div class="card card-flush shadow-sm">
                    <div class="card-content">
                        <div class="card-header">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Jumlah Akumulasi Article/hari</span>

                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <canvas id="authorArticlesChart" style="width: 100%; height: 400px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-4">
                <div class="card card-flush shadow-sm">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2"> {{ $userArticleCount }}</span>
                                    <!--end::Amount-->
                                    <!--begin::Subtitle-->
                                    <span class="text-dark opacity-75 pt-1 fw-semibold fs-6">Total article saya</span>
                                    <!--end::Subtitle-->
                                </div>
                                <div class="symbol symbol-70px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3E97FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-flush shadow-sm mt-3">
                    <div class="card-header">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">Penulis terbanyak</span>

                        </h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jumlah Post</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topAuthors as $author)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $author->name }}</td>
                                        <td>{{ $author->posts_count }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row g-3 mt-3">
            <div class="col-12 col-sm-8 col-xl-8">
                <div class="card card-flush shadow-sm">
                    <div class="card-content">
                        <div class="card-header">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Jumlah Akumulasi Article berdasarkan kategori</span>

                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <canvas id="categoryArticlesChart" style="width: 100%; height: 400px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('authorArticlesChart').getContext('2d');
        const authorArticlesData = @json($this->authorArticles);

        const labels = Object.keys(authorArticlesData[Object.keys(authorArticlesData)[0]]).map(date => date.split('-')[2]);

        const colors = [
            'rgb(255, 99, 132)',   // Merah
            'rgb(54, 162, 235)',   // Biru
            'rgb(255, 206, 86)',   // Kuning
            'rgb(75, 192, 192)',   // Hijau
            'rgb(153, 102, 255)',  // Ungu
            'rgb(255, 159, 64)',   // Oranye
            'rgb(199, 199, 199)',  // Abu-abu

        ];

        const datasets = Object.entries(authorArticlesData).map(([name, data], index) => ({
            label: name,
            data: Object.values(data),
            borderColor: colors[index % colors.length],
            tension: 0.1,
            fill: false
        }));

        const config = {
            type: 'line',
            data: {
                labels,
                datasets
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            callback: function(value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            }
                        }
                    }
                },
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    },
                }
            }
        };

        new Chart(ctx, config);
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('categoryArticlesChart').getContext('2d');
        const categoryArticlesData = @json($categoryArticles);

        const labels = Object.keys(categoryArticlesData);
        const data = Object.values(categoryArticlesData);

        const config = {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Post',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y:{
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            callback: function(value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            }
                        }
                    }
                }
            }
        };

        new Chart(ctx, config);
    });
    </script>
@endpush
@push('scripts')

<script>
    document.addEventListener('livewire:load', function () {
        var ctxAlumni = document.getElementById('alumniGenderChart').getContext('2d');
        var alumniGenderChart = new Chart(ctxAlumni, {
            type: 'pie',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    label: 'Jenis Kelamin',
                    data: [{{ $alumniMale }}, {{ $alumniFemale }}],
                    backgroundColor: ['rgba(54, 162, 235, 0.6)', 'rgba(255, 205, 86, 0.6)'],
                    borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 205, 86, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                },
            }
        }
    });

    var ctxAnggota = document.getElementById('anggotaGenderChart').getContext('2d');
    var anggotaGenderChart = new Chart(ctxAnggota, {
        type: 'pie',
        data: {
            labels: ['Laki-laki', 'Perempuan'],
            datasets: [{
                label: 'Jenis Kelamin',
                data: [{{ $anggotaMale }}, {{ $anggotaFemale }}],
                backgroundColor: ['rgba(54, 162, 235, 0.6)', 'rgba(255, 205, 86, 0.6)'],
                borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 205, 86, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                },
            }
        }
    });
});
</script>


@endpush
