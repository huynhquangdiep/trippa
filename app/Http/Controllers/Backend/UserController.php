<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\UserRequest;
use App\Repositories\Contracts\UserRepository;
use App\Services\Contracts\UserService;

class UserController extends BackendController
{
    protected $dataSelect = ['id', 'userName', 'email'];

    protected $roleList;

    public function __construct(UserRepository $user)
    {
        parent::__construct($user);
    }

    public function getDataWithRole($role)
    {
        $this->before('index');

        return $this->getData($items);
    }

    public function index()
    {
        $this->before(__FUNCTION__);
        parent::index();

        return $this->viewRender();
    }

    public function role($role)
    {
        $this->before('index');

        return $this->index();
    }

    public function create()
    {
        $this->before(__FUNCTION__);
        parent::create();

        return $this->viewRender();
    }

    public function store(UserRequest $request, UserService $service)
    {
        $this->before(__FUNCTION__);
        $data = $request->all();

        return $this->storeData($data, $service);
    }

    public function show($id)
    {
        parent::show($id);
        $this->before(__FUNCTION__, $this->compacts['item']);

        return $this->viewRender();
    }

    public function edit($id)
    {
        parent::edit($id);
        $this->before(__FUNCTION__, $this->compacts['item']);

        return $this->viewRender();
    }

    public function update(UserRequest $request, UserService $service, $id)
    {
        $data = $request->all();
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);

        return $this->updateData($data, $service, $entity);
    }

    public function destroy(UserService $service, $id)
    {
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);

        return $this->deleteData($service, $entity);
    }
}
