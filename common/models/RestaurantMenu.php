<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "restaurant_menu".
 *
 * @property int $id
 * @property string $name
 * @property string $ingredients
 * @property string $price
 * @property int $category_id
 *
 * @property RestaurantMenuCategory $category
 * @property RestaurantMenuEat[] $restaurantMenuEats
 * @property RestaurantEatType[] $eats
 */
class RestaurantMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'restaurant_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'ingredients', 'price'], 'required'],
            [['price'], 'number'],
            [['category_id'], 'integer'],
            [['name', 'ingredients'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => RestaurantMenuCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'ingredients' => Yii::t('menu', 'Ingredients'),
            'price' => Yii::t('menu', 'Price'),
            'category_id' => Yii::t('menu', 'Category ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(RestaurantMenuCategory::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRestaurantMenuEats()
    {
        return $this->hasMany(RestaurantMenuEat::className(), ['menu_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEats()
    {
        return $this->hasMany(RestaurantEatType::className(), ['id' => 'eat_id'])->viaTable('restaurant_menu_eat', ['menu_id' => 'id']);
    }
}
