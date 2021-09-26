<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Comment;
use App\Models\Category;
use App\Models\ItemDetail;
use App\Http\Traits\FilterFieldTrait;
use App\Http\Traits\TableHeadersTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory, FilterFieldTrait, TableHeadersTrait;

    protected $guarded = [];
    
    protected $withCount = ['comments'];


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function itemdetails()
    {
        return $this->hasMany(ItemDetail::class);
    }
    public function getDetailsFromLatest()
    {
        return $this->itemdetails()
            ->latest()
            ->get();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function getUniqueSize()
    {
        return $this->itemdetails()
            ->pluck('id', 'size_id')
            ->map(function ($value) {
                return ItemDetail::find($value);
            });
    }

    public function scopeFilterWithMetadata($query, $metadata, $field)
    {
        if ($field) {
            $brands = Brand::all()->pluck('id', 'name');
            $categories = Category::all()->pluck('id', 'category');
        }

        $query->when($metadata, function ($item) use (
            $brands,
            $categories,
            $metadata,
            $field
        ) {
            return $item
                ->where($field, $brands->get($metadata))
                ->orWhere($field, $categories->get($metadata));
        });
    }
}
