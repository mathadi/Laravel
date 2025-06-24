<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * 
 * @property int $id
 * @property int|null $user_id
 * @property string $title
 * @property string $content
 * @property bool|null $draft
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 * @property Collection|Category[] $categories
 * @property Collection|Tag[] $tags
 * @property Collection|Comment[] $comments
 *
 * @package App\Models
 */
class Article extends Model
{
	protected $table = 'articles';
	
	protected $casts = [
		'user_id' => 'int',
		'draft' => 'bool',
		'likes' => 'int'
	];
	
	protected $fillable = [
		'user_id',
		'title',
		'content',
		'draft',
		'image',
		'likes'
	];
	
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
	public function categories()
	{
		return $this->belongsToMany(Category::class);
	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}
}
