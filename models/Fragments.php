<?php

namespace app\models;

use Yii;
use yii\mongodb\ActiveRecord;


class Fragments extends \yii\mongodb\ActiveRecord
{
	public static function collectionName()
	{
		return ['appDb', 'fragments'];
	}


	public function attributes()
	{
		return [
			'_id',
			'text',
			'private',
			'create_at',
			'update_at',
			'user_id',
		];
	}


	public function rules()
	{
		return [
			[
				['text', 'private'], 'required',
				'message' => 'This field is required'
			],
			['text', 'trim'],
			[['user_id'], 'default', 'value' => Yii::$app->user->identity->_id],
		];
	}


	public function attributeLabels()
	{
		return [
			'_id' => 'ID',
			'text' => 'Fragment code',
			'private' => 'Select type of fragment',
		];
	}


	public function behaviors()
	{
		return [
			'timestamp' => [
				'class' => 'yii\behaviors\TimestampBehavior',
				'attributes' => [
					ActiveRecord::EVENT_BEFORE_INSERT => ['create_at','update_at'],
					ActiveRecord::EVENT_BEFORE_UPDATE => ['update_at'],
				]
			],
		];
	}
}
