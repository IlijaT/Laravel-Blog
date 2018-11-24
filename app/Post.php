<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'body', 'title' ];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function addComment($body)
    {
        $this->comments()->create([
            'body' => $body
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['month']) && $month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if (isset($filters['month']) && $year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }
}
