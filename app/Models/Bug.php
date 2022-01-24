<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bug extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "bugs";

    protected $fillable = [
        'title',
        'description',
        'classification',
        'classification_bug_id',
        'status',
        'created_by',
        'updated_by'
    ];

    protected $hidden = [
        "deleted_at"
    ];

    public function classificationBug() {
        return $this->belongsTo(ClassificationBug::class);
    }
}
