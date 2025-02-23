<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'body', 'published_at', 'android_id'];

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    /**
     * One report has only one creator.
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function android(){
        return $this->belongsTo(Android::class)->withTrashed();
    }

    public static function create(array $report): Report{
        $newReport = new self();
        $newReport->title = $report['title'];
        $newReport->body = $report['body'];
        $newReport->published_at = $report['published_at'];
        $newReport->android_id = $report['android_id'];
        $newReport->save();
        return $newReport;
    }
}
