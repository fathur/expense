<?php
/**
 * Created by PhpStorm.
 * User: fathur
 * Date: 18/08/18
 * Time: 10.29
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = ['activity_id', 'object', 'location', 'money', 'datetime', 'cause'];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
