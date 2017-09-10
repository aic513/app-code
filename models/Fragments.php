<?php

namespace app\models;

use Yii;


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
			'private'
		];
	}


	public function rules()
	{
		return [
			[['text', 'private'], 'safe']
		];
	}


	public function attributeLabels()
	{
		return [
			'_id' => 'ID',
			'text' => 'Fragment code',
			'private' => 'Is fragment private?',
		];
	}
}
