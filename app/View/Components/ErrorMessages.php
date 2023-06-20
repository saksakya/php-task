<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class ErrorMessages extends Component
{
    // public ViewErrorBag $errors;

    // public function __construct(ViewErrorBag $errors)
    // {
    //     $this->errors = $errors;
    // }

    public function __construct(
        public ViewErrorBag $errors
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.error-messages');
    }
}
