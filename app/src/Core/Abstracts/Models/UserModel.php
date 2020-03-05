<?php


namespace LargeLaravel\Core\Abstracts\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

abstract class UserModel extends Authenticatable
{
    use Notifiable;
}
