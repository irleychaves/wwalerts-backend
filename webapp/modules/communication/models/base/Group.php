<?php

namespace webapp\modules\communication\models\base;

use Yii;

/**
 * This is the base model class for table "communication.group".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $status
 *
 * @property \webapp\modules\communication\models\CommunicationTrigger[] $communicationTriggers
 */
class Group extends \yii\db\ActiveRecord
{

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'triggers'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['description'], 'string', 'max' => 500]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'communication.group';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('translation', 'ID'),
            'name' => Yii::t('translation', 'Name'),
            'description' => Yii::t('translation', 'Description'),
            'status' => Yii::t('translation', 'Status'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTriggers()
    {
        return $this->hasMany(\webapp\modules\communication\models\Trigger::className(), ['group_id' => 'id']);
    }
    }
