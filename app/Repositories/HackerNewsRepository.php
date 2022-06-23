<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Support\Facades\Http;
use App\Interfaces\HackerNewsRepositoryInterface;

class HackerNewsRepository implements HackerNewsRepositoryInterface
{

	    /*
	     * Get Top 100 Hacker News Stories
	     * @return Array of IDs
	     */

		public function get_top_stories_ids() {
			$res =  Http::get('https://hacker-news.firebaseio.com/v0/topstories.json');
			$data =  $res->json();
			return $data;
		}

 		/*
	     * Get Item Data for a Story using ID
	     * @return Array of Item Data
	     */

		public function get_item_data_by_id($item_id) {
			$item_resource = "https://hacker-news.firebaseio.com/v0/item/" . $item_id . ".json";
            try {
                $res =  Http::get($item_resource);
		     	return $res->json();
            } catch (\Exception $e) {
                $res->json([
                    'status'  => $e->getCode(),
                    'error'  =>  $e->getMessage()
                ]);
            }
		}

		/*
	     * Get User data for a User using ID
	     * @return Array of User Data
	     */

		public function get_user_data_by_id($user_id) {
			$user_resource = "https://hacker-news.firebaseio.com/v0/user/" . $user_id . ".json";
			$res =  Http::get($user_resource);
			$data = $res->json();
			return $data;
		}

        // merge all stories title into a single string
        public function mergeStoriesTitle($getStories){
            $title = [];
            foreach ($getStories as $key => $value) {
                $title [] = $value['title'];
            }
            return $title;
        }

        // Get most recurring words from ids array hackernews API
        public function getOccuringWords($arr){
            $counts = array_count_values(str_word_count(implode(" ",$arr),1));
            arsort($counts);
            return array_slice($counts,0,10,true);;
        }

}
