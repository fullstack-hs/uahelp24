<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Refugeers;
use Modules\Admin\Entities\Refugeers as Peoples;
use Modules\Admin\Entities\RefugeersRequests;
use Modules\Admin\Http\Requests\RefugeersSpecialMarksRequest;

class PeoplesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data = Peoples::latest()->paginate(20);
        return view('admin::peoples.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    /**
     * Show the specified resource.
     * @param Peoples $people
     * @return Renderable
     */
    public function show(Peoples $people)
    {   $people->load(['relatives', 'helpRequests']);
        return view('admin::peoples.show', compact('people'));
    }

    public function update(RefugeersSpecialMarksRequest $request, Peoples $people){
        $people->update($request->validated());
        return redirect()->route("peoples.show", $people->id);
    }

    public function destroy(Peoples $people)
    {
        $people->delete();

        return redirect()->route('giving-points.index');
    }


}
