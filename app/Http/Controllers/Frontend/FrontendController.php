<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\AbstractController;

abstract class FrontendController extends AbstractController
{
    protected $viewPrefix = 'frontend.';
}
