<?php

/**
 * This is the model base class for the table "menu_card_info".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "MenuCardInfo".
 *
 * Columns in table "menu_card_info" available as properties of the model,
 * followed by relations of table "menu_card_info" available as properties of the model.
 *
 * @property integer $menu_card_id
 * @property string $menu_card_name
 * @property string $quantity
 * @property string $unit_code
 * @property string $price_amount
 * @property string $currency_code
 *
 * @property BarBillingOrder[] $barBillingOrders
 * @property InvMetricUnitInfo $unitCode
 * @property Currency $currencyCode
 * @property MenuInfo[] $menuInfos
 * @property RestoBillingOrder[] $restoBillingOrders
 */
abstract class BaseMenuCardInfo extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'menu_card_info';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'MenuCardInfo|MenuCardInfos', $n);
	}

	public static function representingColumn() {
		return 'menu_card_name';
	}

	public function rules() {
		return array(
			array('menu_card_name, quantity, unit_code, price_amount, currency_code', 'required'),
			array('menu_card_name', 'length', 'max'=>20),
			array('quantity, price_amount', 'length', 'max'=>50),
			array('unit_code', 'length', 'max'=>5),
			array('currency_code', 'length', 'max'=>3),
			array('menu_card_id, menu_card_name, quantity, unit_code, price_amount, currency_code', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'barBillingOrders' => array(self::HAS_MANY, 'BarBillingOrder', 'menu_card_id'),
			'unitCode' => array(self::BELONGS_TO, 'InvMetricUnitInfo', 'unit_code'),
			'currencyCode' => array(self::BELONGS_TO, 'Currency', 'currency_code'),
			'menuInfos' => array(self::MANY_MANY, 'MenuInfo', 'menu_card_menu_info(menu_card_id, menu_info_id)'),
			'restoBillingOrders' => array(self::HAS_MANY, 'RestoBillingOrder', 'menu_card_id'),
		);
	}

	public function pivotModels() {
		return array(
			'menuInfos' => 'MenuCardMenuInfo',
		);
	}

	public function attributeLabels() {
		return array(
			'menu_card_id' => Yii::t('app', 'Menu Card'),
			'menu_card_name' => Yii::t('app', 'Menu Card Name'),
			'quantity' => Yii::t('app', 'Quantity'),
			'unit_code' => null,
			'price_amount' => Yii::t('app', 'Price Amount'),
			'currency_code' => null,
			'barBillingOrders' => null,
			'unitCode' => null,
			'currencyCode' => null,
			'menuInfos' => null,
			'restoBillingOrders' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('menu_card_id', $this->menu_card_id);
		$criteria->compare('menu_card_name', $this->menu_card_name, true);
		$criteria->compare('quantity', $this->quantity, true);
		$criteria->compare('unit_code', $this->unit_code);
		$criteria->compare('price_amount', $this->price_amount, true);
		$criteria->compare('currency_code', $this->currency_code);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}