<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lession extends Model
{
    protected $fillable = [
        'course_id',
        'name',
        'description',
        'slug',
        'avatar',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function test()
    {
        return $this->hasOne(Test::class);
    }

    public function words()
    {
        return $this->hasMany(Word::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_lession');
    }

}
