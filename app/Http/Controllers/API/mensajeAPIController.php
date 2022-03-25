<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatemensajeAPIRequest;
use App\Http\Requests\API\UpdatemensajeAPIRequest;
use App\Models\mensaje;
use App\Repositories\mensajeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class mensajeController
 * @package App\Http\Controllers\API
 */

class mensajeAPIController extends AppBaseController
{
    /** @var  mensajeRepository */
    private $mensajeRepository;

    public function __construct(mensajeRepository $mensajeRepo)
    {
        $this->mensajeRepository = $mensajeRepo;
    }

    /**
     * Display a listing of the mensaje.
     * GET|HEAD /mensajes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->mensajeRepository->pushCriteria(new RequestCriteria($request));
        $this->mensajeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $mensajes = $this->mensajeRepository->all();

        return $this->sendResponse($mensajes->toArray(), 'Mensajes retrieved successfully');
    }

    /**
     * Store a newly created mensaje in storage.
     * POST /mensajes
     *
     * @param CreatemensajeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatemensajeAPIRequest $request)
    {
        $input = $request->all();

        $mensajes = $this->mensajeRepository->create($input);

        return $this->sendResponse($mensajes->toArray(), 'Mensaje saved successfully');
    }

    /**
     * Display the specified mensaje.
     * GET|HEAD /mensajes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var mensaje $mensaje */
        $mensaje = $this->mensajeRepository->findWithoutFail($id);

        if (empty($mensaje)) {
            return $this->sendError('Mensaje not found');
        }

        return $this->sendResponse($mensaje->toArray(), 'Mensaje retrieved successfully');
    }

    /**
     * Update the specified mensaje in storage.
     * PUT/PATCH /mensajes/{id}
     *
     * @param  int $id
     * @param UpdatemensajeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemensajeAPIRequest $request)
    {
        $input = $request->all();

        /** @var mensaje $mensaje */
        $mensaje = $this->mensajeRepository->findWithoutFail($id);

        if (empty($mensaje)) {
            return $this->sendError('Mensaje not found');
        }

        $mensaje = $this->mensajeRepository->update($input, $id);

        return $this->sendResponse($mensaje->toArray(), 'mensaje updated successfully');
    }

    /**
     * Remove the specified mensaje from storage.
     * DELETE /mensajes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var mensaje $mensaje */
        $mensaje = $this->mensajeRepository->findWithoutFail($id);

        if (empty($mensaje)) {
            return $this->sendError('Mensaje not found');
        }

        $mensaje->delete();

        return $this->sendResponse($id, 'Mensaje deleted successfully');
    }

    public function getmsg()
    {

        // $this->mensajeRepository->pushCriteria(new RequestCriteria($request));
        // $this->mensajeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $mensajes = $this->mensajeRepository->first();

        return response()->json($mensajes);

    }



}

