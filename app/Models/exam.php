<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

use App\Models\section;
use App\Models\question;

use Illuminate\Database\Eloquent\SoftDeletes; //soft delete

class exam extends Model
{
  use HasFactory;
  use Sortable;
  // use SoftDeletes;

  public $timestamps = true;

  protected $table = 'exam';

  /* The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'title',
    'img',
    'language',
    'shw',
    'exam_num'
  ];

  public $sortable = ['id', 'title', 'img', 'language', 'shw', 'exam_num', 'created_at', 'updated_at'];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [

  ];


  public function section() {
    $this->hasMany(section::class);
  }

  public function questions() {
    $this->hasMany(question::class);
  }
}
