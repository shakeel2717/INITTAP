<?php

namespace App\Http\Livewire\admin;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class AllAffiliate extends PowerGridComponent
{
    use ActionButton;

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
     * @return Builder<\App\Models\User>
     */
    public function datasource(): Builder
    {
        return User::query();
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
            ->addColumn('id')
            ->addColumn('username')
            ->addColumn('status')
            ->addColumn('account', function (User $model) {
                return $model->userPayment ? $model->userPayment->account : "No Record";
            })
            ->addColumn('phone', function (User $model) {
                return $model->userPayment ? $model->userPayment->phone : "No Record";
            })
            ->addColumn('title', function (User $model) {
                return $model->userPayment ? $model->userPayment->title : "No Record";
            })
            ->addColumn('referrals', function (User $model) {
                return referCount($model->id)->count();
            })
            ->addColumn('balance', function (User $model) {
                return "$" . number_format(referCommission($model->id), 2);
            });
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
            Column::make('ID', 'id')
                ->makeInputRange(),

            Column::make('USERNAME', 'username')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('Referrals', 'referrals')
                ->sortable()
                ->searchable()
                ->makeInputText(),


            Column::make('TITLE', 'title')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('ACCOUNT', 'account')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('PHONE', 'phone')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('Balance', 'balance')
                ->sortable()
                ->searchable()
                ->makeInputText(),

        ];
    }



    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(),
            [
                'approve',
            ]
        );
    }



    public function approve($id)
    {
        // getting this user detail

        $user = User::find($id['id']);
        $balance = referCommission($user->id);
        // inserting withdraw transaction

        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->amount = $balance;
        $transaction->type = "Withdraw Commission";
        $transaction->status = true;
        $transaction->sum = "out";
        $transaction->save();
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid User Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
            Button::make('APPROVE', 'Approve')
                ->class('btn btn-success')
                ->emit('approve', ['id' => 'id'])

            //    Button::make('destroy', 'Delete')
            //        ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
            //        ->route('user.destroy', ['user' => 'id'])
            //        ->method('delete')
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid User Action Rules.
     *
     * @return array<int, RuleActions>
     */


    public function actionRules(): array
    {
        return [

            //Hide button edit for ID 1
            Rule::button('APPROVE')
                ->when(fn ($user) => referCommission($user->id) < 5)
                ->hide(),
        ];
    }
}
