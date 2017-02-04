<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Contracts\UserRepository;

class HomeController extends FrontendController
{
    protected $dataUser = ['*'];

    public function __construct(UserRepository $user)
    {
        parent::__construct($user);
    }

    public function index()
    {
        $this->compacts['users'] = $this->repository->getUsers($this->dataUser);
        $this->view = 'home.index';

        return $this->viewRender();
    }
}
