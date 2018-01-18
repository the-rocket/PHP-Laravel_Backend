<?php

namespace App;

use Carbon\Carbon;

class Post extends Model
{
	public function comments() {
		return $this->hasMany(Comment::class);
	}

	public function user() {
		return $this->belongsTo(User::class);
	}

	public function addComment(Comment $comment) {
		$this->comments()->save($comment);
	}

	public static function archives() {
		return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();
	}

	public function scopeFilter($query, $filters) {

		if (isset($filters['month']) && $month = $filters['month']) {
			$query->whereMonth('created_at', Carbon::parse($month)->month);
		}
		if (isset($filters['year']) && $year = $filters['year']) {
			$query->whereYear('created_at', $year);
		}
		return $query;	
	}
}
