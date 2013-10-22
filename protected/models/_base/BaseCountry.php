<?php

/**
 * This is the model base class for the table "country".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Country".
 *
 * Columns in table "country" available as properties of the model,
 * followed by relations of table "country" available as properties of the model.
 *
 * @property integer $country_id
 * @property string $country_code
 * @property string $country_name
 * @property string $country_code_iso3166
 * @property integer $lang_id
 *
 * @property BaseLanguage $lang
 * @property Currency[] $currencies
 * @property HotelInfo[] $hotelInfos
 * @property TableCustomerInfo[] $tableCustomerInfos
 */
abstract class BaseCountry extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'country';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Country|Countries', $n);
	}

	public static function representingColumn() {
		return 'country_code';
	}

	public function rules() {
		return array(
			array('country_code, country_name', 'required'),
			array('lang_id', 'numerical', 'integerOnly'=>true),
			array('country_code', 'length', 'max'=>2),
			array('country_name', 'length', 'max'=>255),
			array('country_code_iso3166', 'length', 'max'=>3),
			array('country_code_iso3166, lang_id', 'default', 'setOnEmpty' => true, 'value' => null),
			array('country_id, country_code, country_name, country_code_iso3166, lang_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'lang' => array(self::BELONGS_TO, 'BaseLanguage', 'lang_id'),
			'currencies' => array(self::HAS_MANY, 'Currency', 'country_code'),
			'hotelInfos' => array(self::HAS_MANY, 'HotelInfo', 'country_code'),
			'tableCustomerInfos' => array(self::HAS_MANY, 'TableCustomerInfo', 'country_code'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'country_id' => Yii::t('app', 'Country'),
			'country_code' => Yii::t('app', 'Country Code'),
			'country_name' => Yii::t('app', 'Country Name'),
			'country_code_iso3166' => Yii::t('app', 'Country Code Iso3166'),
			'lang_id' => null,
			'lang' => null,
			'currencies' => null,
			'hotelInfos' => null,
			'tableCustomerInfos' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('country_id', $this->country_id);
		$criteria->compare('country_code', $this->country_code, true);
		$criteria->compare('country_name', $this->country_name, true);
		$criteria->compare('country_code_iso3166', $this->country_code_iso3166, true);
		$criteria->compare('lang_id', $this->lang_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}