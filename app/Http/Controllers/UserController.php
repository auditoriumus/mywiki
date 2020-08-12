<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;

class UserController extends Controller
{
    public $current_path;
    public function __construct()
    {
        $current_path = Route::getFacadeRoot()->current()->uri();
        $this->current_path = $current_path;
    }

}
