<?php

namespace Anam\Dashboard\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array(
      'id',
      'created_at',
      'updated_at',
    );

    public function user(){
        return $this->belongsTo(User::class);
    }
}
