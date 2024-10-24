<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable=[
        'code',
        'name'
    ];

    public function scopeSearch($query){
        if(request('key')){
            $key=request('key');
            $query=$query->where('name','like','%'.$key.'%');
        }
        if(request('cat_id')){
            $query=$query->where('category',request('cat_id'));
        }
        return $query;
    }
}
