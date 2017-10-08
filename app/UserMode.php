<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 10/8/2017
 * Time: 5:30 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
class UserMode extends Model
{
    protected $table = "users_modes";
    protected $fillable = ['user_id', 'current_mode', 'current_time'];
}