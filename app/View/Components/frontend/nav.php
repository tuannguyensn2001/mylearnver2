<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;

class nav extends Component
{
    public $navbars;
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->setTrans();
    }

    public function setTrans()
    {
        $this->navbars = trans('nav.items');
        $this->title = trans('nav.title');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.frontend.nav');
    }
}
