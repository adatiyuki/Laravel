<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //以下が追記
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
    );

    //以下を追加
    //Newsモデルに関連漬け
    public function histories()
    {
        return $this->hasMany('App\History');
    }
}
