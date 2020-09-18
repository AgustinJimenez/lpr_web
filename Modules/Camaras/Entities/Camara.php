<?php namespace Modules\Camaras\Entities;

use Illuminate\Database\Eloquent\Model;

class Camara extends Model
{
    protected $table = 'camaras__camaras';
    protected $fillable = ['nombre','source','camera_url','video_path',
          'save_as_video','do_tesseract_analysis','do_knn_analysis',
          'show_live_preview','crop','crop_data','rotate','rotate_data',
          'perspective','perspective_data','tipo','lpr_time'];

    static function enumOptions(){
      return [
                "source" => ["camera" => "Camera",
                              "video" => "Video",
                            ],
                "tipo" => ["LPR" => "LPR",
                            "Otros" => "Otros",
                          ],
              ];
    }

    public function setCropDataAttribute($value) {
      $this->attributes['crop_data'] = $value ?: "{}";
    }

    public function setPerspectiveDataAttribute($value) {
      $this->attributes['perspective_data'] = $value ?: "{}";
    }
}
