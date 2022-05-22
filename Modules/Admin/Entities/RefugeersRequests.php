<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RefugeersRequests extends Model
{
    use HasFactory;

    protected $fillable = [
        'refugeerId',
        'refugeerRequirements',
        'status',
        'issueDate',
        'givingPointId'
    ];


    public function human(){
        return $this->belongsTo(Refugeers::class, 'refugeerId', 'id');
    }

    public function point(){
        return $this->hasOne(GivingPoints::class, 'id', 'givingPointId');
    }

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\RefugeersRequestsFactory::new();
    }
}
