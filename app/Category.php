<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class Category
 *
 * @package App
 * @property string $name
 * @property string $image
*/
class Category extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    
    protected $fillable = ['name'];
    protected $appends = ['image', 'image_link'];
    protected $with = ['media'];
    

    public static function storeValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'image' => 'file|image|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'image' => 'nullable'
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
    
    
}
