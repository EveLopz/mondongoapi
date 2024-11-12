<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $history = Historial::all();
        return response()->json($history);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function insertarDocumento(Request $request)
    {
        $documento = [
            'usuarioId' => $request->usuarioId,
            'trabajadorId' => $request->trabajadorId,
            'tipoTrabajo' => $request->tipoTrabajo,
            'descripcion' => $request->descripcion,
            'calificacion' => (int) $request->calificacion,
            'fechaRealizacion' =>$request->fechaRealizacion,
            'comentarios' => $request->comentarios,
        ];

        $solicitud = Historial::create($documento);

        return response()->json(['message' => 'Documento insertado con éxito', 'data' => $solicitud]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $sol = Historial::where('usuarioId', $id)->get();
        return response()->json($sol);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Trabajador no encontrado'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
