<?php
//class ConnectWidget extends CWidget
class ConnectWidget extends CWidget
{
	public $currentProfile;

	public function init () // this method is called by CController::beginWidget()
	{	
		$model= new Connection;
		$existingConnection=Connection::model()->findByAttributes(
			array('connectee'=>$this->currentProfile->id),
			'connector=:connector',
			array(':connector'=>Yii::app()->user->id)
			);

		if($existingConnection)
		{
			echo 'is your'.' '.$existingConnection->type;
		}

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