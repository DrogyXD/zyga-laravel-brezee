<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssistanceRequest;
use Illuminate\Support\Facades\DB;

class AssistanceRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'service_area_id' => 'required|exists:service_areas,id',
            'vehicle_id' => 'nullable|exists:vehicles,id',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
            'direccion_referencia' => 'nullable|string|max:255',
        ]);

        return DB::transaction(function () use ($request) {

            // Generar folio automático
            $lastId = AssistanceRequest::max('id') ?? 0;
            $nextId = $lastId + 1;

            $folio = 'ZYG-' . date('Y') . '-' . str_pad($nextId, 6, '0', STR_PAD_LEFT);

            $assistance = AssistanceRequest::create([
                'folio' => $folio,
                'user_id' => $request->user()->id,
                'service_id' => $request->service_id,
                'service_area_id' => $request->service_area_id,
                'vehicle_id' => $request->vehicle_id,
                'latitud' => $request->latitud,
                'longitud' => $request->longitud,
                'direccion_referencia' => $request->direccion_referencia,
                'estatus' => 'creada',
            ]);

            return response()->json([
                'message' => 'Solicitud creada correctamente.',
                'data' => $assistance
            ], 201);
        });
    }
}
