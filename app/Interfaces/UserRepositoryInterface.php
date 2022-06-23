<?php

namespace App\Interfaces;


interface UserRepositoryInterface
{
    //count users
    public function getCoachingLevels();
    public function store($request);
    public function getUserById($id);
    public function getAllSupervisorsAndMentorCoach();
}


