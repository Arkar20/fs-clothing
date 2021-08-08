<?php

namespace App\Http\Livewire\Department;

use App\Http\Traits\CloseModelTrait;
use App\Http\Traits\ToastTrait;
use Livewire\Component;
use App\Models\Department;
use Livewire\WithPagination;

class DepartmentSection extends Component
{
    use WithPagination, ToastTrait, CloseModelTrait;

    public $search;
    public $department;
    public $departmentToUpdate;
    public function store()
    {
        Department::create([
            'department' => $this->department,
        ]);
        $this->clearForm();

        $this->closeModal();

        $this->successAlert('New Department Added');
    }
    public function edit(Department $department)
    {
        $this->departmentToUpdate = $department;
        $this->department = $department->department;
    }
    public function update()
    {
        $this->departmentToUpdate->update([
            'department' => $this->department,
        ]);
        $this->clearForm();

        $this->closeModal();

        $this->successAlert('Department Updated');
    }
    public function delete(Department $department)
    {
        $department->delete();
        $this->errorAlert(' Department Deleted');
    }
    public function clearForm()
    {
        $this->department = '';
    }
    public function render()
    {
        return view('livewire.department.department-section', [
            'departments' => Department::FilterSearch(
                'department',
                $this->search
            )
                ->latest()
                ->paginate(10),
            'headers' => Department::first()->getHeaders(),
        ])->layout('admin.app');
    }
}
