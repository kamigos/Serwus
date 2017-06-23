<?php

namespace common\models;

use Yii;

use lajax\translatemanager\helpers\Language;

/**
 * This is the model class for table "restaurant_menu_category".
 *
 * @property int $id
 * @property string $name
 *
 * @property RestaurantMenu[] $restaurantMenus
 */
class RestaurantMenuCategory extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return[
            [
                'class' => \lajax\translatemanager\behaviors\TranslateBehavior::className(),
                'translateAttributes' => ['name'],
            ]
        ];
    }

    /**
     * @var Returning the 'name' attribute on the site's own language.
     */
   //
     public $name_t;


    public function afterFind() {
        $this->name_t = Language::d($this->name);

        // or If the category is the database table name.
        // $this->name_t = Language::t(static::tableName(), $this->name);
        // $this->description_t = Language::t(static::tableName(), $this->description);
        parent::afterFind();
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            Language::saveMessage($this->name);

            // or If the category is the database table name.
            // Language::saveMessage($this->name, static::tableName());
            // Language::saveMessage($this->description, static::tableName());

            return true;
        }

        return false;
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'restaurant_menu_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','name_t'], 'required'],
            [['name'], 'string', 'max' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('menu', 'ID'),
            'name' => Yii::t('menu', 'Name'),
        ];
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurantMenus()
    {
        return $this->hasMany(RestaurantMenu::className(), ['category_id' => 'id']);
    }




}
