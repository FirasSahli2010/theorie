<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;


class Order extends Model
{
    use HasFactory;

    use Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_name',
        'client_telephone',
        'cleint_address',
    ];

    public $sortable = ['id', 'client_name', 'client_telephone', 'cleint_address', 'created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
    
    
    public function products($param) {
        return $this::hasMany(order_item::class);
    }

    
}
