<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $guarded = ['id'];

    public function level(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function tag(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }

    public function status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function chapters(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Chapter::class);
    }

    public function lessons(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Lesson::class,Chapter::class);
    }

    public function contents(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Content::class);
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class,'user_course','user_id','course_id');
    }


}
