<?php
/**
 * suggest.php 
 * Hustonline ��ȡ��������(���JSON)
 * 
 * ���ļ��� xunsearch PHP-SDK �����Զ����ɣ������ʵ����������޸�
 * ����ʱ�䣺2012-10-03 15:02:56
 */
// ���� XS ����ļ�
require_once '/opt/lampp/htdocs/HUSTonline/sdk/php/lib/XS.php';

// Prefix Query is: term (by jQuery-ui)
$q = isset($_GET['term']) ? trim($_GET['term']) : '';
$q = get_magic_quotes_gpc() ? stripslashes($q) : $q;
$terms = array();
if (!empty($q) && strpos($q, ':') === false)
{
	try
	{
		$xs = new XS('hustonline');
		$terms = $xs->search->setCharset('UTF-8')->getExpandedQuery($q);
	}
	catch (XSException $e)
	{
		
	}
}

// output json
header("Content-Type: application/json; charset=utf-8");
echo json_encode($terms);
exit(0);
