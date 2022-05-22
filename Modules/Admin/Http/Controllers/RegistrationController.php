<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Modules\Admin\Entities\Refugeers;
use Modules\Admin\Entities\RefugeersRequests;
use Modules\Admin\Http\Requests\HelpRegistrationRequestByData;
use Modules\Admin\Http\Requests\HelpRegistrationRequestByPhone;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::registration.index');
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function createByPhone ()
    {
        return view('admin::registration.phonereg');
    }

    public function storeByPhone(HelpRegistrationRequestByPhone $request){
        $model = new Refugeers();
        $requestData = $request->validated();
        $diff = $model->checkDate($requestData);
        if($diff<21){
            return view('admin::registration.fail');
        }else{
            RefugeersRequests::create([
                'refugeerRequirements'=>$requestData['refugeerRequirements'],
                'refugeerId'=>$model->getUserIdByPhone($requestData['phoneNumber']),
                'issueDate'=>$requestData['issueDate'] ? strtotime($requestData['issueDate']) : NULL,
                'status'=>$requestData['status']
            ]);
        }
    }

    public function fail ()
    {

        return view('admin::registration.fail');
    }
    public function create ()
    {

        return view('admin::registration.datareg');
    }

    public function store(HelpRegistrationRequestByData $request){
        $model = new Refugeers();
        $id = $model->getPossibleRelatives($request->validated());

        RefugeersRequests::create([
            'refugeerId'=>$id,
            'refugeerRequirements'=>$request->refugeerRequirements ? $request->refugeerRequirements : NULL,
            'status'=>$request->status,
            'issueDate'=>$request->issueDate ? strtotime($request->issueDate) : NULL,
        ]);
        return redirect()->to("admin/peoples");
    }


}
