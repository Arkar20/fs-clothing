<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class PurchaseChart extends Component
{
    public $date;
    
    public function render()
    {
        $searchmonth=Carbon::parse($this->date)->format('m');
        // $searchyear=date_format($this->date,'yyyy');

       $suppliers=Supplier::leftJoin('purchases', 'suppliers.id', '=', 'purchases.supplier_id')
                ->select('suppliers.*',DB::raw('sum(purchases.total_amount) as total_purchases','purchases.created_at') )
                ->groupBy('suppliers.id')
                ->when($this->date,function($query) use($searchmonth){
                    return $query->whereMonth('purchases.created_at',$searchmonth)->whereYear('purchases.created_at','2021');
                })
                ->latest()->get();
        
            // dd($query->get());
        //   $suppliers=$query
        //         ->pluck('total_purchases');

        // $total_sales=$suppliers->map(function ($value) {
        //    if(!$value)  return 0;
        //    return $value;
        // });
        //!overall purchases
        $overallpurchase=Purchase::when($this->date,function($query) use($searchmonth){
                    return $query->whereMonth('purchases.created_at',$searchmonth)->whereYear('purchases.created_at','2021');
                })->sum('total_amount');


    $pieChart=(new PieChartModel())->setTitle("Total Purchases By Supplier in Percentage");

    
     $column= (new ColumnChartModel())
                ->setTitle('Total Purchases By Supplier');

                    
           
                foreach($suppliers as $supplier){
                $column->addColumn($supplier->name,$supplier->total_purchases,'#'.rand(888888,999999));
                $pieChart->addSlice($supplier->name,$supplier->total_purchases/$overallpurchase*100,'#'.rand(900000,999999));

            }
            

        return view('livewire.admin.purchase-chart',[
            'columnChartModel'=> $column,
            'pieChartModel'=>$pieChart
            
        ]);
    }
}
