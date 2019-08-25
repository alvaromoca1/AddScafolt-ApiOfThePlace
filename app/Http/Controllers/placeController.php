<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateplaceRequest;
use App\Http\Requests\UpdateplaceRequest;
use App\Repositories\placeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class placeController extends AppBaseController
{
    /** @var  placeRepository */
    private $placeRepository;

    public function __construct(placeRepository $placeRepo)
    {
        $this->placeRepository = $placeRepo;
    }

    /**
     * Display a listing of the place.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $places = $this->placeRepository->all();

        return view('places.index')
            ->with('places', $places);
    }

    /**
     * Show the form for creating a new place.
     *
     * @return Response
     */
    public function create()
    {
        return view('places.create');
    }

    /**
     * Store a newly created place in storage.
     *
     * @param CreateplaceRequest $request
     *
     * @return Response
     */
    public function store(CreateplaceRequest $request)
    {
        $input = $request->all();

        $place = $this->placeRepository->create($input);

        Flash::success('Place saved successfully.');

        return redirect(route('places.index'));
    }

    /**
     * Display the specified place.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $place = $this->placeRepository->find($id);

        if (empty($place)) {
            Flash::error('Place not found');

            return redirect(route('places.index'));
        }

        return view('places.show')->with('place', $place);
    }

    /**
     * Show the form for editing the specified place.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $place = $this->placeRepository->find($id);

        if (empty($place)) {
            Flash::error('Place not found');

            return redirect(route('places.index'));
        }

        return view('places.edit')->with('place', $place);
    }

    /**
     * Update the specified place in storage.
     *
     * @param int $id
     * @param UpdateplaceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateplaceRequest $request)
    {
        $place = $this->placeRepository->find($id);

        if (empty($place)) {
            Flash::error('Place not found');

            return redirect(route('places.index'));
        }

        $place = $this->placeRepository->update($request->all(), $id);

        Flash::success('Place updated successfully.');

        return redirect(route('places.index'));
    }

    /**
     * Remove the specified place from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $place = $this->placeRepository->find($id);

        if (empty($place)) {
            Flash::error('Place not found');

            return redirect(route('places.index'));
        }

        $this->placeRepository->delete($id);

        Flash::success('Place deleted successfully.');

        return redirect(route('places.index'));
    }
}
