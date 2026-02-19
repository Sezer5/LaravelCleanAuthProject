<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = ['title','desc','picture','category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function keywords(){
        return $this->belongsToMany(
        Keywords::class,     // 1. İlişkili model
        'article_keywords', // 2. Pivot tablo adın
        'article_id',       // 3. Bu modelin (Article) pivot tablodaki yabancı anahtarı
        'keywords_id'       // 4. Diğer modelin (Keyword) pivot tablodaki yabancı anahtarı
    );
    }
}
