<?php

namespace App\Jobs\User;

use App\Jobs\Job;
use App\Traits\Jobs\UploadableTrait;
use App\Repositories\Contracts\UserRepository;

class Store extends Job
{
    use UploadableTrait;

    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(UserRepository $repository)
    {
        $path = strtolower(class_basename($repository->getModel()));

        if (isset($this->attributes['image'])) {
            $this->attributes['image'] = $this->uploadFile($this->attributes['image'], $path);
        }

        $user = $repository->create($this->attributes);
    }
}
