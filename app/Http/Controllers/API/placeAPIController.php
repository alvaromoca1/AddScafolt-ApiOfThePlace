<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateplaceAPIRequest;
use App\Http\Requests\API\UpdateplaceAPIRequest;
use App\Models\place;
use App\Repositories\placeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class placeController
 * @package App\Http\Controllers\API
 */

class placeAPIController extends AppBaseController
{
    /** @var  placeRepository */
    private $placeRepository;

    public function __construct(placeRepository $placeRepo)
    {
        $this->placeRepository = $placeRepo;
    }

    /**
     * Display a listing of the place.
     * GET|HEAD /places
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $places = $this->placeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($places->toArray(), 'Places retrieved successfully');
    }

    /**
     * Store a newly created place in storage.
     * POST /places
     *
     * @param CreateplaceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateplaceAPIRequest $request)
    {
        $input = $request->all();

        $place = $this->placeRepository->create($input);

        return $this->sendResponse($place->toArray(), 'Place saved successfully');
    }

    /**
     * Display the specified place.
     * GET|HEAD /places/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var place $place */
        $place = $this->placeRepository->find($id);

        if (empty($place)) {
            return $this->sendError('Place not found');
        }

        return $this->sendResponse($place->toArray(), 'Place retrieved successfully');
    }

    /**
     * Update the specified place in storage.
     * PUT/PATCH /places/{id}
     *
     * @param int $id
     * @param UpdateplaceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateplaceAPIRequest $request)
    {
        $input = $request->all();

        /** @var place $place */
        $place = $this->placeRepository->find($id);

        if (empty($place)) {
            return $this->sendError('Place not found');
        }

        $place = $this->placeRepository->update($input, $id);

        return $this->sendResponse($place->toArray(), 'place updated successfully');
    }

    /**
     * Remove the specified place from storage.
     * DELETE /places/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var place $place */
        $place = $this->placeRepository->find($id);

        if (empty($place)) {
            return $this->sendError('Place not found');
        }

        $place->delete();

        return $this->sendResponse($id, 'Place deleted successfully');
    }
}
