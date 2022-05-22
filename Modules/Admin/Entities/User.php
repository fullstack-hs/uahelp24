<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'fnamesname',
        'email',
        'password',
        'isAdmin',
    ];

    protected $casts = [
        'isAdmin' => 'boolean',
    ];

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\UserFactory::new();
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
