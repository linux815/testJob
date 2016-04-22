<?php
namespace api\v1\models;

use \yii\db\ActiveRecord;

class Book extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'book';
	}

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['id'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
			[['title', 'text', 'year', 'author_id'], 'required']
        ];
    }
}
