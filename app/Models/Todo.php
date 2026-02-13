<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Todo extends Model
{

    protected $guarded = [];  
    //protected $fillable = ['name','description'];
    
    public function user(): BelongsTo{
     return $this->belongsTo(User::class);
    }
}
