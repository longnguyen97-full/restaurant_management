<?php

namespace App\Repositories\Blog;

use App\Repositories\RepositoryInterface;

interface BlogRepositoryInterface extends RepositoryInterface
{
    // interface to get item
    public function getBlog();

    public function validate($request, $access = []);
}
