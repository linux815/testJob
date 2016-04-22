<?php
namespace app\modules\admin\models;

use yii\db\ActiveRecord;

class Author extends ActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Comments the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * @return array primary key of the table
     **/
    public static function primaryKey()
    {
        return array('id');
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'firstName' => 'FirstName',
            'lastName' => 'LastName',
            'pseudonym' => 'Pseudonym',
        );
    }
}
