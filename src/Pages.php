<?php

namespace Benaaacademy\Pages;

use Illuminate\Support\Facades\Auth;
use Navigation;
use URL;

class Pages extends \Benaaacademy\Platform\Plugin
{

    /*
     * @var array
     */
    protected $dependencies = [
        "tags" => \Benaaacademy\Tags\Tags::class
    ];

    protected $permissions = [
        "manage"
    ];

    function boot()
    {

        parent::boot();

        Navigation::menu("sidebar", function ($menu) {

            if (Auth::user()->can("pages.manage")) {
                $menu->item('pages', trans("admin::common.pages"), route("admin.pages.show"))
                    ->order(5.5)
                    ->icon("fa-file-text-o");
            }
        });
    }
}
