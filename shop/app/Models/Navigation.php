<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $table = 'navigation';    
    
    
    public function getAllNavigation () {
        $data = Navigation::all();
        return $data;
    } 
}
