<?php

namespace App\Http\Livewire\admin;

use App\Models\Pricing;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\QueryException;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class AllCard extends PowerGridComponent
{
    use ActionButton;

    public $title = null;
    public $category = null;
    public $description = null;
    public $price = null;
    public $status = null;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

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

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\Pricing>
     */
    public function datasource(): Builder
    {
        return Pricing::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('title')
            ->addColumn('category')
            ->addColumn('description')
            ->addColumn('price')
            ->addColumn('img_feature', function (Pricing $model) {
                return '<img src="/assets/cards/' . $model->img . '" width="100px" height="100px">';
            })
            ->addColumn('status')
            ->addColumn('created_at_formatted', fn (Pricing $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('TITLE', 'title')
                ->sortable()
                ->searchable()
                ->editOnClick()
                ->makeInputText(),

            Column::make('CATEGORY', 'category')
                ->sortable()
                ->searchable()
                ->editOnClick()
                ->makeInputText(),

            Column::make('DESCRIPTION', 'description')
                ->sortable()
                ->editOnClick()
                ->searchable(),

            Column::make('PRICE', 'price')
                ->sortable()
                ->searchable()
                ->editOnClick()
                ->makeInputText(),

            Column::make('IMG', 'img_feature'),

            Column::make('STATUS', 'status')
                ->sortable()
                ->toggleable(true, 'active', 'inactive'),

            Column::make('CREATED AT', 'created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Pricing Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
       return [
           Button::make('edit', 'Feature')
               ->class('bg-primary cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('admin.dashboard.feature.show', ['feature' => 'id']),

        //    Button::make('destroy', 'Delete')
        //        ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
        //        ->route('pricing.destroy', ['pricing' => 'id'])
        //        ->method('delete')
        ];
    }



    public function onUpdatedEditable($id, $field, $value): void
    {
        try {
            $updated = Pricing::query()->find($id)->update([
                $field => $value,
            ]);
        } catch (QueryException $exception) {
            $updated = false;
        }


        // Reload data after a successful update
        if ($updated) {
            $this->fillData();
        }
    }


    public function onUpdatedToggleable($id, $field, $value): void
    {
        try {
            $updated = Pricing::query()->find($id)->update([
                $field => $value,
            ]);
        } catch (QueryException $exception) {
            $updated = false;
        }
        // Reload data after a successful update
        if ($updated) {
            $this->fillData();
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Pricing Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($pricing) => $pricing->id === 1)
                ->hide(),
        ];
    }
    */
}
