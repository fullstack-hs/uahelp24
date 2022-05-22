<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\GivingPoints;
use Modules\Admin\Http\Requests\GivingPointCreateRequests;
use Modules\Admin\Http\Requests\GivingPointEditRequests;

class GivingPointsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data = GivingPoints::latest()->paginate(20);

        return view('admin::givingpoints.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::givingpoints.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param GivingPointCreateRequests $request
     * @return Renderable
     */
    public function store(GivingPointCreateRequests $request)
    {
        GivingPoints::create($request->validated());

        return redirect('/admin/giving-points');
    }

    /**
     * Show the specified resource.
     * @param GivingPoints $givingPoint
     * @return Renderable
     */
    public function show(GivingPoints $givingPoint)
    {
        return view('admin::givingpoints.show', compact('givingPoint'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param GivingPoints $givingPoint
     * @return Renderable
     */
    public function edit(GivingPoints $givingPoint)
    {
        return view('admin::givingpoints.edit', compact('givingPoint'));
    }

    /**
     * Update the specified resource in storage.
     * @param GivingPointEditRequests $request
     * @param GivingPoints $givingPoint
     * @return void
     */
    public function update(GivingPointEditRequests $request, GivingPoints $givingPoint)
    {
        $givingPoint->update($request->validated());
        return redirect()->route('giving-points.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param GivingPoints $givingPoint
     * @return Renderable
     */
    public function destroy(GivingPoints $givingPoint)
    {
        $givingPoint->delete();

        return redirect()->route('giving-points.index');
    }
}
