<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

use App\Models\exam;

class question extends Model
{
  use HasFactory;
  use Sortable;

    public $timestamps = true;

    protected $table = 'question';

    /* The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
      'title',
      'desc',
      'section',
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

    public function exam() {
      $this->belongsTo(exam::class);
    }
}
