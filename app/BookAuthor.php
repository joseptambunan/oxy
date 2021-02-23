<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    public function detail(){
    	return $this->belongsTo("App\Book","book_id");
    }

    public function author(){
    	return $this->belongsTo("App\Author");
    }
}
