<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{

    protected $primaryKey = 'action_user_id';
    public $incrementing = false;
    protected $table = 'friendship';

    protected $fillable = [
        'user_one', 'user_two', 'status', 'action_user_id'
    ];

    public function actionUser()
    {
        return $this->belongsTo(User::class, 'action_user_id');
    }

}
