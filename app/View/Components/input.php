<?php

namespace App\View\Components;

use Illuminate\View\Component;

class input extends Component
{
    public $name, $type, $placeholder, $value, $attribute;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $type, $placeholder, $value = null, $attribute = null)
    {
        if ($attribute) {
            $this->attribute = $attribute;
        } else {
            $this->attribute = "";
        }
        if ($value) {
            $this->value = $value;
        } else {
            $this->value = "";
        }
        $this->name = $name;
        $this->type = $type;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
