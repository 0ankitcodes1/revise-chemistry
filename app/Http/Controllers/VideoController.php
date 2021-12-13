<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChapterVideo;
use App\Http\Resources\ChapterVideoResource;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function index() {
        if (ChapterVideo::all() === null) {
            return response([
                'response' => 'Video not found'
            ], 404);
        }
        else {
            return ChapterVideoResource::Collection(ChapterVideo::paginate(1000));
        }
    }

    public function show($id) {
        if (ChapterVideo::where('id', $id)->exists()) {
            return new ChapterVideoResource(ChapterVideo::findOrFail($id));
        }
        else {
            return response([
                'response' => 'Video not found'
            ], 404);
        }
    }
}
