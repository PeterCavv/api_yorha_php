<?php

namespace App\Models;

use App\Events\CreatedReportEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = ['title', 'body', 'published_at', 'user_id'];

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    protected $dispatchesEvents = [
        'created' => CreatedReportEvent::class,
    ];

    /**
     * One report has only one creator.
     * @return BelongsTo
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
        $newReport->user_id = $report['user_id'];
        $newReport->save();
        return $newReport;
    }
}
