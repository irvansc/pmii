<?php

namespace App\Http\Livewire\Back\Pages;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use App\Models\SubCategory;
use Illuminate\Support\Carbon;
use Haruncpi\LaravelUserActivity\Models\Log;

class HomePage extends Component
{
    public $totalUsers, $totalAlumni, $totalAnggota;
    public $alumniMale, $alumniFemale, $anggotaMale, $anggotaFemale;
    public $activities;
    public $authorArticles;
    public $userArticleCount;
    public $categoryArticles;
    public $topAuthors;
    public function mount()
    {
        $this->fetchAuthorArticles();
        $this->totalUsers = User::count();
        $this->userArticleCount = Post::where('author_id', auth()->id())->count();
        $this->categoryArticles = SubCategory::withCount('posts')
        ->get()
        ->pluck('posts_count', 'subcategory_name');
        $this->topAuthors = User::role(['author', 'admin']) // Filter hanya pengguna dengan role 'author' atau 'admin'
        ->withCount(['posts' => function ($query) {
            $query->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()]);
        }])
        ->orderByDesc('posts_count')
        ->take(3)
        ->get();
        $roleAlumni = Role::where('name', 'alumni')->first();
        $roleAnggota = Role::where('name', 'user')->first();

        if ($roleAlumni) {
            $this->totalAlumni = $roleAlumni->users()->where('isActive', true)->count();
            $this->alumniMale = $roleAlumni->users()->where('isActive', true)->whereHas('profile', function ($query) {
                $query->where('jenis_kelamin', 'L');
            })->count();
            $this->alumniFemale = $roleAlumni->users()->where('isActive', true)->whereHas('profile', function ($query) {
                $query->where('jenis_kelamin', 'P');
            })->count();
        } else {
            $this->totalAlumni = 0;
            $this->alumniMale = 0;
            $this->alumniFemale = 0;
        }

        if ($roleAnggota) {
            $this->totalAnggota = $roleAnggota->users()->where('isActive', true)->count();
            $this->anggotaMale = $roleAnggota->users()->where('isActive', true)->whereHas('profile', function ($query) {
                $query->where('jenis_kelamin', 'L');
            })->count();
            $this->anggotaFemale = $roleAnggota->users()->where('isActive', true)->whereHas('profile', function ($query) {
                $query->where('jenis_kelamin', 'P');
            })->count();
        } else {
            $this->totalAnggota = 0;
            $this->anggotaMale = 0;
            $this->anggotaFemale = 0;
        }

        $this->activities = Log::orderBy('log_date', 'desc')->take(5)->get();
    }
    public function fetchAuthorArticles()
    {
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $authors = User::role(['author', 'admin'])->get();

        $authorArticles = [];

        foreach ($authors as $author) {
            $posts = $author->posts()
                ->whereBetween('created_at', [$startDate, $endDate])
                ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
                ->groupBy('date')
                ->get()
                ->pluck('count', 'date');

            $dateRange = new \DatePeriod(
                $startDate,
                new \DateInterval('P1D'),
                $endDate->addDay()
            );

            $dates = [];
            foreach ($dateRange as $date) {
                $dateFormatted = $date->format('Y-m-d');
                $dates[$dateFormatted] = $posts[$dateFormatted] ?? 0;
            }

            $authorArticles[$author->name] = $dates;
        }

        $this->authorArticles = $authorArticles;
    }
    public function render()
    {
        $posts = Post::orderByViews()->limit(5)->get();
        return view('livewire.back.pages.home-page', [
            'totalUsers' => $this->totalUsers,
            'totalAlumni' => $this->totalAlumni,
            'totalAnggota' => $this->totalAnggota,
            'alumniMale' => $this->alumniMale,
            'alumniFemale' => $this->alumniFemale,
            'anggotaMale' => $this->anggotaMale,
            'anggotaFemale' => $this->anggotaFemale,
            'posts' => $posts,
            'activities' => $this->activities,
            'authorArticles' => $this->authorArticles,
            'userArticleCount' => $this->userArticleCount,
            'categoryArticles' => $this->categoryArticles,
        ]);
    }
}
