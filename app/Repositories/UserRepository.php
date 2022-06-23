<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\CoachLevel;
use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getCoachingLevels()
    {
        try {
            return CoachLevel::latest()->get();
        } catch (\Exception $e) {
            throw new \Exception('No Coaching Levels found. '.$e->getMessage());
        }
    }

    public function store($request)
    {
        try {
            return CoachLevel::latest()->get();
        } catch (\Exception $e) {
            throw new \Exception('No users found. '.$e->getMessage());
        }
    }
    public function getUserById($id){
        try {
            return User::findOrFail($id);
        } catch (\Exception $e) {
            throw new \Exception('No user found. '.$e->getMessage());
        }

    }
    public function getAllSupervisorsAndMentorCoach(){
        try {
            return User::role('coach')->whereHas('coachprofile', function($query) {
                return $query->where('status', 'updated')->where('verify', 'verified');
            })->whereHas('coachlevel', function($query) {
                return $query->where('label','Coach Mentor')->orWhere('label','Coach Supervisor');
            })->with('categories','certification','coachprofile','specialities')->get();
            
        } catch (\Exception $e) {
            throw new \Exception('No user found. '.$e->getMessage());
        }

    }

}
