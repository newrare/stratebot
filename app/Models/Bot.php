<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bot extends Model
{
    protected $fillable = ['name', 'description', 'image', 'boss'];



    public static function rules(): array
    {
        return array(
            'name'          => 'required|string|unique:bots|min:2|max:100',
            'description'   => 'required|string|max:1000',
            'image'         => 'required|url',
            'boss'          => 'required|boolean'
        );
    }
}
