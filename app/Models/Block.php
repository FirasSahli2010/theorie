<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

class Block extends Model
{
    use HasFactory;
    use Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'name',
        'template',
        'category',
        'page',
        'post',
        'langauge',
        'shw',
        'order',
        'position'

    ];

    public $sortable = ['id', 'title', 'name', 'langauge', 'shw', 'created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    public function language(){
      return $this->belongsTo(Languages::class);
    }

    public function category() {
       return $this->belongsTo(Categories::class);
    }

    public function post(){
      return $this->hasMany(Posts::class);
    }

    public function page(){
      return $this->hasMany(Pages::class);
    }

}
