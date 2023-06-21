<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type_id',
        'slug',
        'name',
        'surname',
        'description',
        'image',
        'image_path',
        'image_real_name'
    ];
    public function type(){

        return $this->belongsTo(Type::class);

    }
    public static function generateSlug($str){

        $slug = Str::slug($str, '-');
        $original_slug = $slug;
        $slug_exixts = Portfolio::where('slug', $slug)->first();
        $c = 1;
        while($slug_exixts){
            $slug = $original_slug . '-' . $c;
            $slug_exixts = Portfolio::where('slug', $slug)->first();
            $c++;
        }

        return $slug;
    }
}
