<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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


    #get initials to be displayed through the app
    public function getInitials()
    {
        $name = $this->name;
        $words_count = str_word_count($name, 1);
        $modified_name = '';
        foreach ($words_count as $word) {
            $modified_name = strtoupper(substr($word, 0, 1));
        }
        $modified_name = $name[0] . $modified_name;
        if (count($words_count) === 1) {
            $modified_name = strtoupper(substr($name, 0, 2));
        }
        return $modified_name;
    }
}
