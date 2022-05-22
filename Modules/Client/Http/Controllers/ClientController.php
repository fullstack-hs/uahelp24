<?php

namespace Modules\Client\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Refugeers;
use Modules\Admin\Entities\RefugeersRequests;
use Modules\Admin\Http\Requests\HelpRegistrationRequestByData;
use Modules\Admin\Http\Requests\HelpRegistrationRequestByPhone;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('client::index');
    }

    public function phone()
    {
        return view('client::phone');
    }

    public function data()
    {
        return view('client::data');
    }

    public function success()
    {
        return view('client::success');
    }

    public function fail()
    {
        return view('client::fail');
    }

    public function storeByPhone(HelpRegistrationRequestByPhone $request){
        $model = new Refugeers();
        $requestData = $request->validated();
        $diff = $model->checkDate($requestData);
        if($diff<21){
            return redirect()->to("/fail");
        }else{
            RefugeersRequests::create([
                'refugeerRequirements'=>$requestData['refugeerRequirements'],
                'refugeerId'=>$model->getUserIdByPhone($requestData['phoneNumber']),
            ]);
        }
    }

    public function store(HelpRegistrationRequestByData $request){
        $model = new Refugeers();
        $id = $model->getPossibleRelatives($request->validated());

        RefugeersRequests::create([
            'refugeerId'=>$id,
            'refugeerRequirements'=>$request->refugeerRequirements ? $request->refugeerRequirements : NULL,
        ]);
        return redirect()->to("/success");
    }

}
