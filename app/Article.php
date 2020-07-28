<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
   protected $guarded = []; 

   public function path()
   {
      return route('articles.show', $this);
   }

   public function user()
   {
      return $this->belongsTo(User::class);
   }

   public function author()
   {
      return $this->belongsTo(User::class, 'user_id'); 
      // in this case we need to pass the foreign key as an argument because Laravel 
      // expects a certain convention to be followed
   }

   public function tags()
   {
      return $this->belongsToMany(Tag::class);
   }
}
