<?php
namespace App\Traits;

trait Helper
{
	public static function withMessage ($response, string $message, int $code)
	{
		return response()->json([
			'status' => $message,
			'code'	 => $code,
			'data'	 =>	$response
		]);
	}
}