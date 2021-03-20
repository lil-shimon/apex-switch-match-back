<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'comment',
        'title',
        'user_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @return mixed
     */
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id')->withTrushed();
    }
}
