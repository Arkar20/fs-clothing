<div >
    <div class="flex justify-start">
        <select class="mx-10" wire:model="filterno">
            <option value="10">Take Top 10</option>
            <option value="20">Take Top 20</option>
            <option value="40">Take Top 40</option>
            <option value="100">Take Top 100</option>
        </select>
        <input type="month" wire:model="date" min="2020 01"/>
    </div>
    <div style="height:300px">
        <livewire:livewire-column-chart
             key="{{ $columnChartModel->reactiveKey() }}"
             :column-chart-model="$columnChartModel"
         />
    </div>

    <div style="height:300px">
        <livewire:livewire-line-chart
             key="{{ $lineChartModel->reactiveKey() }}"
             :line-chart-model="$lineChartModel"
         />
    </div>
    <div style="height:300px">
        <livewire:livewire-pie-chart
             key="{{ $pieChartModel->reactiveKey() }}"
             :pie-chart-model="$pieChartModel"
         />
    </div>

</div>
