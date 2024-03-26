<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['desc_imagen', 'url_imagen', 'imageable_id', 'imageable_type'];

    // Defino una relación polimórfica en Image para asociarla dinámicamente con múltiples modelos como Category o Product.
    //todo Defino una relacion polimorfica llamada Image para asociarla con multiples modelos, en este caso con Category y Product de momento
    public function imageable():MorphTo
    {
        return $this->morphTo();
    }
}
