<?php

// Request Daum OpenAPI REST Web Service using
// file_get_contents. PHP4/PHP5
// Author: Rasmus Lerdorf and Jason Levitt, Yahoo! Inc.
//         Sang-Kil Park, Daum Communications Corp.

error_reporting(E_ALL);

$request = 'http://apis.daum.net/search/blog?apikey=[421b3c504d90393ee826e8f609ead277f7f5bedd]&q='.urlencode('����');

// ��û�� �����մϴ�.
$xml = file_get_contents($request);

// HTTP ���¸� �޾Ƶ��Դϴ�.
list($version,$status_code,$msg) = explode(' ',$http_response_header[0], 3);

// HTTP ���¸� Ȯ���մϴ�.
switch($status_code) {
	case 200:
		// ����
		break;
	case 503:
		die('Your call to Daum Web Services failed and returned an HTTP status of 503. That means: Service unavailable. An internal problem prevented us from returning data to you.');
		break;
	case 403:
		die('Your call to Daum Web Services failed and returned an HTTP status of 403. That means: Forbidden. You do not have permission to access this resource, or are over your rate limit.');
		break;
	default:
		die('Your call to Daum Web Services returned an unexpected HTTP status of:' . $status_code);
}

// XML ���
echo $xml;
?>


