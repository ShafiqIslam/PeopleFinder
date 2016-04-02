<?php
define ("DEBUG_MODE", false);

class FacePPClientDemo
{	
	private $api_server_url;
	private $auth_params;

	public function __construct($api_key, $api_secret)
	{
		$this->api_server_url = "apius.faceplusplus.com/";
    	$this->auth_params = array();
   		$this->auth_params['api_key'] = $api_key;
   		$this->auth_params['api_secret'] = $api_secret;
	}
	
	//////////////////////////////////////////////////////////
	// public mathods
	//////////////////////////////////////////////////////////
	
	public function person_create($person_name) 
	{
		return $this->call("person/create", array("person_name" => $person_name));
	}
	
	public function person_delete($person_name)
	{
		return $this->call("person/delete", array("person_name" => $person_name));
	}
    
	public function person_add_face($face_id, $person_name) 
	{
		return $this->call("person/add_face", array("person_name" => $person_name,
														 "face_id" => $face_id));
	}
	
	public function train_identify($group_name) 
	{
		return $this->call("train/identify", array("group_name" => $group_name));
	}
	
	public function face_detect($urls = null)
	{
		return $this->call("detection/detect", array("url" => $urls));
	}
	
	public function recognition_identify($url, $group_name) 
	{
		return $this->call("recognition/identify", array("url" => $url,
														  "group_name" => $group_name));
	}
	
	public function group_create($group_name)
	{
		return $this->call("group/create", array("group_name" => $group_name));
	}

	public function group_delete($group_name)
	{
		return $this->call("group/delete", array("group_name" => $group_name));
	}
	
	public function group_add_person($person_name, $group_name) 
	{
		return $this->call("group/add_person", array("person_name" => $person_name,
													  "group_name" => $group_name));
	}
    
    public function info_get_session($session_id) {
		return $this->call("info/get_session", array("session_id" => $session_id));
        
    }
    
    public function face_detect_post($filename)
    {
        return $this->post_call("detection/detect", array(
                                  "img" => '@'.$filename
                                  ));
    }
	
	//////////////////////////////////////////////////////////
	// private mathods
	//////////////////////////////////////////////////////////
	
    protected function call($method, $params = array())
    {
    	$params = array_merge($this->auth_params, $params);
		$url = $this->api_server_url . "$method?".http_build_query($params);
		
		if (DEBUG_MODE)
		{
			echo "REQUEST: $url" . "\n";
		}
		
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     	$data = curl_exec($ch);
    	curl_close($ch);    
    	
		$result = null;
		if (!empty($data))
		{
			if (DEBUG_MODE)
			{
				echo "RETURN: " . $data . "\n";
			}
			$result = json_decode($data);
		}
		
		return $result;

    }
    
    protected function post_call($method, $params = array())
    {
    	$params = array_merge($this->auth_params, $params);
		$url = $this->api_server_url . "$method";
        
		if (DEBUG_MODE)
		{
			echo "REQUEST: $url?" .http_build_query($params)."\n";
		}
        
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_POST, 1);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     	$data = curl_exec($ch);
    	curl_close($ch);
        
		$result = null;
		if (!empty($data))
		{
			if (DEBUG_MODE)
			{
				echo "RETURN: " . $data . "\n";
			}
			$result = json_decode($data);
		}
		
		return $result;
    }
    
}
?>
