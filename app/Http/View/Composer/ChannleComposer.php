<?php


namespace App\Http\View\Composer;


use App\Http\Controllers\lang\LangController;
use Illuminate\View\View;

class ChannleComposer
{
    function compose(View $view)
    {

        $view->with('channels',Channel::orderBy('name')->get());
    }

}
