<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemensajeRequest;
use App\Http\Requests\UpdatemensajeRequest;
use App\Repositories\mensajeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class mensajeController extends AppBaseController
{
    /** @var  mensajeRepository */
    private $mensajeRepository;

    public function __construct(mensajeRepository $mensajeRepo)
    {
        $this->mensajeRepository = $mensajeRepo;
    }

    /**
     * Display a listing of the mensaje.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->mensajeRepository->pushCriteria(new RequestCriteria($request));
        $mensajes = $this->mensajeRepository->all();

        return view('mensajes.index')
            ->with('mensajes', $mensajes);
    }

    /**
     * Show the form for creating a new mensaje.
     *
     * @return Response
     */
    public function create()
    {
        return view('mensajes.create');
    }

    /**
     * Store a newly created mensaje in storage.
     *
     * @param CreatemensajeRequest $request
     *
     * @return Response
     */
    public function store(CreatemensajeRequest $request)
    {
        $input = $request->all();

        $mensaje = $this->mensajeRepository->create($input);

        Flash::success('Mensaje saved successfully.');

        return redirect(route('mensajes.index'));
    }

    /**
     * Display the specified mensaje.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mensaje = $this->mensajeRepository->findWithoutFail($id);

        if (empty($mensaje)) {
            Flash::error('Mensaje not found');

            return redirect(route('mensajes.index'));
        }

        return view('mensajes.show')->with('mensaje', $mensaje);
    }

    /**
     * Show the form for editing the specified mensaje.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mensaje = $this->mensajeRepository->findWithoutFail($id);

        if (empty($mensaje)) {
            Flash::error('Mensaje not found');

            return redirect(route('mensajes.index'));
        }

        return view('mensajes.edit')->with('mensaje', $mensaje);
    }

    /**
     * Update the specified mensaje in storage.
     *
     * @param  int              $id
     * @param UpdatemensajeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemensajeRequest $request)
    {
        $mensaje = $this->mensajeRepository->findWithoutFail($id);

        if (empty($mensaje)) {
            Flash::error('Mensaje not found');

            return redirect(route('mensajes.index'));
        }

        $mensaje = $this->mensajeRepository->update($request->all(), $id);

        Flash::success('Mensaje updated successfully.');

        return redirect(route('mensajes.index'));
    }

    /**
     * Remove the specified mensaje from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mensaje = $this->mensajeRepository->findWithoutFail($id);

        if (empty($mensaje)) {
            Flash::error('Mensaje not found');

            return redirect(route('mensajes.index'));
        }

        $this->mensajeRepository->delete($id);

        Flash::success('Mensaje deleted successfully.');

        return redirect(route('mensajes.index'));
    }


    public function info()
    {
        
        return view('mensajes.info');
    }


    public function getmsg()
    {

        // $this->mensajeRepository->pushCriteria(new RequestCriteria($request));
        // $this->mensajeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $mensajes = $this->mensajeRepository->first();

        return response()->json($mensajes);

    }

    
}
