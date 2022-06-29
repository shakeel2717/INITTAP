<?php

namespace App\View\Components;

use Illuminate\View\Component;

class orderStatus extends Component
{
    public $cardOrder;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cardOrder)
    {
        $this->cardOrder = $cardOrder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.order-status');
    }
}
