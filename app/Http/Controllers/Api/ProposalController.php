<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Promotion;
use Proposal;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($promotion)
    {
        // Get Proposals to a Promotion
        $proposals = Proposal::propossed($promotion);

        // Paginate proposals
        $proposals = $proposals->paginate();

        return $proposals->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * we dont have a Market Place Invoice Id Yet
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $promotion)
    {
        $proposal = new Proposal();

        // Get Promotion Object
        $promotion = Promotion::findOrFail($promotion);

        // Validate the Proposal Before anything else
        if(! $proposal->validate($request->all()))
        {
            return response($proposal->errors(), 405);
        }

        $proposal->promotion_id = $promotion->id;
        $proposal->user_id = $request->user_id;
        $proposal->total = $promotion->total;

        $proposal->save();

        return $proposal->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($promotion, $id)
    {
        $proposal = Proposal::findOrFail($id);

        return $proposal->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $promotion ,$id)
    {
        // Get Proposal
        $proposal = Proposal::find($id);

        // Verify there is a promotion
        $proposal->promotion()->findOrFail($promotion);

        // Update Proposal
        $proposal->update($request);

        return $proposal->toJson();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($promotion, $id)
    {
        // Verify there is a promotion
        Promotion::findOrFail($promotion);

        // Get the Proposal Object
        $proposal = Proposal::findOrFail($id);

        // Soft Delete the proposal
        $proposal->delete();

        return response(array('Success' => 'Proposal was deleted.'));
    }
}
