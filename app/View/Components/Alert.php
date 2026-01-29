<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Alert extends Component
{
    public $type;
    public $dismissible;
    public $icon;

    public function __construct($type = 'primary', $dismissible = false, $icon = null)
    {
        $this->type = $type;
        $this->dismissible = filter_var($dismissible, FILTER_VALIDATE_BOOLEAN);
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
