<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class UploadFileController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $images = Image::all();
        return view('upload.index', compact('images'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        // Initialize an array to store image information
        $images = [];

        // Process each uploaded image
        foreach ($request->file('files') as $image) {
            // Generate a unique name for the image
            $imageName = time() . '_' . Str::random() . '.' . $image->getClientOriginalExtension();

            // Store the image in the storage/app/public/images directory
            $path = $image->storeAs('images', $imageName, 'public');

            // Get the public URL for the stored image
            $url = Storage::url($path);

            // Add image details to the array
            $images[] = [
                'name' => $imageName,
                'path' => $url,
                'filesize' => Storage::disk('public')->size($path),
            ];
        }

        // Store images in the database
        foreach ($images as $imageData) {
            Image::create($imageData);
        }

        return response()->json(['success' => $images]);
    }
}
