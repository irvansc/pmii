<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            if ($user->profile) {
                $path = 'back/img/user/';
                $user_picture = $user->profile->getAttributes()['picture'];
                $picture_full_path = $path . $user_picture;
                    if ($user_picture != null && File::exists(public_path($picture_full_path))) {
                        File::delete(public_path($picture_full_path));
                    }
                $user->profile->delete();
            }
        });
    }
    public function posts() {
        return $this->hasMany(Post::class, 'author_id', 'id');
    }
}
