<?php

namespace App\Repositories;

use App\Review;

class ReviewRepository
{	
	/**
   * Get all reviews.
   *
   * @return Collection
   */
  	public function getList()
  	{
    	return Review::orderBy('created_at', 'asc')
              	->get(['author_name', 'message', 'created_at']);
  	}
}