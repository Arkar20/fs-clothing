<?php

namespace App\Http\Traits;

trait FilterFieldTrait
{
    public function scopeFilterSearch($query, $field, $search)
    {
        return $query->when($search, function ($querysearch) use (
            $search,
            $field
        ) {
            return $querysearch->Orwhere($field, 'LIKE', '%' . $search . '%');
        });
    }
    public function scopeFilterByPurchaseOrderCount($builder,$filter)
    {
        // dd($builder->get());
     return  $builder->when($filter && $filter=="Top Purchase Items" && auth()->guard('web')->check(),function($query){
                   return $query->orderBy('purchase_count','desc');
                    // return $query->withC('purchases_count','asc');
                })
                ->when($filter && $filter=="Top Order Items"  && auth()->guard('web')->check(),function($query){
                   return $query->orderBy('order_count','desc');
                    // return $query->withC('purchases_count','asc');
                });
    }
}
