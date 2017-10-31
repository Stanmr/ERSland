<?php

namespace App\Http\Controllers\Proyecto;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Proyecto;
use Illuminate\Http\Request;
use Session;
use Auth;
use Image;

class ProyectosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $proyectos = Proyecto::where('nombre', 'LIKE', "%$keyword%")
				->orWhere('descripcion', 'LIKE', "%$keyword%")
				->orWhere('url', 'LIKE', "%$keyword%")
				->orWhere('picture_url', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $proyectos = Proyecto::paginate($perPage);
        }

        return view('proyectos.proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if(Auth::user()->current_team_id ==null){
            return redirect('teams/create');
        }
        return view('proyectos.proyectos.create');
    }

    public function equipo(){
        $teamModel = config('teamwork.team_model');
        return $teamModel->name::where('id', Auth::user()->current_team_id);
    }
        

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $foto_url = $request->file('picture_url');
        $filename = time() . '.' . $foto_url->getClientOriginalExtension();
        Image::make($foto_url)->resize(400, 250)->save(public_path('/uploads/proyectos/' . $filename));

        $propuesta = $request->file('propuesta');
        $nombre_archivo = time() . '.' . $propuesta->getClientOriginalExtension();
        $propuesta ->move(base_path() . '/public/uploads/propuestas/' , $nombre_archivo);
        




        $requestData = $request->all();
        
        $proyecto = Proyecto::create([
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion'],
            'url' => $request['url'],
            'picture_url' => $filename,
            'propuesta' => $nombre_archivo,
        ]);



        $teamModel = config('teamwork.team_model');
        $teamModel::where('id', Auth::user()->current_team_id)
                    ->update(['proyectos_id' =>$proyecto->id ]);

        Session::flash('flash_message', 'Proyecto added!');

        return redirect('proyectos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $proyecto = Proyecto::findOrFail($id);

        return view('proyectos.proyectos.show', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $proyecto = Proyecto::findOrFail($id);

        return view('proyectos.proyectos.edit', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $requestData = $request->all();
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->nombre = $request->nombre;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->url = $request->url;

        if($request->hasFile('picture_url')){
            $foto_url = $request->file('picture_url');
            $filename = time() . '.' . $foto_url->getClientOriginalExtension();
            Image::make($foto_url)->resize(680, 480)->save(public_path('/uploads/proyectos/' . $filename));
            $proyecto -> picture_url = $filename;
        }else{
            $proyecto->picture_url = $proyecto->picture_url;
        }

        if($request->hasFile('propuesta')){
            $propuesta = $request->file('propuesta');
            $nombre_archivo = time() . '.' . $propuesta->getClientOriginalExtension();
            $propuesta ->move(base_path() . '/public/uploads/propuestas/' , $nombre_archivo);
            $proyecto -> propuesta = $nombre_archivo;
        }else{
            $proyecto->propuesta = $proyecto->propuesta;
        }



        $proyecto->update();
        
        

        Session::flash('flash_message', 'Proyecto updated!');

        return redirect('proyectos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $teamModel = config('teamwork.team_model');
        $teamModel::where('id', $id)
                    ->update(['proyectos_id' =>null ]);
        Proyecto::destroy($id);

        Session::flash('flash_message', 'Proyecto deleted!');

        return redirect('proyectos');
    }
}
