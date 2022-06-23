<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\HackerNewsRepository;

class DashboardController extends Controller
{

    protected $hackerNewsRepository;

    public function __construct(HackerNewsRepository $hackerNewsRepository)
    {
        $this->hackerNewsRepository = $hackerNewsRepository;
    }

    public function index()
    {
        // Get Hacker news by news ids
        $top_stories_ids = $this->hackerNewsRepository->get_top_stories_ids();

        // 25 Stories output from Hacker News API
        $getStories = $this->getStories($top_stories_ids);
       // return $getStories;

        // Sort reverse order by key
        krsort($getStories);

        // Get last twenty five stories
        $twentyFievStories = array_slice($getStories, 0, 25, true);

        /// Get title string before getting repeated words
        $mergedStoryTitle = $this->hackerNewsRepository->mergeStoriesTitle($twentyFievStories);

        // Get most recurring words from strories
        $tenMostReccurringWords = mb_convert_encoding($this->hackerNewsRepository->getOccuringWords($mergedStoryTitle), 'UTF-8', 'UTF-8');

        if (count($tenMostReccurringWords) > 0){
            return response()->json([
                'message' => 'Most occurring words in the titles of the last 25 stories ',
                'data' => $tenMostReccurringWords,
            ]);
        }
        return response()->json([
            'data'  => [
                'error' => 'Oops Sorry something went wrong. Please try again later.',
               ]
        ]);
    }

    // Get stories bby week
    public function byWeek(){
        $storiesIds = $this->hackerNewsRepository->get_top_stories_ids();

        $getStories = $this->getStories($storiesIds);

        $lastWeek =  strtotime("-1 week");
        $current_datetime = strtotime("now");

        $laskWeekStories = array_filter($getStories, function($var) use ($current_datetime, $lastWeek) {
            $evtime = $var['time'];
            return $evtime <= $current_datetime && $evtime >= $lastWeek;
        });

        //Merge all stroies from last week to current date
        $mergedStoryTitle = $this->hackerNewsRepository->mergeStoriesTitle($laskWeekStories);

        // Get most recurring words from strories
        $recur_words = mb_convert_encoding($this->hackerNewsRepository->getOccuringWords($mergedStoryTitle), 'UTF-8', 'UTF-8');

        if (count($recur_words) > 0){
            return response()->json([
                'message' => 'Titles of the post of exactly the last week',
                'data'    => $recur_words,
            ]);
        }


    }


    public function byKarma(){
        // Get Hacker news by news ids
        $top_stories_ids = $this->hackerNewsRepository->get_top_stories_ids();

        // 25 Stories output from Hacker News API
        $getStories = $this->storiesByUser($top_stories_ids);

        return $getStories;

    }


    // Stores by user ids
    private function getStories($stories_ids){
        $stories = [];
        foreach ($stories_ids as $key => $value) {
            $stories[] = $this->hackerNewsRepository->get_item_data_by_id($value);
        }
        return $stories;
    }


    // Get stories from ids array hackernews API
    private function storiesByUser($user_ids){
        $stories = [];
        foreach ($user_ids as $key => $value) {
            $stories[] = $this->hackerNewsRepository->get_user_data_by_id($value);
        }
        return $stories;
    }


}
