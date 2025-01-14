<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EventController extends Controller
{
    //Display
    public function index(){
        $allEvent = Event::all();
        return response()->json($allEvent);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_event' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'lokasi' => 'required',
        ]);
    
        $userId = Auth::id();
    
        $tanggalMulai = $request->input('tanggal_mulai');
        if (strpos($tanggalMulai, 'T') !== false) {
            $tanggalMulai = Carbon::parse($tanggalMulai)->toDateTimeString(); 
        } else {
            $tanggalMulai = Carbon::parse($tanggalMulai)->toDateString();
        }

        $tanggalSelesai = $request->input('tanggal_selesai');
        if (strpos($tanggalSelesai, 'T') !== false) {
            $tanggalSelesai = Carbon::parse($tanggalSelesai)->toDateTimeString(); 
        } else {
            $tanggalSelesai = Carbon::parse($tanggalSelesai)->toDateString(); 
        }
    
        $event = Event::create([
            'id_user' => $userId,
            'nama_event' => $validatedData['nama_event'],
            'deskripsi' => $validatedData['deskripsi'],
            'tanggal_mulai' => $tanggalMulai,
            'tanggal_selesai' => $tanggalSelesai,
            'lokasi' => $validatedData['lokasi'],
        ]);
    
        return response()->json([
            'message' => 'Post created successfully',
            'post' => $event,
        ], 201);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama_event' => 'required',
            'deskripsi' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'lokasi' => 'required',
        ]);
    
        $userId = Auth::id();
        $event = Event::find($id);
    
        if (!$event || $event->id_user !== $userId) {
            return response()->json(['message' => 'Event tidak ditemukan atau Anda tidak memiliki akses'], 403);
        }

        $tanggalMulai = $request->input('tanggal_mulai');
        if (strpos($tanggalMulai, 'T') !== false) {
            $tanggalMulai = Carbon::parse($tanggalMulai)->toDateTimeString(); 
        } else {
            $tanggalMulai = Carbon::parse($tanggalMulai)->toDateString(); 
        }
    
        $tanggalSelesai = $request->input('tanggal_selesai');
        if (strpos($tanggalSelesai, 'T') !== false) {
            $tanggalSelesai = Carbon::parse($tanggalSelesai)->toDateTimeString(); 
        } else {
            $tanggalSelesai = Carbon::parse($tanggalSelesai)->toDateString();
        }

        $event->update([
            'nama_event' => $validatedData['nama_event'],
            'deskripsi' => $validatedData['deskripsi'],
            'tanggal_mulai' => $tanggalMulai,
            'tanggal_selesai' => $tanggalSelesai,
            'lokasi' => $validatedData['lokasi'],
        ]);
    
        return response()->json([
            'message' => 'Event berhasil diperbarui',
            'event' => $event,
        ], 200);
    }

    public function destroy(string $id)
    {
        $userId = Auth::id();

        $event = Event::find($id);

        if (!$event || $event->id_user !== $userId) {
            return response()->json(['message' => 'event tidak ditemukan atau anda tidak login'], 403);
        }

        $event->delete();

        return response()->json(['message' => 'Event berhasil di hapus.']);
    }

    //search
    public function search(Request $request)
    {
        $query = $request->input('nama_event');
        $searchEvent = Event::where('nama_event', 'like', "%{$query}%")->get();

        if ($searchEvent->isEmpty()) {
            return response()->json(['message' => 'Event tidak ditemukan'], 404);
        }
        
        return response()->json([
            'message' => 'Event ditemukan',
            'data' => $searchEvent,
        ]);
    }
    

}
