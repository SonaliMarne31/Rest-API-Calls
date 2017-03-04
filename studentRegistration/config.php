<?php
class config {
	
	CONST ACCESS_TOKEN = "your_access_token";
	CONST CLIENT_KEY = "client_key";
	CONST CLIENT_SECRET = "client_secret";
	CONST OAUTH = "oauth_url";
	CONST PROFILE_ID = "profile_id";
	CONST SERVER_NAME = "server_url";
	
	
	public static function getAccessToken() 
	{ 
		return self::ACCESS_TOKEN; 
	} 
	
	public static function getClientKey() 
	{ 
		return self::CLIENT_KEY; 
	} 
	
	public static function getClientSecret() 
	{ 
		return self::CLIENT_SECRET; 
	} 
	
	public static function getOAuth() 
	{ 
		return self::OAUTH; 
	} 
	
	public static function getProfileID() 
	{ 
		return self::PROFILE_ID; 
	} 
	
	public static function getServerName() 
	{ 
		return self::SERVER_NAME; 
	}
}
?>