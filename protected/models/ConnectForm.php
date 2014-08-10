<?php

/**
 * ConnectForm class.
 * ConnectForm is the data structure for keeping
 * connect form data. It is used by the 'Connect' action of 'ConnectWidget'.
 */
class ConnectForm extends CActiveRecord
{
	public $status;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// status required
			array('status', 'required'),
		);
	}
	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
	}
}