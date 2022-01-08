<?php
/**
 * PHP-class for receiving posts through VK API 
 * @author https://github.com/Im4Proger
 */

namespace Im4Proger\VkApiGetPost;

class VkApiGetPost
{
	private string $source_url_full = '';
	private string $access_token = '';
	private int $get_count = 20;
	private string $source_url_query = '';
	public array $result_array = array();

	public function __construct(string $source_url_full, string $access_token, int $get_count)
	{
		$this->source_url_full = $source_url_full;
		$this->access_token = $access_token;
		$this->get_count = $get_count;
		$this->getUrl();
		$this->getResult();
	}

	//create a public url for use in the API method
	private function getUrl()
	{
		$source_url = substr($this->source_url_full,15);
		$this->source_url_query = 'domain='.$source_url;
		if (substr($source_url,0,4)=='club') $this->source_url_query = 'owner_id=-'.substr($source_url,4);
		if (substr($source_url,0,6)=='public') $this->source_url_query = 'owner_id=-'.substr($source_url,6);
	}

	//send a request to the API
	private function getResult()
	{
		$result_query = "https://api.vk.com/method/wall.get?". $this->source_url_query ."&count=". $this->get_count ."&access_token=". $this->access_token ."&v=5.101";
		$result_file = file_get_contents($result_query);
		$result_json = json_decode($result_file, true);
		$this->result_array = $result_json['response']['items'];
	}
}
?>