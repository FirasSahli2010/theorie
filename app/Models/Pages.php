<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use VanOns\Laraberg\Models\Gutenbergable;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes; //add this line


class Pages extends Model
{
    use HasFactory;
    use Sortable;
    use SoftDeletes;

    use Gutenbergable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'desc',
        'slug',
        'category',
        'langauge',
        'shw',
        'deleted',
        'deleted_at'
    ];

    public $sortable = ['id', 'title', 'langauge', 'shw', 'created_at', 'updated_at'];

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

    public function language(){
      return $this->belongsTo(Languages::class);
    }

    public function category() {
       return $this->belongsTo(Categories::class);
    }

    public function posts(){
      return $this->hasMany(Posts::class);
    }

}
