<?php

namespace Modules\Blogs\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected static function newFactory()
    {
        return \Modules\Blogs\Database\factories\TagFactory::new();
    }

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_tags', 'blog_id', 'tag_id');
    }
}
