<?php

namespace AdiFaidz\Base;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use AdiFaidz\Base\Traits\TableInfoTrait;

class BaseUser extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use TableInfoTrait;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('basetrust.users_table');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userprofile()
    {
        return $this->hasOne(config('basetrust.userprofile'), config('basetrust.user_foreign_key'));
    }
}
