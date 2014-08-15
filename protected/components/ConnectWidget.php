<?php
//class ConnectWidget extends CWidget
class ConnectWidget extends CWidget
{
	public $currentProfile;

	public function init () // this method is called by CController::beginWidget()
	{	
		$model= new Connection;
		// looks for a connection you've initiated with the viewed user
		// * need to add ability to see if you've accepted a connection from the viewed user *
		$existingConnection=Connection::model()->findByAttributes(
			array('connectee'=>$this->currentProfile->id),
			'connector=:connector',
			array(':connector'=>Yii::app()->user->id)
			);

		// checks to see if connection exists and displays it textually
		if($existingConnection)
		{
			$ConnectionType=Lookup::item('Connection', $existingConnection->type);
			echo 'is your'.' '.$ConnectionType;
		}
		// if no connection, gives you option to initiate connection
		else
		{
			if(isset($_POST['Connection']))
			{
				//collects user input data
				$model->type=$_POST['Connection']['type'];
				$model->connectee=$this->currentProfile->id;
				$model->save();
				//validates user input
				if($model->validate())
				{
					echo 'You are connected!';
					//$this->redirect(Yii::app()->user->returnUrl);
				}
			}
			$this->render('_connectionForm', array(
			'model'=> $model));
		}
	}

	public function run () // this method is called by CController::endWidget()
	{}
}
?>