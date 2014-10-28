<?php



class TvDb{
	private $baseUrl = '';
	private $apiKey = '';
	private $mirrors = array();
	private $languages = array();
	private $defaultLanguage = 'en';
	
	public function __construct($baseUrl, $apiKey)
    {
        $this->baseUrl = $baseUrl;
        $this->apiKey = $apiKey;
    }
	
	private function fetch($url, array $params = array()){
        $ch = curl_init($url);
		
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        if ($params!=array()) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }

        $response = curl_exec($ch);

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $data = substr($response, $headerSize);
        curl_close($ch);

        if ($httpCode != 200) {
            throw new Exception(sprintf('Cannot fetch %s. HTTP Code: %s', $url, $httpdCode));
        }

        return $data;
	}
    
    public function getServerTime()
    {
        return (string)$this->fetch('Updates.php?type=none')->Time;
    }
	
	
	
	
	
	
	
	
	
}

?>