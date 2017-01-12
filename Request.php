<?php

class Request
{
	public static function is_post()
	{
		return strtoupper($_SERVER['REQUEST_METHOD']) == 'POST';
	}

	public static function is_get()
	{
		return strtoupper($_SERVER['REQUEST_METHOD']) == 'GET';
	}

	public static function is_put()
	{
		return strtoupper($_SERVER['REQUEST_METHOD']) == 'PUT';
	}

	public static function is_delete()
	{
		return strtoupper($_SERVER['REQUEST_METHOD']) == 'DELETE';
	}

	public static function is_head()
	{
		return strtoupper($_SERVER['REQUEST_METHOD']) == 'HEAD';
	}

	public static function is_options()
	{
		return strtoupper($_SERVER['REQUEST_METHOD']) == 'OPTIONS';
	}

	public static function Set($type, $anonym)
	{
		if(strtoupper($_SERVER['REQUEST_METHOD']) == $type) {
			return $anonym();
		} else {
			echo json_encode(array('ERROR' => 'METHOD NOT ALLOWED'));
			http_response_code(406);
		}
	}

	public static function Post($anonym)
	{
		if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
			return $anonym();
		} else {
			echo json_encode(array('ERROR' => 'METHOD NOT ALLOWED'));
			http_response_code(406);
		}
	}

	public static function Get($anonym)
	{
		if(strtoupper($_SERVER['REQUEST_METHOD']) == 'GET') {
			return $anonym();
		} else {
			echo json_encode(array('ERROR' => 'METHOD NOT ALLOWED'));
			http_response_code(406);
		}
	}

	public static function Head()
	{
		if(strtoupper($_SERVER['REQUEST_METHOD']) == 'HEAD') {
			return getallheaders();
		} else {
			echo json_encode(array('ERROR' => 'METHOD NOT ALLOWED'));
			http_response_code(406);
		}
	}

	public static function Patch($anonym)
	{
		if(strtoupper($_SERVER['REQUEST_METHOD']) == 'PATCH') {
			return $anonym();
		} else {
			echo json_encode(array('ERROR' => 'METHOD NOT ALLOWED'));
			http_response_code(406);
		}
	}

	public static function Options($type = '', $opts = array())
	{
		if(strtoupper($_SERVER['REQUEST_METHOD']) == 'OPTIONS') {
			if(strtoupper($type) == 'ORIGIN') {
				header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
		        header('Access-Control-Allow-Credentials: true');
		        header('Access-Control-Max-Age: 86400');
			} elseif(strtoupper($type) == 'METHODS') {
				$options = '';
				foreach($opts as $opt) {
					$options .= "$opt,";
				}
				header("Access-Control-Allow-Methods: $options");
			} elseif(strtoupper($type) == 'HEADERS') {
				header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
			} else {
				header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
		        header('Access-Control-Allow-Credentials: true');
		        header('Access-Control-Max-Age: 86400');
		        $options = '';
				foreach($opts as $opt) {
					$options .= "$opt,";
				}
				header("Access-Control-Allow-Methods: $options");
				header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
			}
		} else {
			echo json_encode(array('ERROR' => 'METHOD NOT ALLOWED'));
			http_response_code(406);
		}
	}
}
