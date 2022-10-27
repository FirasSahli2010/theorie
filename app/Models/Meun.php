<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

class Meun extends Model
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
      'slug',
      'category',
      'language',
      'shw',
      'is-main-menu',
      'possition'
    ];

    public $sortable = ['id', 'title', 'name', 'language', 'shw', 'possition', 'is-main-menu', 'created_at', 'updated_at'];

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
        'email_verified_at' => 'datetime',
    ];

    public function parent_language(){
      return $this->belongsTo(Languages::class, 'language');
    }

    public function parent_category() {
       return $this->belongsTo(Categories::class, 'category');
    }

    public function page(){
      return $this->belongsTo(Pages::class);
    }

    public function menu_items() {
      return $this->hasMany(MeunItem::class, 'menu_id');
    }

}
