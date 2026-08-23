<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class StudyRecord extends Model
{
    //fillableはこれらの項目はまとめて登録してもいいよ！という意味
    protected $fillable = [
    'user_id',
    'study_date',
    'category',
    'minutes',
    'memo',
];

public function user()
{
    return $this->belongsTo(User::class);
}

}
