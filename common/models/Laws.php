<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%laws}}".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $url ссылка
 * @property int $lawtype_id тип закона
 */
class Laws extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%laws}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru', 'url_uz', 'url_ru', 'lawtype_id'], 'required'],
            [['name_uz', 'name_ru'], 'string'],
            [['lawtype_id'], 'integer'],
            [['url_uz', 'url_ru'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_uz' => Yii::t('app', 'Hujjat nomi'),
            'name_ru' => Yii::t('app', 'Название документа'),
            'url_uz' => Yii::t('app', 'Url uz'),
            'url_ru' => Yii::t('app', 'Url ru'),
            'lawtype_id' => Yii::t('app', 'Hujjat turi'),
        ];
    }

    public function getType()
    {
        if(Yii::$app->language == 'uz')
          {
            $laws = Lawtype::find()->select(['id', 'name_uz'])->asArray()->all();
            $count = Lawtype::find()->select(['id', 'name_uz'])->count();
            for ($i=0; $i < $count; $i++) { 
                $laws[$i]['name'] = $laws[$i]['name_uz'];
                unset($laws[$i]['name_uz']);
            }
            return $laws;
          }
        else if(Yii::$app->language == 'ru')
          {
            $laws = Lawtype::find()->select(['id', 'name_ru'])->asArray()->all();
            $count = Lawtype::find()->select(['id', 'name_ru'])->count();
            for ($i=0; $i < $count; $i++) { 
                $laws[$i]['name'] = $laws[$i]['name_ru'];
                unset($laws[$i]['name_ru']);
            }
            return $laws;
          }
        else
        {
            return null;
        }
    }
}
