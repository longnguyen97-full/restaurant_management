<?php

namespace App\Repositories\Item;

use App\Repositories\RepositoryInterface;

interface ItemRepositoryInterface extends RepositoryInterface
{
    public function getItem();

    public function validate($request, $access = []);
}
