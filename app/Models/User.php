<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Mail\NewUserWelcomeMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function boot()
    {
        parent::boot();

        static::created(function($user) {
            // Provjerite ako profil već postoji
            if (!$user->profile) {
                // Kreirajte profil ako ne postoji
                Profile::create([
                    'user_id' => $user->id,
                    'title' => $user->username
                ]);
            }

            Mail::to($user->email)->send(new NewUserWelcomeMail());
        });

    }



    public function posts(){
        return $this->hasMany(Post::class)->orderBy('created_at','DESC');
    }
    public function following()
    {
        return $this->belongsToMany(Profile::class, 'profile_user', 'user_id', 'profile_id');
    }
    public function profile(){
        return $this->hasOne(Profile::class);
    }
}
