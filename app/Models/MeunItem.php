<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class MeunItem extends Model
{
  use HasFactory;
  use Sortable;

    protected $fillable = [
      'title',
      'link',
      'slug',
      'menu_id',
      'shw',
      'order'
    ];

    public $sortable = ['id', 'title', 'link', 'menu_id', 'shw', 'order', 'created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function menu() {
      $this->belongsTo(Meun::class, 'menu_id');
    }
}
