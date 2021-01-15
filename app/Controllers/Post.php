<?php

namespace App\Controllers;

class Post extends BaseController
{
    public function adopt()
    {
        $data = [
            'title' => 'Adoption | Inguanku'
        ];
        return view('post/adopt', $data);
    }
    public function breed()
    {
        $data = [
            'title' => 'Breeding | Inguanku'
        ];
        return view('post/breed', $data);
    }
}
