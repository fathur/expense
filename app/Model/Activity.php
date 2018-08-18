<?php
/**
 * Created by PhpStorm.
 * User: fathur
 * Date: 18/08/18
 * Time: 10.29
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['name', 'type'];

    public function stories()
    {
        return $this->hasMany(Story::class);
    }

    public function scopeNameLike($query, $name)
    {
        $name = trim($name);
        return $query->whereRaw("lower(name) like '%{$name}%'");
    }
}
