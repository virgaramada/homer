<?php

/**
 * This is the model base class for the table "po_order_payable".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "PoOrderPayable".
 *
 * Columns in table "po_order_payable" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $po_id
 * @property integer $po_payable_id
 *
 */
abstract class BasePoOrderPayable extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'po_order_payable';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'PoOrderPayable|PoOrderPayables', $n);
	}

	public static function representingColumn() {
		return array(
			'po_id',
			'po_payable_id',
		);
	}

	public function rules() {
		return array(
			array('po_id, po_payable_id', 'required'),
			array('po_id, po_payable_id', 'numerical', 'integerOnly'=>true),
			array('po_id, po_payable_id', 'safe', 'on'=>'search'),
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
			'po_id' => null,
			'po_payable_id' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('po_id', $this->po_id);
		$criteria->compare('po_payable_id', $this->po_payable_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}