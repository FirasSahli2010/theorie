<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use VanOns\Laraberg\Models\Gutenbergable;

use Kyslik\ColumnSortable\Sortable;

class Currency extends Model
{
    use HasFactory;
    use Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'nameen',
        'price',
        'symbol',
        'symbolen',
    ];

    public $sortable = ['id', 'name', 'nameen', 'price','symbol', 'symbolen', 'created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
