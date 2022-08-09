<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Mail\ContactMail;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{


    public function announceByCategory($name ,$category_id){
        
        $category = Category::find($category_id);
        $announcements = $category->announcements()->where('is_accepted', true)->orderBy('created_at' , 'desc')->paginate(5);
        return view('announcement.index', compact('category', 'announcements'));
    }

    public function homepage(){
        $announcements= Announcement::where('is_accepted',true)->orderBy('created_at', 'desc')->take(5)->get();
        return view('welcome', compact('announcements'));
    }

    public function users()
    {
        $users= User::all();
        return view('users', compact('users'));
    }

    public function search(Request $request){
        $q = $request->input('q');
        $announcements = Announcement::search($q)->where('is_accepted', true)->get();
        return view('search', compact('q', 'announcements'));
    }

    public function contact(){
        return view('contact');
    }

    public function submit(Request $request){

        $name = $request->name;
        $message = $request->message;
        $email = $request->email;

        $userContact = compact('name','email','message');

        Mail::to($email)->send(new ContactMail($userContact));

        return redirect(route('homepage'))->with('message','Richiesta inviata correttamente');   
    }

    // FUNZIONE TRADUZIONE PAGINA
    public function locale($locale)
    {
        // App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }


};


