<?php

/**
 * This is the model base class for the table "base_occasion_info".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "BaseOccasionInfo".
 *
 * Columns in table "base_occasion_info" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $occassion_id
 * @property string $occassion_name
 *
 */
abstract class BaseBaseOccasionInfo extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'base_occasion_info';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'BaseOccasionInfo|BaseOccasionInfos', $n);
	}

	public static function representingColumn() {
		return 'occassion_name';
	}

	public function rules() {
		return array(
			array('occassion_name', 'length', 'max'=>255),
			array('occassion_name', 'default', 'setOnEmpty' => true, 'value' => null),
			array('occassion_id, occassion_name', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'occassion_id' => Yii::t('app', 'Occassion'),
			'occassion_name' => Yii::t('app', 'Occassion Name'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('occassion_id', $this->occassion_id);
		$criteria->compare('occassion_name', $this->occassion_name, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}