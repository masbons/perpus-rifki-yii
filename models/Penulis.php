<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penulis".
 *
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string $telepon
 * @property string $email
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Book[] $books
 */
class Penulis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penulis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'telepon', 'email'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama', 'alamat', 'telepon', 'email'], 'string', 'max' => 255],
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
            'alamat' => 'Alamat',
            'telepon' => 'Telepon',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::class, ['id_penulis' => 'id']);
    }
    public static function getCount()
    {
        return static::find()->count();
    } 
    public function getPenulisCount()
    {
        return $this->hasMany(Book::className(),['id_penulis' => 'id'])->count();
    }
}
