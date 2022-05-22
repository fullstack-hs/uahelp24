<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\GivingPoints;
use Illuminate\Database\Eloquent\Builder;
use Modules\Admin\Entities\RefugeersRequests;

class PeopleRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($status=0)
    {
        $data = RefugeersRequests::with(['human'])->where(['status'=>$status])->paginate(20);
        return view('admin::poeplerequests.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('points', GivingPoints::all());
    }


    public function search($status)
    {
        $nameOrPhone = \request()->input('phoneNumberOrName');
        $data = RefugeersRequests::with(['human'])->whereHas('human', function (Builder $query) use ($nameOrPhone) {
            $query->where('lastName', 'like', '%'.$nameOrPhone.'%');
            $query->orWhere('phoneNumber', 'like', '%'.$nameOrPhone.'%');
        })->where(['status'=>$status, 'givingPointId'=>\request()->input('givingPointId')])->paginate(20);
        return view('admin::poeplerequests.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('points', GivingPoints::all());
    }


    public function show($id){
        $requestData = RefugeersRequests::with(['human'])->where(['id'=>$id])->get()->first();
        $requestData['categories']= GivingPoints::get()->all();
        return view("admin::poeplerequests.show", compact("requestData"));
    }

    public function accept(RefugeersRequests $refugeersRequest){
        $refugeersRequest->update(['status'=>1]);
        return redirect()->route("people-requests-list", ['status'=>0]);
    }

    public function update(Request $request, RefugeersRequests $refugeersRequest){
        $refugeersRequest->update(['status'=>2, 'givingPointId'=>$request->givingPointId]);
        return redirect()->route("people-requests-list", ['status'=>1]);
    }

    public function given(RefugeersRequests $refugeersRequest){
        $refugeersRequest->update(['status'=>3, 'issueDate'=>time()]);
        return redirect()->route("people-requests-list", ['status'=>2]);
    }

    public function decline(RefugeersRequests $refugeersRequest){
        $refugeersRequest->update(['status'=>4]);
        return redirect()->route("people-requests-list", ['status'=>0]);
    }

}
