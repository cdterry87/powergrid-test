<?php

namespace App\Livewire;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class EmployeesTable extends PowerGridComponent
{
    public function setUp(): array
    {
        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Employee::query();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('email')
            ->add('department')
            ->add('gender')
            ->add('active');
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->searchable()
                ->sortable(),
            Column::make('Email', 'email')
                ->searchable()
                ->sortable(),
            Column::make('Department', 'department')
                ->searchable()
                ->sortable(),
            Column::make('Gender', 'gender')
                ->sortable(),
            Column::make('Active', 'active')
                ->sortable(),

            // Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::select('department', 'department')
                ->dataSource(
                    Employee::query()
                        ->select('department')
                        ->distinct()
                        ->get()
                )
                ->optionValue('department')
                ->optionLabel('department'),
            Filter::select('gender', 'gender')
                ->dataSource(
                    Employee::query()
                        ->select('gender')
                        ->distinct()
                        ->get()
                )
                ->optionValue('gender')
                ->optionLabel('gender'),
            Filter::select('active', 'active')
                ->dataSource(
                    Employee::query()
                        ->select('active')
                        ->distinct()
                        ->get()
                )
                ->optionValue('active')
                ->optionLabel('active'),
        ];
    }

    // #[\Livewire\Attributes\On('edit')]
    // public function edit($rowId): void
    // {
    //     $this->js('alert(' . $rowId . ')');
    // }

    // public function actions(Employee $row): array
    // {
    //     return [
    //         Button::add('edit')
    //             ->slot('Edit: ' . $row->id)
    //             ->id()
    //             ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
    //             ->dispatch('edit', ['rowId' => $row->id])
    //     ];
    // }

    /*
    public function actionRules(Employee $row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
