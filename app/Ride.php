<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Ride extends Model
{
    use Searchable;


    protected $primarykey ='id';


    public function searchableAs()
    {
        return 'rides_index';
    }

    // protected $table = 'rides';
    // public $timestamps = false;
}
