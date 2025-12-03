<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhotoGallery;
use Illuminate\Support\Facades\Storage;

class PhotoGalleryController extends Controller
{
    //all photos
    public function index()
    {
        $photos = PhotoGallery::latest()->get();
        return view('gallery.index', compact('photos'));
    }

    //form
    public function create()
    {
        return view('gallery.create');
    }

    //new photo
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'filePath' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'caption' => 'required|string|max:255',
            'graduationYear' => 'required|digits:4|integer|min:1900|max:2099',
        ]);


        $path = $request->file('filePath')->store('gallery', 'public');

        PhotoGallery::create([
            'name' => $request->name,
            'filePath' => $path,
            'caption' => $request->caption,
            'graduationYear' => $request->graduationYear,
            'uploadedAt' => now(),
        ]);

        return redirect('/gallery')->with('success', 'Photo uploaded successfully!');
    }


    // Delete
    public function delete($id)
    {
        $photo = PhotoGallery::findOrFail($id);


        if ($photo->filePath && Storage::disk('public')->exists($photo->filePath)) {
            Storage::disk('public')->delete($photo->filePath);
        }

        $photo->delete();

        return redirect('/gallery')->with('success', 'Photo deleted successfully!');
    }
}
