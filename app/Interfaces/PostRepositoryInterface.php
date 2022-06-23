<?php

namespace App\Interfaces;


interface PostRepositoryInterface
{
    public function getPosts();
    public function getPostCategories();
    public function store($validated);

}


