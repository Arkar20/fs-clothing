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
                })
                ->when($filter && $filter=="Least Purchase Items"  && auth()->guard('web')->check(),function($query){
                   return $query->orderBy('purchase_count','asc');
                    // return $query->withC('purchases_count','asc');
                })
                ->when($filter && $filter=="Least Order Items"  && auth()->guard('web')->check(),function($query){
                   return $query->orderBy('order_count','desc');
                    // return $query->withC('purchases_count','asc');
                });
    }

    
    public function scopeFilterBySupplierInfo($query,$keyword)
    {
        return $query->when($keyword,function($query) use($keyword){
                                                return  $query->whereRelation('supplier','name','LIKE','%'.$keyword.'%')
                                            ->orWhereRelation('supplier','email','LIKE','%'.$keyword.'%')
                                            ->orWhereRelation('supplier','company_name','LIKE','%'.$keyword.'%')
                                            ->orWhereRelation('supplier','hotline1','LIKE','%'.$keyword.'%');
                                            });
    }
    public function scopeFilterByStartEndDate($query,$startDate,$endDate)
    {
      return  $query->when($startDate && $endDate, function ($query) use($startDate,$endDate) {
                                                    return  $query->whereDate('created_at','>=',$startDate)
                                                                 ->whereDate('created_at','<=', $endDate);
                                                });
    }

    // filter by status of oders and paysments in order table listing
    public function scopeFilterByStatus($query,$status)
    {
         return $query->when($status && $status=="Order Pending",function($db) {
                                                return $db->where('order_status',false);
                                            })
                                           ->when($status && $status=="Order Confirmed",function($db)  {
                                                return $db->where('order_status',true);
                                            })
                                           ->when($status && $status=="Payment Pending",function($db)  {
                                                return $db->where('payment_status',false);
                                            })
                                           ->when($status && $status=="Payment Confirmed",function($db)  {
                                                return $db->where('payment_status',true);
                                            });
    }
}
