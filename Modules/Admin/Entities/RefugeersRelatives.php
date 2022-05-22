<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RefugeersRelatives extends Model
{
    use HasFactory;

    protected $fillable = ['userId', 'relativeTo', 'lastNameCoincidence', 'lastNameAndCityCoincidence', 'familyAndCityCoincidence', 'lastNameAndFamilyCoincidence'];

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\RefugeersRelativesFactory::new();
    }

    public function refugee(){
        return $this->hasOne(Refugeers::class ,"id", "userId");
    }

    public function refugeeRelative(){
        return $this->hasOne(Refugeers::class ,"id", "userId");
    }
}
