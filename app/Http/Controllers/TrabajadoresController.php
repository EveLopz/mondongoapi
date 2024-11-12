<?php

namespace App\Http\Controllers;

use App\Models\Trabajadores;
use Illuminate\Http\Request;
use MongoDB\Laravel\Eloquent\Casts\ObjectId;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TrabajadoresController extends Controller
{
    public function index()
    {
        $trabajadores = Trabajadores::all();
        return response()->json($trabajadores);
    }

   public function store(Request $request)
{
    $request->validate([
        '*.usuarioId' => 'required|string',
        '*.profesion' => 'required|string',
        '*.categorias' => 'required|array',
        '*.calificacion' => 'required|numeric',
        '*.curriculum' => 'required|string',
        '*.cantidadTrabajosRealizados' => 'required|integer',
        '*.aniosExperiencia' => 'required|integer',
        '*.descripcion' => 'required|string',
    ]);

    // Crea cada documento en la colección y deja que MongoDB asigne el _id automáticamente
    $trabajadores = $request->all();
    $trab = new Trabajadores();
    $trab->fill($trabajadores);
    $trab->save();

    return response()->json($trabajadores, 201);
}


    public function show($id)
    {
        try {
            $trab = Trabajadores::findOrFail($id);
        return response()->json($trab);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Trabajador no encontrado'], 404);
        }
    }

    public function insertarDocumento(Request $request)
{
    $documento = [
        'usuarioId' => $request->usuarioId,
        'profesion' => $request->profesion,
        'categorias' => $request->categorias,
        'calificacion' => $request->calificacion,
        'curriculum' => $request->curriculum,
        'cantidadTrabajosRealizados' => $request->cantidadTrabajosRealizados,
        'aniosExperiencia' => $request->aniosExperiencia,
        'descripcion' => $request->descripcion
    ];

    $trabajador = Trabajadores::create($documento);

    return response()->json(['message' => 'Documento insertado con éxito', 'data' => $trabajador]);
}

public function actualizarDocumento(Request $request, $id)
{
    // Buscar el trabajador por su identificador
    $trabajador = Trabajadores::find($id);

    if (!$trabajador) {
        return response()->json([
            'message' => 'Trabajador no encontrado'
        ], 404);  // Código de estado HTTP 404
    }

    if ($request->has('usuarioId')) {
        $trabajador->usuarioId = $request->usuarioId;
    }
    if ($request->has('profesion')) {
        $trabajador->profesion = $request->profesion;
    }
    if ($request->has('categorias')) {
        $trabajador->categorias = $request->categorias;
    }
    if ($request->has('calificacion')) {
        $trabajador->calificacion = $request->calificacion;
    }
    if ($request->has('curriculum')) {
        $trabajador->curriculum = $request->curriculum;
    }
    if ($request->has('cantidadTrabajosRealizados')) {
        $trabajador->cantidadTrabajosRealizados = $request->cantidadTrabajosRealizados;
    }
    if ($request->has('aniosExperiencia')) {
        $trabajador->aniosExperiencia = $request->aniosExperiencia;
    }
    if ($request->has('descripcion')) {
        $trabajador->descripcion = $request->descripcion;
    }

    $trabajador->save();

    return response()->json([
        'message' => 'Documento actualizado con éxito',
        'data' => $trabajador
    ]);
}



    
    public function destroy($id)
    {
        Trabajadores::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}


