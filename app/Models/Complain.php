<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    protected $fillable =
    ['user_id', 'category_id', 'title', 'description', 'status', 'lokasi_unit', 'photo', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
