<?php

namespace App\Repositories\Contracts;

interface UserRepository extends AbstractRepository
{
    public function getUsers($columns = ['*'],  $with = []);
}
