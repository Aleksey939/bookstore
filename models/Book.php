<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $boockName
 * @property string $description
 * @property int $price
 * @property string $rating
 * @property int $categoryId
 *
 * @property Category $category
 * @property Comment[] $comments
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
            [['boockName', 'description'], 'required'],
            [['description'], 'string'],
            [['price', 'categoryId'], 'integer'],
            [['rating'], 'number'],
            [['boockName'], 'string', 'max' => 255],
            [['categoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['categoryId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'boockName' => 'Boock Name',
            'description' => 'Description',
            'price' => 'Price',
            'rating' => 'Rating',
            'categoryId' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'categoryId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['bookId' => 'id']);
    }
}
