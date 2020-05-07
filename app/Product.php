<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class Product
 *
 * @package App
 * @property string $name
 * @property decimal $retail
 * @property decimal $wholesale
 * @property string $image
 * @property string $categorie
 * @property string $link
*/
class Product extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    
    protected $fillable = ['name', 'retail', 'wholesale', 'link', 'categorie_id'];
    protected $appends = ['image', 'image_link'];
    protected $with = ['media'];
    

    public static function storeValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'retail' => 'numeric|nullable',
            'wholesale' => 'numeric|nullable',
            'image' => 'file|image|nullable',
            'categorie_id' => 'integer|exists:categories,id|max:4294967295|nullable',
            'link' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'retail' => 'numeric|nullable',
            'wholesale' => 'numeric|nullable',
            'image' => 'nullable',
            'categorie_id' => 'integer|exists:categories,id|max:4294967295|nullable',
            'link' => 'max:191|nullable'
        ];
    }

    

    public function getImageAttribute()
    {
        return $this->getFirstMedia('image');
    }

    /**
     * @return string
     */
    public function getImageLinkAttribute()
    {
        $file = $this->getFirstMedia('image');
        if (! $file) {
            return null;
        }

        return '<a href="' . $file->getUrl() . '" target="_blank">' . $file->file_name . '</a>';
    }
    
    public function categorie()
    {
        return $this->belongsTo(Category::class, 'categorie_id')->withTrashed();
    }
    
    
}
