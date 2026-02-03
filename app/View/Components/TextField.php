<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextField extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        private $type,
        private $name,
        private $label,
        private $value,
        private $placeholder,
    ) {
        dd($name);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data = [
            'type' => $this->type,
            'name' => $this->name,
            'value' => $this->value,
            'label' => $this->label,
            'place-holder' => $this->placeholder
        ];
        return view('components.text-field', compact('data'));
    }
}
