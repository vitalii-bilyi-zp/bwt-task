<?php

namespace App\Repositories;

use App\Review;

class ReviewRepository
{
  public function getList()
  {
    return Review::orderBy('created_at', 'asc')
              ->get(['author_name', 'message', 'created_at']);
  }
}