<?php

/**
 * This is the model base class for the table "room_service_provided".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "RoomServiceProvided".
 *
 * Columns in table "room_service_provided" available as properties of the model,
 * followed by relations of table "room_service_provided" available as properties of the model.
 *
 * @property integer $room_service_id
 * @property integer $customer_id
 * @property string $room_number
 * @property string $service_date
 * @property string $service_time
 * @property integer $dept_id
 * @property integer $service_id
 * @property string $service_desc
 * @property string $other_service
 * @property string $charges_amount
 * @property string $expected_completion_date
 * @property string $expected_completion_time
 * @property string $status
 *
 * @property TableCustomerInfo $customer
 * @property BaseServiceInfo $service
 * @property InfraDeptInfo $dept
 * @property InfraRoomInfo $roomNumber
 */
abstract class BaseRoomServiceProvided extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'room_service_provided';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'RoomServiceProvided|RoomServiceProvideds', $n);
	}

	public static function representingColumn() {
		return 'service_date';
	}

	public function rules() {
		return array(
			array('customer_id, room_number, service_date, service_time, dept_id, service_id, charges_amount, expected_completion_date, expected_completion_time, status', 'required'),
			array('customer_id, dept_id, service_id', 'numerical', 'integerOnly'=>true),
			array('room_number', 'length', 'max'=>10),
			array('service_time, expected_completion_time', 'length', 'max'=>5),
			array('charges_amount', 'length', 'max'=>50),
			array('status', 'length', 'max'=>2),
			array('service_desc, other_service', 'safe'),
			array('service_desc, other_service', 'default', 'setOnEmpty' => true, 'value' => null),
			array('room_service_id, customer_id, room_number, service_date, service_time, dept_id, service_id, service_desc, other_service, charges_amount, expected_completion_date, expected_completion_time, status', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'customer' => array(self::BELONGS_TO, 'TableCustomerInfo', 'customer_id'),
			'service' => array(self::BELONGS_TO, 'BaseServiceInfo', 'service_id'),
			'dept' => array(self::BELONGS_TO, 'InfraDeptInfo', 'dept_id'),
			'roomNumber' => array(self::BELONGS_TO, 'InfraRoomInfo', 'room_number'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'room_service_id' => Yii::t('app', 'Room Service'),
			'customer_id' => null,
			'room_number' => null,
			'service_date' => Yii::t('app', 'Service Date'),
			'service_time' => Yii::t('app', 'Service Time'),
			'dept_id' => null,
			'service_id' => null,
			'service_desc' => Yii::t('app', 'Service Desc'),
			'other_service' => Yii::t('app', 'Other Service'),
			'charges_amount' => Yii::t('app', 'Charges Amount'),
			'expected_completion_date' => Yii::t('app', 'Expected Completion Date'),
			'expected_completion_time' => Yii::t('app', 'Expected Completion Time'),
			'status' => Yii::t('app', 'Status'),
			'customer' => null,
			'service' => null,
			'dept' => null,
			'roomNumber' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('room_service_id', $this->room_service_id);
		$criteria->compare('customer_id', $this->customer_id);
		$criteria->compare('room_number', $this->room_number);
		$criteria->compare('service_date', $this->service_date, true);
		$criteria->compare('service_time', $this->service_time, true);
		$criteria->compare('dept_id', $this->dept_id);
		$criteria->compare('service_id', $this->service_id);
		$criteria->compare('service_desc', $this->service_desc, true);
		$criteria->compare('other_service', $this->other_service, true);
		$criteria->compare('charges_amount', $this->charges_amount, true);
		$criteria->compare('expected_completion_date', $this->expected_completion_date, true);
		$criteria->compare('expected_completion_time', $this->expected_completion_time, true);
		$criteria->compare('status', $this->status, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}