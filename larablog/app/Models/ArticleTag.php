<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ArticleTag
 * 
 * @property int|null $article_id
 * @property int|null $tag_id
 * 
 * @property Article|null $article
 * @property Tag|null $tag
 *
 * @package App\Models
 */
class ArticleTag extends Model
{
	protected $table = 'article_tag';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'article_id' => 'int',
		'tag_id' => 'int'
	];

	protected $fillable = [
		'article_id',
		'tag_id'
	];

	public function article()
	{
		return $this->belongsTo(Article::class);
	}

	public function tag()
	{
		return $this->belongsTo(Tag::class);
	}
}
