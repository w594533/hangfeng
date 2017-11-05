<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use ModelTree, AdminBuilder, SoftDeletes;
    protected $fillable = ['title', 'order', 'description', 'parent_id'];
    protected $dates = ['deleted_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');
        $this->setOrderColumn('order');
        $this->setTitleColumn('title');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function cooperations()
    {
        return $this->hasMany('App\Models\Cooperation');
    }

    public function childrenCategories()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}
