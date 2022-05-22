<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GivingPoints extends Model
{
    use HasFactory;

    protected $fillable = ['pointName', 'pointAdress'];
    protected $table = "giving_points";


    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\GivingPointsFactory::new();
    }

    public function point(){
        return $this->hasOne(RefugeersRequests::class, 'givingPointId', 'id');
    }
}
