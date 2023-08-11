<?php

namespace App\Repositories\Item;

use App\Repositories\BaseRepository;

class ItemRepository extends BaseRepository implements ItemRepositoryInterface
{
    // get corresponding model
    public function getModel()
    {
        return \App\Models\Item::class;
    }

    // implement interface to get 5 recent items
    public function getItem()
    {
        return $this->model->select('name')->take(5)->get();
    }

    // implement interface to validate data
    public function validate($request, $access = [])
    {
        $inputs = [
            'input-name' => 'required',
            'input-description' => 'required',
            'input-price' => 'required',
            'input-thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'input-category' => 'required',
        ];
        if (!empty($access['excepts'])) {
            $inputs = array_diff_key($inputs, array_flip($access['excepts']));
        }
        if (!empty($access['only'])) {
            $inputs = array_intersect_key($inputs, array_flip($access['only']));
        }
        $request->validate($inputs);
    }
}
