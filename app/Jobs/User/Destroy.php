<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use Illuminate\Database\Eloquent\Model;

class Destroy extends Job
{
    protected $entity;

    public function __construct(Model $entity)
    {
        $this->entity = $entity;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(array $ids)
    {
        $repository->destroy($ids);
    }
}
