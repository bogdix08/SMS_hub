<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sms extends Model
{
    //
    use SoftDeletes;
    protected $table = 'sms';
    protected $dates = ['deleted_at'];

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function seed()
    {
      return $this->hasOne('App\Seed');
    }
}
