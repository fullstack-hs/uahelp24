<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Refugeers extends Model
{
    use HasFactory;

    protected $fillable = [
        'phoneNumber',
        'firstName',
        'lastName',
        'secondName',
        'email',
        'region',
        'district',
        'city',
        'temporaryAddress',
        'adults',
        'childs',
        'disabledPersons',
        'pregnantPersons',
        'specialMarks',
        'highlighted',
        'socialNetworks',
        'possibleRelatives'
    ];


    public function relatives(){
        return $this->hasMany(RefugeersRelatives::class, "relativeTo", "id");
    }

    public function helpRequests(){
        return $this->hasMany(RefugeersRequests::class, "refugeerId", "id");
    }

    public function getPossibleRelatives($userData){
        $existingUsers = $this->select(['id','lastName', 'region', 'city', 'district', 'adults', 'childs', 'disabledPersons', 'pregnantPersons'])
            ->where('lastName', 'sounds like', $userData['lastName'])
            ->orWhere(function($query) use ($userData) {
                return $query
                    ->where('city', 'sounds like', $userData['city'])
                    ->where('region', 'sounds like', $userData['region'])
                    ->where('district', 'sounds like', $userData['district']);
            })->get()->all();
        $sameUsers = [];

        $userId = $this->create($userData)->id;
        foreach($existingUsers as $user){
            similar_text($user['lastName'], $userData['lastName'], $percLastName);
            similar_text($user['lastName'], $userData['lastName'], $percCity);
            $familyCheckRestriction = $this->checkIfAbsolutelySame($user, $userData);
            if($percLastName>80 || $percLastName>80 && $percCity>80 || $percCity>80 && $familyCheckRestriction || $percLastName>80 && $familyCheckRestriction) {
                $sameUsers[] = [
                    'userId'=>$userId,
                    'relativeTo' => $user['id'],
                    'lastNameCoincidence'=>$percLastName>80,
                    'lastNameAndCityCoincidence'=>$percLastName>80 && $percCity>80,
                    'FamilyAndCityCoincidence'=>$percCity>80 && $familyCheckRestriction,
                    'lastNameAndFamilyCoincidence'=>$percLastName>80 && $familyCheckRestriction,
                ];
                $sameUsers[] = [
                    'userId'=>$user['id'],
                    'relativeTo' => $userId,
                    'lastNameCoincidence'=>$percLastName>80,
                    'lastNameAndCityCoincidence'=>$percLastName>80 && $percCity>80,
                    'FamilyAndCityCoincidence'=>$percCity>80 && $familyCheckRestriction,
                    'lastNameAndFamilyCoincidence'=>$percLastName>80 && $familyCheckRestriction,
                ];
            }
        }
        foreach($sameUsers as $user){
            $existingUserRelative = RefugeersRelatives::where(['userId'=>$user['userId'], 'relativeTo'=>$user['relativeTo']])->get()->first();
            if(!$existingUserRelative) {
                RefugeersRelatives::create($user);
            }
        }

        return $userId;
    }

    protected function checkIfAbsolutelySame($existingUser, $newUser){
        if(
            $existingUser['adults'] == $newUser['adults'] &&
            $existingUser['childs'] == $newUser['childs'] &&
            $existingUser['disabledPersons'] == $newUser['disabledPersons'] &&
            $existingUser['pregnantPersons'] == $newUser['pregnantPersons']
        ){
            return true;
        }
        return false;
    }

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\RefugeersFactory::new();
    }

    public function getUserIdByPhone($phoneNumber){
        return $this->select(['id'])->where(['phoneNumber'=>$phoneNumber])->get()->first()['id'];
    }

    public function checkDate($userData){
        $user = $this->select(['id'])->where(['phoneNumber'=>$userData['phoneNumber']])->get()->first();
        $refugeRequestModel = new RefugeersRequests();
        $lastIssued = $refugeRequestModel->select(['issueDate'])->where(['refugeerId'=>$user['id'], 'status'=>3])->get()->last();
        return round((time()-$lastIssued['issueDate']) / (60 * 60 * 24));
    }
}
