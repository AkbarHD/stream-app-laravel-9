<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movies;
use Illuminate\Support\Str; // import utk class string random
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movies::all(); // mau get atau all sama saja
        return view('admin.movies', ['movies' => $movies]);
    }

    public function create()
    {
        return view('admin.movie-create');
    }

    public function edit($id)
    {
        $movies = Movies::find($id);
        return view('admin.movie-edit', ['movies' => $movies]);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token'); // agar tokennya tdk kita angkut
        // dd($data);

        $request->validate([
            'title' => 'required|string',
            'small_thumbnail' => 'required|image|mimes:png,jpg,jpeg',
            'large_thumbnail' => 'required|image|mimes:png,jpg,jpeg',
            'trailer' => 'required|url', // baru url
            'movie' => 'required|url',
            'casts' => 'required|string',
            'categories' => 'required|string',
            'release_date' => 'required|string',
            'about' => 'required|string',
            'short_about' => 'required|string',
            'duration' => 'required|string',
            'featured' => 'required',
        ]);

        $smallThumbnail = $request->small_thumbnail;
        $largeThumbnail = $request->large_thumbnail;

        // utk mngacak string random + nama file gambar
        $originalSmallThumbnailName = Str::random(10) . $smallThumbnail->getClientOriginalName(); // getClientOriginalName :cara mendaptkan file name dari gambar
        $originalLargeThumbnailName = Str::random(10) . $largeThumbnail->getClientOriginalName();

        // utk simpen ke storage
        $smallThumbnail->storeAs('public/thumbnail', $originalSmallThumbnailName);
        $largeThumbnail->storeAs('public/thumbnail', $originalLargeThumbnailName);


        // selain foto datanya sdh otomatis ke get(ambil)
        // utk simpen ke database
        $data['small_thumbnail'] = $originalSmallThumbnailName;
        $data['large_thumbnail'] = $originalLargeThumbnailName;

        Movies::create($data);

        return redirect()->route('admin.movie')->with('success', 'Data Movie has been created');
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token'); // agar tokennya tdk kita angkut
        // dd($data);

        $request->validate([
            'title' => 'required|string',
            'small_thumbnail' => 'image|mimes:png,jpg,jpeg', // hapus required
            'large_thumbnail' => 'image|mimes:png,jpg,jpeg', // hapus required
            'trailer' => 'required|url', // baru url
            'movie' => 'required|url',
            'casts' => 'required|string',
            'categories' => 'required|string',
            'release_date' => 'required|string',
            'about' => 'required|string',
            'short_about' => 'required|string',
            'duration' => 'required|string',
            'featured' => 'required',
        ]);

        $movie = Movies::find($id);
        if ($request->small_thumbnail) { // jika user ganti small thumbnail
            $smallThumbnail = $request->small_thumbnail;
            $originalSmallThumbnailName = Str::random(10) . $smallThumbnail->getClientOriginalName(); // getClientOriginalName :cara mendaptkan file name dari gambar
            $smallThumbnail->storeAs('public/thumbnail', $originalSmallThumbnailName); // karena laravel 9 kayanya beda sama si muba

            $data['small_thumbnail'] = $originalSmallThumbnailName; // bs jg menggunakan -> $movie->small_thumbnail
            // hapus file lama
            // kalo di muba mnggnakan input typed hiiden di file editnya
            // kalo kita ambil dari database
            Storage::delete('public/thumbnail/' . $movie->small_thumbnail); // hapusnya arahakan ke storage, jd otomatis yg di public ke hapus juga
        }
        if ($request->large_thumbnail) {
            $largeThumbnail = $request->large_thumbnail;
            $originalLargeThumbnailName = Str::random(10) . $largeThumbnail->getClientOriginalName();
            $largeThumbnail->storeAs('public/thumbnail', $originalLargeThumbnailName);
            $data['large_thumbnail'] = $originalLargeThumbnailName;

            // hapus file lama
            Storage::delete('public/thumbnail/' . $movie->large_thumbnail); // hapusnya arahakan ke storage, jd otomatis yg di public ke hapus juga
        }

        $movie->update($data);
        // Movies::find($id)->update($data);

        return redirect()->route('admin.movie')->with('success', 'Data Movie Has Been Updated');
    }

    public function destroy($id)
    {
        Movies::find($id)->delete();
        return redirect()->route('admin.movie')->with('success', 'Data Movie Has Been Deleted');
    }
}
