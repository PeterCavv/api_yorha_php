<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'published_at'];

    /**
     * One report has only one creator.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function create(array $report): Report{
        $newReport = new self();
        $newReport->title = $report['title'];
        $newReport->body = $report['body'];
        $newReport->published_at = $report['published_at'];
        $newReport->save();
        return $newReport;
    }
}
