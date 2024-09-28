<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Community extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'motto', 'category', 'description', 'location', 'logo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'members', 'community_id', 'user_id');
    }

    public function chats()
    {
        return $this->hasMany(CommunityChat::class);
    }
    

    public static function boot()
    {
        parent::boot();

        static::creating(function ($community) {
            $community->user_id = Auth::id();
        });
    }
}
