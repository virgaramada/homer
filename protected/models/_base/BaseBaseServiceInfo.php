<?php

/**
 * This is the model base class for the table "base_service_info".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "BaseServiceInfo".
 *
 * Columns in table "base_service_info" available as properties of the model,
 * followed by relations of table "base_service_info" available as properties of the model.
 *
 * @property integer $service_id
 * @property string $service_name
 * @property string $charges_amount
 * @property string $currency_code
 * @property integer $dept_id
 *
 * @property InfraDeptInfo $dept
 * @property Currency $currencyCode
 * @property RoomServiceProvided[] $roomServiceProvideds
 */
abstract class BaseBaseServiceInfo extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'base_service_info';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'BaseServiceInfo|BaseServiceInfos', $n);
	}

	public static function representingColumn() {
		return 'service_name';
	}

	public function rules() {
		return array(
			array('service_name, charges_amount, currency_code, dept_id', 'required'),
			array('dept_id', 'numerical', 'integerOnly'=>true),
			array('service_name', 'length', 'max'=>255),
			array('charges_amount', 'length', 'max'=>50),
			array('currency_code', 'length', 'max'=>3),
			array('service_id, service_name, charges_amount, currency_code, dept_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'dept' => array(self::BELONGS_TO, 'InfraDeptInfo', 'dept_id'),
			'currencyCode' => array(self::BELONGS_TO, 'Currency', 'currency_code'),
			'roomServiceProvideds' => array(self::HAS_MANY, 'RoomServiceProvided', 'service_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'service_id' => Yii::t('app', 'Service'),
			'service_name' => Yii::t('app', 'Service Name'),
			'charges_amount' => Yii::t('app', 'Charges Amount'),
			'currency_code' => null,
			'dept_id' => null,
			'dept' => null,
			'currencyCode' => null,
			'roomServiceProvideds' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('service_id', $this->service_id);
		$criteria->compare('service_name', $this->service_name, true);
		$criteria->compare('charges_amount', $this->charges_amount, true);
		$criteria->compare('currency_code', $this->currency_code);
		$criteria->compare('dept_id', $this->dept_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}