<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'isbn', 'year', 'return_date', 'borrow_data', 'is_available', 'created_date',
    ];
    
}
