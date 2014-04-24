<?php
/**
 * search.php 
 * Hustonline ������Ŀ����ļ�
 * 
 * ���ļ��� xunsearch PHP-SDK �����Զ����ɣ������ʵ����������޸�
 * ����ʱ�䣺2012-10-03 15:02:56
 * Ĭ�ϱ��룺GBK
 */
// ���� XS ����ļ�
require_once '/opt/lampp/htdocs/HUSTonline/sdk/php/lib/XS.php';
error_reporting(E_ALL ^ E_NOTICE);

//
// ֧�ֵ� GET �����б�
// q: ��ѯ���
// m: ����ģ����������ֵΪ yes/no
// f: ֻ����ĳ���ֶΣ���ֵΪ�ֶ����ƣ�Ҫ����ֶε�������ʽΪ self/both
// s: �����ֶ����Ƽ���ʽ����ֵ��ʽΪ��xxx_ASC �� xxx_DESC
// p: ��ʾ�ڼ�ҳ��ÿҳ����Ϊ XSSearch::PAGE_SIZE �� 10 ��
// ie: ��ѯ�����룬Ĭ��Ϊ GBK
// oe: ������룬Ĭ��Ϊ GBK
// xml: �Ƿ���������� XML ��ʽ�������ֵΪ yes/no
//
// variables
$eu = '';
$__ = array('q', 'm', 'f', 's', 'p', 'ie', 'oe', 'xml');
foreach ($__ as $_)
	$$_ = isset($_GET[$_]) ? $_GET[$_] : '';

// input encoding
if (!empty($ie) && !empty($q) && strcasecmp($ie, 'GBK'))
{
	$q = XS::convert($q, $cs, $ie);
	$eu .= '&ie=' . $ie;
}

// output encoding
if (!empty($oe) && strcasecmp($oe, 'GBK'))
{

	function xs_output_encoding($buf)
	{
		return XS::convert($buf, $GLOBALS['oe'], 'GBK');
	}
	ob_start('xs_output_encoding');
	$eu .= '&oe=' . $oe;
}
else
{
	$oe = 'GBK';
}

// recheck request parameters
$q = get_magic_quotes_gpc() ? stripslashes($q) : $q;
$f = empty($f) ? '_all' : $f;
${'m_check'} = ($m == 'yes' ? ' checked' : '');
${'f_' . $f} = ' checked';
${'s_' . $s} = ' selected';

// base url
$bu = $_SERVER['SCRIPT_NAME'] . '?q=' . urlencode($_GET['q']) . '&m=' . $m . '&f=' . $f . '&s=' . $s . $eu;

// other variable maybe used in tpl
$count = $total = $search_cost = 0;
$docs = $related = $corrected = $hot = array();
$error = $pager = '';
$total_begin = microtime(true);

// perform the search
try
{
	$xs = new XS('hustonline');
	$search = $xs->search;
	$search->setCharset('GBK');

	if (empty($q))
	{
		// just show hot query
		$hot = $search->getHotQuery();
	}
	else
	{
		// fuzzy search
		$search->setFuzzy($m === 'yes');
		
		// set query
		if (!empty($f) && $f != '_all')
		{
			$search->setQuery($f . ':(' . $q . ')');
		}
		else
		{
			$search->setQuery($q);
		}

		// set sort
		if (($pos = strrpos($s, '_')) !== false)
		{
			$sf = substr($s, 0, $pos);
			$st = substr($s, $pos + 1);
			$search->setSort($sf, $st === 'ASC');
		}

		// set offset, limit
		$p = max(1, intval($p));
		$n = XSSearch::PAGE_SIZE;
		$search->setLimit($n, ($p - 1) * $n);

		// get the result
		$search_begin = microtime(true);
		$docs = $search->search();
		$search_cost = microtime(true) - $search_begin;

		// get other result
		$count = $search->getLastCount();
		$total = $search->getDbTotal();

		if ($xml !== 'yes')
		{
			// try to corrected, if resul too few
			if ($count < 1 || $count < ceil(0.001 * $total))
				$corrected = $search->getCorrectedQuery();			
			// get related query
			$related = $search->getRelatedQuery();			
		}

		// gen pager
		if ($count > $n)
		{
			$pb = max($p - 5, 1);
			$pe = min($pb + 10, ceil($count / $n) + 1);
			$pager = '';
			do
			{
				$pager .= ($pb == $p) ? '<strong>' . $p . '</strong>' : '<a href="' . $bu . '&p=' . $pb . '">[' . $pb . ']</a>';
			}
			while (++$pb < $pe);
		}
	}
}
catch (XSException $e)
{
	$error = strval($e);
}

// calculate total time cost
$total_cost = microtime(true) - $total_begin;

// XML OUPUT
if ($xml === 'yes' && !empty($q))
{
	header("Content-Type: text/xml; charset=$oe");
	echo "<?xml version=\"1.0\" encoding=\"$oe\" ?>\n";
	echo "<xs:result count=\"$count\" total=\"$total\" cost=\"$total_cost\" xmlns:xs=\"http://www.xunsearch.com\">\n";
	if ($error !== '')
		echo "  <error><![CDATA[" . $error . "]]></error>\n";

	foreach ($docs as $doc)
	{
		echo "  <doc index=\"" . $doc->rank() . "\" percent=\"" . $doc->percent() . "%\">\n";
		foreach ($doc as $k => $v)
		{
			echo "    <$k>";
			if (is_numeric($v))
				echo $v;
			else
				echo "\n      <![CDATA[" . $v . "]]>\n    ";
			echo "</$k>\n";
		}
		echo "  </doc>\n";
	}
	echo "</xs:result>\n";
	exit(0);
}

// output the data
include dirname(__FILE__) . '/search.tpl';
