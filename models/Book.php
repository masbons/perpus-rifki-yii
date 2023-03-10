<?php

namespace app\models;

use Yii;
use app\models\Penulis;
use app\models\Penerbit;
use app\models\Kategori;
use kartik\mpdf\Pdf;
use yii\helpers\Html;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $nama
 * @property int $tahun_terbit
 * @property int|null $id_penulis
 * @property int|null $id_penerbit
 * @property int|null $id_kategori
 * @property string $sinopsis
 * @property string $image
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Authors $penulis
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'tahun_terbit', 'sinopsis', 'image'], 'required'],
            [['tahun_terbit', 'id_penulis', 'id_penerbit', 'id_kategori'], 'integer'],
            [['sinopsis'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama', 'image'], 'string', 'max' => 255],
            [['id_penulis'], 'exist', 'skipOnError' => true, 'targetClass' => Authors::class, 'targetAttribute' => ['id_penulis' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'tahun_terbit' => 'Tahun Terbit',
            'id_penulis' => 'Id Penulis',
            'id_penerbit' => 'Id Penerbit',
            'id_kategori' => 'Id Kategori',
            'sinopsis' => 'Sinopsis',
            'image' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Penulis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenulis()
    {
        return $this->hasOne(Penulis::class, ['id' => 'id_penulis']);
    }
     public function getPenerbit()
    {
        return $this->hasOne(Penerbit::class, ['id' => 'id_penerbit']);
    }
     public function getKategori()
    {
        return $this->hasOne(Kategori::class, ['id' => 'id_kategori']);
    }
    public static function getCount()
    {
        return static::find()->count();
    }  
}
