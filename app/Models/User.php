<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $casts = [
        'status' => 'boolean',
        'leader_birth_date' => 'date'
    ];

    protected $fillable = [
        'team_name',
        'password',
        'leader_name',
        'leader_email',
        'leader_whatsapp',
        'leader_line',
        'leader_github',
        'leader_birth_place',
        'leader_birth_date',
        'leader_cv',
        'status',
        'leader_card',
        'member_1',
        'member_1_email',
        'member_2',
        'member_2_email',
        'member_3',
        'member_3_email',
        'role'
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
