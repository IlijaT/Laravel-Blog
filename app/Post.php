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
            'user_id' => auth()->id(),
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


    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) DESC')
            ->get()
            ->toArray();
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
