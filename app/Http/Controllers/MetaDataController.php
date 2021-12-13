<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaData;
use App\Http\Resources\MetaDataResource;

class MetaDataController extends Controller
{
    public function index() {
        if (MetaData::all() === null) {
            return response([
                'response' => 'Meta data not found'
            ], 404);
        }
        else {
            return MetaDataResource::Collection(MetaData::paginate(10));
        }
    }

    public function show($id) {
        if (MetaData::where('id', $id)->exists()) {
            return new MetaDataResource(MetaData::findOrFail($id));
        }
        else {
            return response([
                'response' => 'Meta data not found'
            ], 201);
        }
    }

    public function create(Request $request) {

        $validator = \Validator::make($request->all(), [
            'about' => ['required', 'string', 'max:255'],
            'data' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response([
                'response' => $validator->errors()
            ], 404);
        }
        
        MetaData::create([
            'about' => $request->about,
            'data' => $request->data,
        ]);
    
        return response([
            'response' => [
                'about' => $request->about,
                'data' => $request->data,
                'message' => 'New meta data added'
            ]
        ], 201);
    }

    public function update(Request $request, $id) {
        if (MetaData::where('id', $id)->exists()) {
            $meta_data = MetaData::find($id);
            $meta_data->about = is_null($request->about) ? $meta_data->about : $request->about;
            $meta_data->data = is_null($request->data) ? $meta_data->data : $request->data;

            $meta_data->save();

            return response([
                'response' => [
                    'id' => $meta_data->id,
                    'about' => $meta_data->about,
                    'data' => $meta_data->data,
                ],
                'message' => 'Meta data updated successfully'
            ], 201);
        }
        else {
            return response([
                'message' => 'Meta data not found'
            ], 404);
        }
    }

    public function destroy($id) {
        if(MetaData::where('id', $id)->exists()) {
            $meta_data = MetaData::find($id);
            $meta_data->delete();

            return response([
                'message' => 'Meta data successfully deleted'
            ], 201);
        } else {
            return response([
                'message' => 'Meta data not found'
            ], 404);
        }
    }
}
