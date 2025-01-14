<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class PesertaController extends Controller
{
    //Display
    public function index(){
        $allPeserta = Peserta::all();
        return response()->json($allPeserta);
    }

    //store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_event' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'telepon' => 'required',
        ]);

        $userId = Auth::id();

        $eventId = $validatedData['id_event'];

        $event = Event::find($eventId);

        if (!$event || $event->id_user !== $userId) {
            return response()->json(['message' => 'Event tidak ditemukan'], 403);
        }

        $peserta = Peserta::create([
            'id_user' => $userId,
            'id_event' => $validatedData['id_event'],
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'telepon' => $validatedData['telepon'],
        ]);

        return response()->json([
            'message' => 'Berhasil created Peserta',
            'post' => $peserta,
        ], 201);
    }

    //Update 
    public function update(Request $request, string $id)
    {
        $peserta = Peserta::find($id);

        if (!$peserta) {
            return response()->json(['message' => 'Peserta tidak ditemukan'], 403);
        }

        $validatedData = $request->validate([
            'id_event' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'telepon' => 'required',
        ]);

        $userId = Auth::id();

        $eventId = $validatedData['id_event'];

        $event = Event::find($eventId);

        if (!$event || $event->id_user !== $userId) {
            return response()->json(['message' => 'Event tidak ditemukan'], 403);
        }

        $peserta->update($validatedData);

        return response()->json([
            'message' => 'Berhasil mengupdate Peserta',
            'post' => $peserta,
        ], 201);
    }

    public function destroy(string $id)
    {
        $userId = Auth::id();

        $peserta = Peserta::find($id);

        if (!$peserta) {
            return response()->json(['message' => 'Peserta tidak ditemukan atau anda tidak login'], 403);
        }

        $peserta->delete();

        return response()->json(['message' => 'Peserta berhasil di hapus.']);
    }
}
