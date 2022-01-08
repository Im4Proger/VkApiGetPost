# PHP-class for receiving posts through VK API

PHP-class for receiving posts through VK API

## Requirements:
- PHP 8
- VK API KEY


## Installation

```
See example below.
```


## Example

```php
<?php
include 'Im4Proger/VkApiGetPost/VkApiGetPost.php';
use Im4Proger\VkApiGetPost\VkApiGetPost;

$result_object = new VkApiGetPost('https://vk.com/public1', YOUR_API_KEY, 3);
$result_array = $result_object->result_array;

foreach ($result_array as $result_id => $result_value)
{
	$result_item_text = $result_value['text'];
	$result_item_data = gmdate("Y-m-d\TH:i:s\Z",($result_value['date']));
	echo $result_id.'<br>'.$result_item_data.'<br>'.$result_item_text.'<br><br>';
}
?>
```


## Features

- [x] create a public url for use in the API method
- [x] send a request to the API