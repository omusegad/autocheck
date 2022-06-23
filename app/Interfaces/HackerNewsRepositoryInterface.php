<?php

namespace App\Interfaces;


interface HackerNewsRepositoryInterface
{

	    /*
	     * Get Top 100 Hacker News Stories
	     * @return Array of IDs
	     */
		public function get_top_stories_ids();

 		/*
	     * Get Item Data for a Story using ID
	     * @return Array of Item Data
	     */
		public function get_item_data_by_id($item_id);

		/*
	     * Get User data for a User using ID
	     * @return Array of User Data
	     */
		public function get_user_data_by_id($user_id);

        /*
	     * Get User data for a User using ID
	     * @return Array of User Data
	     */
        public function getOccuringWords($arr);

        /*
	     * Get User data for a User using ID
	     * @return Array of User Data
	     */
        public function mergeStoriesTitle($getStories);

}


