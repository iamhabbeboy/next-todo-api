<?php
namespace App\Trait;

trait Helpers
{
	public static function to(object $response, string $message)
	{
		return [
			'status' => $message,
			'data'	 =>	$response
		];
	}
}