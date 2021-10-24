<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class OrdersChart extends Component
{

    public $date;
    public $filterno=10;

   public function mount()
   {
              
   }

    public function render()
    {
        $searchmonth=Carbon::parse($this->date)->format('m');

         $overallorderamount=Order::when($this->date,function($query) use($searchmonth){
                    return $query->whereMonth('orders.created_at',$searchmonth)->whereYear('orders.created_at','2021');
                })->sum('total_amount');

        

            
        $customers=Customer::leftJoin('orders', 'customers.id', '=', 'orders.customer_id')
                ->select('customers.*',DB::raw('sum(orders.total_amount) as total_orders','orders.created_at') )
                ->groupBy('customers.id')
                ->when($this->date,function($query) use($searchmonth){
                    return $query->whereMonth('orders.created_at',$searchmonth)->whereYear('orders.created_at','2021');
                })
                ->orderBy('total_orders','desc')->get()->take($this->filterno);


            $column= (new ColumnChartModel())
                ->setTitle('Top Orders By Customer');
                
            $columnLineChart=(new LineChartModel())->singleLine();
            
             $pieChart=(new PieChartModel())->setTitle("Total Orders By Customers in Percentage");

 


            foreach($customers as $customer){
                $column->addColumn($customer->name,$customer->total_orders,'#'.rand(888888,999999));
                $pieChart->addSlice($customer->name,$customer->total_orders/$overallorderamount*100,'#'.rand(777777,999999));
                $columnLineChart->addPoint($customer->name, $customer->total_orders);
            }

        return view('livewire.admin.orders-chart',[
            'columnChartModel'=> $column,
            'lineChartModel'=> $columnLineChart,
            'pieChartModel'=>$pieChart
            
        ]);
    }
}
