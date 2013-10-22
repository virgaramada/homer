<?php

/**
 * This is the model base class for the table "fin_tax_info".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "FinTaxInfo".
 *
 * Columns in table "fin_tax_info" available as properties of the model,
 * followed by relations of table "fin_tax_info" available as properties of the model.
 *
 * @property integer $tax_id
 * @property string $tax_name
 * @property string $charge_amount
 * @property string $is_live
 *
 * @property FinTaxSchemeInfo[] $finTaxSchemeInfos
 */
abstract class BaseFinTaxInfo extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'fin_tax_info';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'FinTaxInfo|FinTaxInfos', $n);
	}

	public static function representingColumn() {
		return 'tax_name';
	}

	public function rules() {
		return array(
			array('tax_name, charge_amount', 'required'),
			array('tax_name, charge_amount', 'length', 'max'=>50),
			array('is_live', 'length', 'max'=>1),
			array('is_live', 'default', 'setOnEmpty' => true, 'value' => null),
			array('tax_id, tax_name, charge_amount, is_live', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'finTaxSchemeInfos' => array(self::MANY_MANY, 'FinTaxSchemeInfo', 'fin_scheme_tax_info(tax_id, tax_scheme_id)'),
		);
	}

	public function pivotModels() {
		return array(
			'finTaxSchemeInfos' => 'FinSchemeTaxInfo',
		);
	}

	public function attributeLabels() {
		return array(
			'tax_id' => Yii::t('app', 'Tax'),
			'tax_name' => Yii::t('app', 'Tax Name'),
			'charge_amount' => Yii::t('app', 'Charge Amount'),
			'is_live' => Yii::t('app', 'Is Live'),
			'finTaxSchemeInfos' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('tax_id', $this->tax_id);
		$criteria->compare('tax_name', $this->tax_name, true);
		$criteria->compare('charge_amount', $this->charge_amount, true);
		$criteria->compare('is_live', $this->is_live, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}