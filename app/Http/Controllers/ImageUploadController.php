<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        try {
            if (!$request->hasFile('file')) {
                return response()->json(['error' => 'No file received'], 422);
            }

            $file = $request->file('file');

            // Directly store public/uploads/summernote/
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/summernote');

            if (!file_exists($destination)) {
                mkdir($destination, 0775, true);
            }

            $file->move($destination, $filename);

            $url = url('uploads/summernote/' . $filename);

            return response()->json(['url' => $url]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
