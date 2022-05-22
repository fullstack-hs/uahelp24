<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Links extends Model
{
    use HasFactory;

    protected $fillable = ['accessKey'];

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\LinksFactory::new();
    }
}
