<?php

namespace Modules\Blogs\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function parent()
    {
        return $this->hasOne(BlogCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(BlogCategory::class, 'parent_id')->with('children');
    }

    public function blogs() {
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Blogs\Database\factories\BlogCategoryFactory::new();
    }
}
