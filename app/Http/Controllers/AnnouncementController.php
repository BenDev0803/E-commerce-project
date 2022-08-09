<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementImage;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;
use App\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    // CRUD MIDDLEWARE
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'announcementAll');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $categories = Category::all();

        return view('announcement.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */

    public function show(Announcement $announcement)
    {
        return view('announcement.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    public function announcementAll()
    {
        $announcements= Announcement::where('is_accepted',true)->orderBy('created_at', 'desc')->get();
        return view('announcement.all', compact('announcements'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */

    public function destroy(Announcement $announcement)
    {
        //
    }

    public function newAnnouncement(Request $request)
    {
        $uniqueSecret = $request->old('uniqueSecret', base_convert(sha1(uniqid(mt_rand())), 16, 36));
        return view('announcement.create', compact('uniqueSecret'));
    }

    public function store(AnnouncementRequest $request)
    {
        $a = new Announcement();
        $a->title = $request->input('title');
        $a->price = $request->input('price');
        $a->description = $request->input('description');
        $a->category_id = $request->input('categories');
        $a->user_id = Auth::user()->id;
        $a->save();
        $uniqueSecret = $request->input('uniqueSecret');
        $images = session()->get("images.{$uniqueSecret}",[]);
        $removedImages= session()->get("removedImages.{$uniqueSecret}",[]);
        $images = array_diff($images,$removedImages);
        
        foreach($images as $image)
        {
            $i = new AnnouncementImage();
            $fileName = basename($image);
            $newFileName = "public/announcements/{$a->id}/{$fileName}";

            Storage::move($image, $newFileName);
            $i->file=$newFileName;
            $i->announcement_id=$a->id;
            $i->save();

            GoogleVisionSafeSearchImage::withChain([
                new GoogleVisionLabelImage($i->id),
                new GoogleVisionRemoveFaces($i->id),
                new ResizeImage($i->file, 150, 150)
                ])->dispatch($i->id);
        }
            
            File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

            return redirect('/')->with('ciao', 'Annuncio creato correttamente, in attesa di approvazione');
    }

    public function uploadImage(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");
        
        dispatch(new ResizeImage(
            $fileName,
            300,
            150
        ));

        session()->push("images.{$uniqueSecret}", $fileName);

        return response()->json(
           [
               'id'=> $fileName
           ]
        );
    }

    public function removeImage(Request $request)
    {
        $uniqueSecret= $request-> input('uniqueSecret');
        $fileName = $request-> input('id');
        session()->push("removedImages.{$uniqueSecret}",$fileName);
        Storage::delete($fileName);
        return response()->json('ok');
    }

    public function getImages(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');
        $images= session()->get("images.{$uniqueSecret}", []  );
        $removedImages= session()->get("removedImages.{$uniqueSecret}" , []);
        $images= array_diff($images,$removedImages);
        $data= [];

        foreach($images as $image)
        {
            $data[]=[
                'id'=>$image,
                'src'=>AnnouncementImage::getUrlByFilePath($image, 80, 80)
            ];
        }

        return response()->json($data);
    }
}
