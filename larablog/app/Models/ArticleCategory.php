<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ArticleCategory
 * 
 * @property int|null $article_id
 * @property int|null $category_id
 * 
 * @property Article|null $article
 * @property Category|null $category
 *
 * @package App\Models
 */
class ArticleCategory extends Model
{
	protected $table = 'article_category';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'article_id' => 'int',
		'category_id' => 'int'
	];

	protected $fillable = [
		'article_id',
		'category_id'
	];

	public function article()
	{
		return $this->belongsTo(Article::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}
}
