<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contents;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    /**
     * Get all comments for a specific content.
     */
    public function index($id)
    {
        $content = Contents::find($id);

        if (!$content) {
            return response()->json(['message' => 'Content not found'], 404);
        }

        $komentar = Komentar::with('user') 
            ->where('id_content', $id)
            ->get();

        return response()->json([
            'content' => $content,
            'komentar' => $komentar,
        ], 200);
    }

    /**
     * Store a new comment for a content.
     */
    public function store(Request $request, $id)
    {
        $content = Contents::find($id);

        if (!$content) {
            return response()->json(['message' => 'Content not found'], 404);
        }

        $validated = $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $komentar = new Komentar();
        $komentar->id_content = $content->id;
        $komentar->id_user = Auth::id(); 
        $komentar->comment = $validated['comment'];
        $komentar->date_added = now();
        $komentar->save();

        return response()->json([
            'message' => 'Komentar berhasil ditambahkan',
            'data' => $komentar,
        ], 201);
    }

    /**
     * Update a specific comment.
     */
    public function update(Request $request, $id)
    {
        $komentar = Komentar::find($id);

        if (!$komentar) {
            return response()->json(['message' => 'Komentar not found'], 404);
        }

        if ($komentar->id_user !== Auth::id()) {
            return response()->json(['message' => 'You do not have permission to update this comment'], 403);
        }

        $validated = $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $komentar->update([
            'comment' => $validated['comment'],

        ]);

        return response()->json([
            'message' => 'Komentar updated successfully',
            'data' => $komentar,
        ], 200);
    }


    /**
     * Delete a specific comment.
     */
    public function destroy($id)
    {
        $komentar = Komentar::find($id);

        if (!$komentar) {
            return response()->json(['message' => 'Komentar not found'], 404);
        }

        if ($komentar->id_user !== Auth::id()) {
            return response()->json(['message' => 'You do not have permission to delete this comment'], 403);
        }

        $komentar->delete();

        return response()->json(['message' => 'Komentar deleted successfully'], 200);
    }
}
