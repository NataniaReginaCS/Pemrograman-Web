<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Event;
use App\Models\Tiket;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TiketController extends Controller
{
    // Display
    public function index()
    {
        $allTiket = Tiket::all();
        return response()->json($allTiket);
    }

    // Store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_peserta' => 'required|exists:pesertas,id',
            'id_event' => 'required|exists:events,id',
            'jenis_tiket' => 'required|in:Regular,VIP,Gold Access',
            'kuota' => 'required|integer|min:1|max:3',
        ], [
            'id_peserta.required' => 'ID peserta harus diisi.',
            'id_event.required' => 'ID event harus diisi.',
            'jenis_tiket.required' => 'Jenis tiket harus diisi.',
            'jenis_tiket.in' => 'Jenis tiket hanya boleh Regular, VIP, atau Gold Access.',
            'kuota.required' => 'Kuota harus diisi.',
            'kuota.min' => 'Kuota tidak boleh kurang dari 1.',
            'kuota.max' => 'Kuota tidak boleh lebih dari 3.',
            'id_peserta.exists' => 'Peserta dengan ID tersebut tidak ditemukan.',
            'id_event.exists' => 'Event dengan ID tersebut tidak ditemukan.',
        ]);

        $peserta = Peserta::find($validatedData['id_peserta']);
        $event = Event::find($validatedData['id_event']);
        $userId = Auth::id();

        if (!$peserta) {
            return response()->json(['message' => 'Peserta tidak ditemukan'], 403);
        }

        if (!$event || $event->id_user !== $userId) {
            return response()->json(['message' => 'Event tidak ditemukan'], 403);
        }

        $harga = match ($validatedData['jenis_tiket']) {
            'Regular' => 300000,
            'VIP' => 600000,
            'Gold Access' => 1200000,
        };

        $tiket = Tiket::create([
            'id_peserta' => $validatedData['id_peserta'],
            'id_event' => $validatedData['id_event'],
            'jenis_tiket' => $validatedData['jenis_tiket'],
            'harga' => $harga,
            'kuota' => $validatedData['kuota'],
            'tanggal_transaksi' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
        ]);

        return response()->json([
            'message' => 'Berhasil membuat Tiket',
            'post' => $tiket,
        ], 201);
    }

    // Update
    public function update(Request $request, string $id)
    {
        $tiket = Tiket::find($id);

        if (!$tiket) {
            return response()->json(['message' => 'Tiket tidak ditemukan'], 403);
        }

        // Validasi input
        $validatedData = $request->validate([
            'id_peserta' => 'required|exists:pesertas,id',
            'id_event' => 'required|exists:events,id',
            'jenis_tiket' => 'required|in:Regular,VIP,Gold Access',
            'kuota' => 'required|integer|min:1|max:3',
        ], [
            'id_peserta.required' => 'ID peserta harus diisi.',
            'id_event.required' => 'ID event harus diisi.',
            'jenis_tiket.required' => 'Jenis tiket harus diisi.',
            'jenis_tiket.in' => 'Jenis tiket hanya boleh Regular, VIP, atau Gold Access.',
            'kuota.required' => 'Kuota harus diisi.',
            'kuota.min' => 'Kuota tidak boleh kurang dari 1.',
            'kuota.max' => 'Kuota tidak boleh lebih dari 3.',
            'id_peserta.exists' => 'Peserta dengan ID tersebut tidak ditemukan.',
            'id_event.exists' => 'Event dengan ID tersebut tidak ditemukan.',
        ]);

        $peserta = Peserta::find($validatedData['id_peserta']);
        $event = Event::find($validatedData['id_event']);
        $userId = Auth::id();

        if (!$peserta) {
            return response()->json(['message' => 'Peserta tidak ditemukan'], 403);
        }

        if (!$event || $event->id_user !== $userId) {
            return response()->json(['message' => 'Event tidak ditemukan'], 403);
        }

        $harga = match ($validatedData['jenis_tiket']) {
            'Regular' => 300000,
            'VIP' => 600000,
            'Gold Access' => 1200000,
        };

        $tiket->update([
            'id_peserta' => $validatedData['id_peserta'],
            'id_event' => $validatedData['id_event'],
            'jenis_tiket' => $validatedData['jenis_tiket'],
            'harga' => $harga, 
            'kuota' => $validatedData['kuota'],
            'tanggal_transaksi' => Carbon::now('Asia/Jakarta')->toDateTimeString(),
        ]);

        return response()->json([
            'message' => 'Berhasil mengupdate Tiket',
            'post' => $tiket,
        ], 201);
    }


    public function destroy(string $id)
    {
        $userId = Auth::id();
        $tiket = Tiket::find($id);

        if (!$tiket) {
            return response()->json(['message' => 'Tiket tidak ditemukan'], 403);
        }

        $tiket->delete();

        return response()->json([
            'message' => 'Tiket berhasil dihapus',
            'data' => $tiket,
        ]);
    }

    //search
    public function search(Request $request)
    {
        $query = $request->input('jenis_tiket');
        $searchTiket = Tiket::where('jenis_tiket', 'like', "%{$query}%")->get();

        if ($searchTiket->isEmpty()) {
            return response()->json(['message' => 'Tiket tidak ditemukan'], 403);
        }
        
        return response()->json([
            'message' => 'Tiket ditemukan',
            'data' => $searchTiket,
        ]);
    }
}
