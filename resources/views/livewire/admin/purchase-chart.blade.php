<div>
        <input type="month"  class="mx-10" wire:model="date"  min="2019-01" />
            <div style="height:500px">
            <livewire:livewire-column-chart
                key="{{ $columnChartModel->reactiveKey() }}"
                :column-chart-model="$columnChartModel"
            />
        </div>
            <div style="height:500px">
            <livewire:livewire-pie-chart
                key="{{ $pieChartModel->reactiveKey() }}"
                :pie-chart-model="$pieChartModel"
            />
        </div>
</div>
