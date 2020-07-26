<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $type = 'success';
    public $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $message)
    {
        $this->setType($type);
        $this->message = $message;

    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
