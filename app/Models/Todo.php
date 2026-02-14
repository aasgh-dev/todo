<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Todo extends Model
{

    // if i put name or description on guarded then laravel hide this varible
    protected $guarded = [];

    // if i didnt put name or description on fillable then laravel hide this varible
    //protected $fillable = ['name','description'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
