<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Request;

class Article extends Model {
	protected $fillable =
	[
		'title',
		'body',
		'published_at',
	];

	protected $dates =
	[

		'published_at',
	];

	//Setter for published_at
	public function setPublishedAtAttribute($date) {
		if (Request::input('published_at') > Carbon::now()) {
			$this->attributes['published_at'] = Carbon::parse($date);
		} else {
			$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
		}

	}

	public function scopePublished($query) {

		$query->where('published_at', '<=', Carbon::now());
	}
	//Article ise owned by only one user
	public function user() {

		return $this->belongsTo('App/User');
	}

	public function tags() {

		return $this->belongsToMany('App\Tag');
	}

	public function getTagListAttribute() {

		return $this->tags->lists('id')->all();
	}
}
