<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string|null $content
 * @property string|null $created_at
 * @property string|null $deleted_at
 * @property string|null $description
 * @property string|null $documents
 * @property int|null $file_id
 * @property int|null $lang
 * @property string|null $lang_hash
 * @property int|null $photo_author
 * @property int|null $popular
 * @property string|null $published_at
 * @property string|null $slug
 * @property int|null $status
 * @property string|null $title
 * @property int|null $top
 * @property int|null $type
 * @property string|null $updated_at
 * @property string|null $video
 *
 * @property Category $category
 * @property File $file
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'file_id', 'lang', 'photo_author', 'popular', 'status', 'top', 'type'], 'integer'],
            [['created_at', 'deleted_at', 'published_at', 'updated_at'], 'safe'],
            [['content', 'description', 'documents', 'lang_hash', 'slug', 'title', 'video'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['file_id'], 'exist', 'skipOnError' => true, 'targetClass' => File::class, 'targetAttribute' => ['file_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'content' => 'Content',
            'created_at' => 'Created At',
            'deleted_at' => 'Deleted At',
            'description' => 'Description',
            'documents' => 'Documents',
            'file_id' => 'File ID',
            'lang' => 'Lang',
            'lang_hash' => 'Lang Hash',
            'photo_author' => 'Photo Author',
            'popular' => 'Popular',
            'published_at' => 'Published At',
            'slug' => 'Slug',
            'status' => 'Status',
            'title' => 'Title',
            'top' => 'Top',
            'type' => 'Type',
            'updated_at' => 'Updated At',
            'video' => 'Video',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasMany(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[File]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFile()
    {
        return $this->hasMany(File::class, ['id' => 'file_id']);
    }
}
