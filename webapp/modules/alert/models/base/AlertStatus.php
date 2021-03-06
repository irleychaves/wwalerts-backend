<?php

namespace webapp\modules\alert\models\base;

use Yii;

/**
 * This is the base model class for table "alert.status_alert".
 *
 * @property integer $id
 * @property string $name_i18n
 * @property string $hash
 * @property integer $status
 * @property string $description_i18n
 * @property string $cap_status
 *
 * @property \webapp\modules\alert\models\CommunicationTrigger[] $communicationTriggers
 */
class AlertStatus extends \yii\db\ActiveRecord
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
            [['name_i18n'], 'required'],
            [['hash'], 'string'],
            [['status'], 'integer'],
            [['name_i18n', 'description_i18n'], 'string', 'max' => 300],
            [['cap_status'], 'string', 'max' => 32]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alert.alert_status';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
	return [
	    'id' => Yii::t('translation', 'ID'),
	    'name_i18n' => Yii::t('translation', 'Name I18n'),
	    'hash' => Yii::t('translation', 'Hash'),
	    'status' => Yii::t('translation', 'Status'),
	    'description_i18n' => Yii::t('translation', 'Description I18n'),
	    'cap_status' => Yii::t('translation', 'Cap Status'),
	];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTriggers()
    {
        return $this->hasMany(\webapp\modules\communication\models\Trigger::className(), ['alert_status_id' => 'id']);
    }
    }
