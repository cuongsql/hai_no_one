<?php

namespace App\Http\Services\Impl;

use App\Http\Services\ServiceInterface;

abstract class ServiceImpl implements ServiceInterface
{
    public function upload($request)
    {
        if (!$request->hasFile('image')) {
            $image_name = 'images/no_image.jpg';
        } else {
            $image = $request->file('image');
            $image_name = 'images/' . date('d-m-Y_H:i:s') . '.' . $image->getClientOriginalName();
            $image->storeAs('public/', $image_name);
        }
        return $image_name;
    }
}
