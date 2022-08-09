<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Announcement;
use Laravel\Scout\Searchable;
use App\Models\AnnouncementImage;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'price',
        'description',
        'category_id',
        'user_id',

        //IMMAGINE
        'image'
        
    ];

    public function toSearchableArray()
    {
    

        // Customize the data array...
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            
            'category' => $this->category

        ];
        return $array;
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    static public function ToBeRevisionedCount(){
        return Announcement::where('is_accepted', null)->count();
    }

    public function images(){

        return $this->hasMany(AnnouncementImage::class);

    }

}
