<?php


namespace app\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use app\Service\UploadFile;


class ProductImage extends Model
{

    const DELETED_AT = 'deleted';

    protected $table = 'product_image';

    protected $fillable = [
        'id', 'file_name', 'path', 'sort', 'product_id', 'is_viewer'
    ];

    public $timestamps = false;

    protected $dispatchesEvents = [
        'deleting' => Delete::class
    ];

    public static function deleteImageAll($prod_id) {
        $model = ProductImage::query()->where(['product_id' => $prod_id])->get();

        if(!empty($model[0])) {
            foreach ($model as $item) {
                UploadFile::deleteFile($_SERVER['DOCUMENT_ROOT'] . $item['path']);
            }
            ProductImage::query()->where(['product_id' => $prod_id])->delete();
        }
    }

    public static function deleteImageOne($id) {

        $model = ProductImage::query()->where(['id' => $id])->first();
        $model->delete();

        if(!empty($model['path'])) {
            UploadFile::deleteFile($_SERVER['DOCUMENT_ROOT'] . $model['path']);
            $model->delete();
        }
    }

}