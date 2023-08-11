<?php

namespace App\Repositories\Blog;

use App\Repositories\BaseRepository;

class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{
    // get corresponding model
    public function getModel()
    {
        return \App\Models\Blog::class;
    }

    // implement interface to get 5 recent blogs
    public function getBlog()
    {
        return $this->model->select('title')->take(5)->get();
    }

    // implement interface to validate data
    public function validate($request, $access = [])
    {
        $inputs = [
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required',
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
