<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property string $id
 * @property string $title
 * @property string $content
 * @property string $writen_on
 * @property string $modifed_on
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'writen_on', 'modifed_on'], 'required'],
            [['title', 'content'], 'string'],
            [['writen_on', 'modifed_on'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'writen_on' => 'Writen On',
            'modifed_on' => 'Modifed On',
        ];
    }
    public function saveData(array $data){
        $this->title=$data['News']['title'];
        $this->content=$data['News']['content'];
        $this->writen_on=date("Y-m-d H:i:s");
        $this->modifed_on=date("Y-m-d H:i:s");
        try{
            parent::save();
        } catch(Exception $e){
            return false;
        }
        $this->title='';
        $this->content='';
        
        return true;
    }
}
