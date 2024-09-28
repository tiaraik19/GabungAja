<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityChat extends Model
{
    use HasFactory;

    protected $fillable = ['community_id', 'user_id', 'message'];

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function communityChats()
    {
        return $this->hasMany(CommunityChat::class);
    }
}
