<?php

namespace webapp\modules\operative\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "operative.jurisdiction".
 *
 * @property integer $id
 * @property string $name
 * @property string $geom
 * @property integer $institution_id
 * @property string $color
 *
 * @property \app\models\OperativeInstitution $institution
 * @property \app\models\OperativeRlWorkgroupJurisdiction[] $operativeRlWorkgroupJurisdictions
 * @property \app\models\OperativeWorkgroup[] $workgroups
 */
class Jurisdiction extends \yii\db\ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'geom'], 'string'],
            [['institution_id'], 'integer'],
            [['color'], 'string', 'max' => 10]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operative.jurisdiction';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('translation', 'ID'),
            'name' => Yii::t('translation', 'Name'),
            'geom' => Yii::t('translation', 'Geom'),
            'institution_id' => Yii::t('translation', 'Institution ID'),
            'color' => Yii::t('translation', 'Color'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstitution()
    {
        return $this->hasOne(\webapp\modules\operative\models\Institution::className(), ['id' => 'institution_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRlWorkgroupJurisdictions()
    {
        return $this->hasMany(\webapp\modules\operative\models\RlWorkgroupJurisdiction::className(), ['jurisdiction_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkgroups()
    {
        return $this->hasMany(\webapp\modules\operative\models\Workgroup::className(), ['id' => 'workgroup_id'])->viaTable('operative.rl_workgroup_jurisdiction', ['jurisdiction_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }
}
