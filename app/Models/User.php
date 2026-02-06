<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

     use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
    'name',
    'lastname',
    'email',
    'password',
    'phone',
    'role',
    'bio',
    'photo',
    'speciality',
];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function Job_offers(){
        return $this->hasMany(Job_offer::class,'user_id');
    }

    public function applications(){
        return $this->hasMany(Application::class);
    }

    public function appliedJobs(){
        return $this->belongsToMany(Job_offer::class, 'application','user_id','job_offer_id')
        ->withPivot('statut')
        ->withTimestamps();
    }

    public function friends()
{
    return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')
                ->withPivot('status');
}


    public function friendOf()
{
    return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id')
                ->withPivot('status');
}

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
}
