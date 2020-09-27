<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//bkhleh y extend mn class el Authenticatable w bakhod ba2et el code copy mn file el User.php,
//baro7 3la file el auth.php w azwod guard fe array el guards esmo admin wel prodiver enta3o hykon admins.
//ha7ot fe array el providers hazwod prodiver ll admin
//ha7ot fe array el passwords array esmo admins
class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'email', 'password',
    ];

    protected $hidden = [
        'password',
    ];
}
