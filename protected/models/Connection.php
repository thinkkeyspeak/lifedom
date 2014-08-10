<?php

/**
 * This is the model class for table "{{connection}}".
 *
 * The followings are the available columns in table '{{connection}}':
 * @property integer $id
 * @property integer $connector
 * @property integer $connectee
 * @property integer $type
 * @property integer $status
 */
class Connection extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	const STATUS_PENDING=1;
	const STATUS_APPROVED=2;
	const STATUS_REJECTED=3;

	protected function beforeSave()
	{
		if(parent::beforeSave())
			{
				if($this->isNewRecord)
				{
					$this->connector=Yii::app()->user->id;//use session user id as connector
					$this->status=1; //submit connection as 'pending'
				}
				return true;
			}
		else
			return false;
	}

	public function tableName()
	{
		return '{{connection}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type', 'required'),
			array('type, status', 'numerical', 'integerOnly'=>true),
			array('status', 'in', 'range'=>array(1,2,3)),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('connector, connectee, status, type', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'connectorObj'=>array(self::BELONGS_TO,'User','connector'),
			'connecteeObj'=>array(self::BELONGS_TO,'User','connectee'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Connection #',
			'connector' => 'Connector',
			'connectee' => 'Connectee',
			'type' => 'Relationship',
			'status' => 'Status',
			'connectorObj.first_name' =>'Connector First Name',
			'connectorObj.family_name' =>'Connector Family Name',
			'connecteeObj.first_name'=>'Connectee First Name',
			'connecteeObj.family_name'=>'Connectee Family Name',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('connector',$this->connector);
		$criteria->compare('connectee',$this->connectee);
		$criteria->compare('type',$this->type);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Connection the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
