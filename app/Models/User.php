<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function groups()
	{
	    return $this->belongsToMany(Group::class,'cmauth_group_user','user_id','group_id');
	}

    public function hasPermission($permission)
    {   
        $permissions = $this->groups()->with('permissions')->get()->pluck('permissions.*.name')->collapse()->toArray();
        
        return (in_array($permission, $permissions));
    }
}
