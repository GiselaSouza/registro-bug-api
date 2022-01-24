<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassificationBug extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "classification_bugs";

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        "deleted_at"
    ];

    public function bug() {
        return $this->hasOne(Bug::class);
    }

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            UserClassificationBug::class,
            "classification_bug_id",
            "user_id"
        );
    }
}
