<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Article,Tag};
class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'body',
        'article_id',
    ];


    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
