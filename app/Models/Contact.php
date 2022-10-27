<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

class Contact extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
        'full_name',
        'last_name',
        'email',
        'city',
        'country',
        'job_title',
        'telephone',
        'mobile',
        'language',
        'address'
    ];

    public $sortable = ['id', 'full_name', 'email', 'city', 'country', 'job_title', 'langauge', 'created_at', 'updated_at'];

    public function language(){
      return $this->belongsTo(Languages::class);
    }
}
