<?php

/**
 * This is the model base class for the table "infra_dept_info".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "InfraDeptInfo".
 *
 * Columns in table "infra_dept_info" available as properties of the model,
 * followed by relations of table "infra_dept_info" available as properties of the model.
 *
 * @property integer $dept_id
 * @property string $dept_name
 *
 * @property BaseServiceInfo[] $baseServiceInfos
 * @property InvGoodsRequest[] $invGoodsRequests
 * @property RoomServiceProvided[] $roomServiceProvideds
 */
abstract class BaseInfraDeptInfo extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'infra_dept_info';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'InfraDeptInfo|InfraDeptInfos', $n);
	}

	public static function representingColumn() {
		return 'dept_name';
	}

	public function rules() {
		return array(
			array('dept_name', 'required'),
			array('dept_name', 'length', 'max'=>255),
			array('dept_id, dept_name', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'baseServiceInfos' => array(self::HAS_MANY, 'BaseServiceInfo', 'dept_id'),
			'invGoodsRequests' => array(self::HAS_MANY, 'InvGoodsRequest', 'dept_id'),
			'roomServiceProvideds' => array(self::HAS_MANY, 'RoomServiceProvided', 'dept_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'dept_id' => Yii::t('app', 'Dept'),
			'dept_name' => Yii::t('app', 'Dept Name'),
			'baseServiceInfos' => null,
			'invGoodsRequests' => null,
			'roomServiceProvideds' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('dept_id', $this->dept_id);
		$criteria->compare('dept_name', $this->dept_name, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}