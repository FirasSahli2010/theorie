<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Kyslik\ColumnSortable\Sortable;

/**
 * Class Setting
 *
 * @property int $Id
 * @property string $title
 * @property string $value
 * @property int $module
 * @property int $category
 * @property int $page
 * @property int $language
 *
 * @package App\Models
 */
class Setting extends Model
{
	use HasFactory;
	use Sortable;

	protected $table = 'setting';
	protected $primaryKey = 'Id';
	public $timestamps = false;

	protected $casts = [
		'module' => 'int',
		'category' => 'int',
		'page' => 'int',
		'language' => 'int'
	];

	protected $fillable = [
		'title',
		'value',
		'module',
		'category',
		'page',
		'language'
	];
}
