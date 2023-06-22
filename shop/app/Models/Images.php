<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $table = 'mainImages';    

    public function getAllImages () {
        $data = Images::all();
        return $data;
    } 
}
