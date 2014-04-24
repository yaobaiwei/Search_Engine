<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $oe; ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="googlebot" content="index,noarchive,nofollow,noodp" />
<meta name="robots" content="index,nofollow,noarchive,noodp" />
<title><?php if (!empty($q)) echo "搜索：" . strip_tags($q) . " - "; ?>Hustonline 搜索 - Powered by xunsearch </title>
<meta http-equiv="keywords" content="Fulltext Search Engine Hustonline xunsearch" />
<meta http-equiv="description" content="Fulltext Search for Hustonline, Powered by xunsearch/1.3.0 " />
<style type="text/css">
/* global */
body { font-size: 14px; font-family: tahoma; color: #444; line-height: 140%; }
a { color: #04c; text-decoration: none; }
a:hover { text-decoration: underline; }
.outer { width: 880px; margin: 0 auto; }
#header h1 { font-size: 24px; margin: 0 0 10px 0; }
#header a, #header a:hover { text-decoration: none; color: #444; }
#footer { font-size: 12px; margin-top: 20px; border-top: 1px solid #46a; padding-top: 10px; color: #666; }
#footer a { color: #666; text-decoration: underline; }
/* form */
form#q-form { margin: 0; }
#q-input { overflow: hidden; zoom: 1; clear: both; }
#q-input .text { 
	float: left; width: 333px;
	padding: 0 3px; line-height: 26px; 
    -moz-border-bottom-colors: none;
    -moz-border-image: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: #9A9A9A #CDCDCD #CDCDCD #9A9A9A;
    border-style: solid; border-width: 1px;
    font: 16px arial; height: 22px;
    padding: 4px 7px; vertical-align: top;
    background: url("http://su.bdimg.com/static/superpage/img/spis_167a8734.png") no-repeat scroll 0 0 transparent;
}
#q-input .button { 
	float: left; font-size: 14px; margin-left: 10px;
    background: url("http://su.bdimg.com/static/superpage/img/spis_167a8734.png") repeat scroll 0 -35px #DDDDDD;
    border: 0 none; cursor: pointer; height: 32px; padding: 0; width: 95px;	
}
#q-input .tips { color: #aaa; font-size: 12px; }
#q-options { overflow: hidden; zoom: 1; margin: 10px 0; font-size: 12px; clear: both; }
#q-options h4 { font-size: 14px; float: left; margin: 0; }
#q-options ul { float: left; margin: 0; padding: 0; }
#q-options li { float: left; margin: 0 0 0 10px; padding: 0; list-style: none; }
/* result */
.res_div2 { overflow: hidden; zoom: 1; clear: both; margin-top: 10px; }
.res_div2 h4 { font-size: 16px; font-weight: bold; float: left; margin: 0; padding: 0; }
.res_div2 ul { float: left; margin: 0; padding: 0; }
.res_div2 li { float: left; margin: 0 0 0 0; padding: 0; list-style: none; }
#hot-search h4 { margin: 10px 0; float: none; }
#hot-search li { margin-right: 10px; }
#hot-search li small { font-size: 80%; color: #aaa; }
#res-neck { margin-top: 10px; border-bottom: 1px solid #46a; background: #def; font-size: 12px; padding: 5px; }
#res-error { margin: 20px 0; color: red; }
#res-error strong { font-weight: bold; font-size: 120%; }
#res-fixed h4 { font-size: 14px; font-weight: normal; font-style: italic; }
#res-fixed li { margin: 0 5px; }
#res-fixed li a { color: #a00; }
#res-empty { margin-top: 10px; }
#res-pager a { margin: 0 5px; }
#res-pager strong { margin: 0 5px; }
#res-related { padding: 10px; background: #eee; }
#res-related h4 { font-size: 14px; }
#res-related ul { margin-left: 20px; width: 600px; }
#res-related li { width: 120px; padding: 0 5px; }
#res-related li a { text-decoration: underline; font-size: 12px; }
.res-doc { margin-top: 15px; }
.res-doc em { font-style: normal; color: red; }
.res-doc h2 { font-size: 16px; margin: 0; font-weight: normal; }
.res-doc h2 small { font-size: 12px; color: #aaa; }
.res-doc p { font-size: 12px; color: #666; margin: 4px 0; }
.res-doc ul { overflow: hidden; zoom: 1; margin: 0; padding: 0; }
.res-doc li { list-style: none; padding: 0; margin: 0 20px 0 0; float: left; font-size: 12px; color: #666; }
.res-doc li span { border-bottom: 1px dotted #aaa; font-family: arial; color: #444; }
.ui-autocomplete li.ui-menu-item { font-size: 12px; }
</style>
</head>
<!-- search.tpl Hustonline 搜索模板 -->	
<body>
<div class="outer">
	<!-- page header -->
	<div id="header"><h1><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>">Hustonline 搜索</a></h1></div>
	
	<!-- search form -->
	<form id="q-form" method="get">
	<div id="q-input">
		<input class="text" type="text" name="q" size="40" title="输入任意关键词皆可搜索" value="<?php echo htmlspecialchars($q); ?>" />	
		<input class="button" type="submit" value="  搜索!  " />
	</div>
	<div id="q-options">
		<h4>选项</h4>
		<ul>
			<li><input type="radio" name="f" value="subject" <?php echo $f_subject; ?> />Subject</li>
			<li><input type="radio" name="f" value="_all" <?php echo $f__all; ?> />全文</li>
			<li><input type="checkbox" name="m" value="yes" <?php echo $m_check; ?> />模糊搜索</li>
			<li>
				按
				<select name="s" size="1">
					<option value="relevance">相关性</option>
					<option value="dateline_DESC" <?php echo $s_dateline_DESC; ?>>Dateline从大到小</option>
					<option value="dateline_ASC" <?php echo $s_dateline_ASC; ?>>Dateline从小到大</option>
				</select>
				排序
			</li>
		</ul>
	</div>
	</form>

	<!-- hot search -->
	<?php if (count($hot) > 0): ?>
	<div id="hot-search" class="res_div2">
		<h4>热门搜索</h4>
		<ul>
			<?php foreach($hot as $word => $freq): ?>
			<li><a href="<?php echo $_SERVER['SCRIPT_NAME'] . '?q=' . urlencode($word); ?>"><?php echo $word; ?></a><small>(<?php echo $freq; ?>)</small></li>
			<?php endforeach; ?>		
		</ul>
	</div>
	<?php endif; ?>

	<!-- begin search result -->
	<?php if (!empty($q)): ?>
	
	<!-- neck bar -->
	<div id="res-neck">
		大约有 <strong><?php echo number_format($count); ?></strong> 项符合查询结果，
		库内数据总量为 <strong><?php echo number_format($total); ?></strong> 项。
		（搜索耗时：<?php printf('%.4f', $search_cost); ?>秒）
		[<a href="<?php echo "$bu&o=$o&n=$n&xml=yes" ;?> " target="_blank">XML</a>]	
	</div>

	<!-- error -->
	<?php if (!empty($error)): ?>
	<div id="res-error"><strong>错误：</strong><?php echo $error; ?></div>
	<?php endif; ?>

	<!-- fixed query -->
	<?php if (count($corrected) > 0): ?>
	<div id="res-fixed" class="res_div2">
		<h4>您是不是要找：</h4>
		<ul>
			<?php foreach ($corrected as $word): ?>
			<li><a href="<?php echo $_SERVER['SCRIPT_NAME'] . '?q=' . urlencode($word); ?>"><?php echo $word; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>
	
	<!-- empty result -->
	<?php if ($count === 0 && empty($error)): ?>
	<div id="res-empty">
		<p>找不到和 <strong><?php echo htmlspecialchars($q); ?></strong> 相符的内容或信息。建议您：</p>
		<ul>
			<li>请检查输入字词有无错误。</li>
			<li>请换用另外的查询字词。</li>
			<li>请改用较短、较为常见的字词。</li>
		</ul>
	</div>
	<?php endif; ?>
	
	<!-- result doc list -->
	<div id="res-list">
		<?php foreach ($docs as $doc): ?>
		<div class="res-doc">
			<h2>
				<a href="javascript:void(alert('pid: <?php echo $doc->pid; ?>'));"><?php echo $doc->rank(); ?>. <?php echo htmlspecialchars($search->highlight($doc->subject)); ?></a>
				<small>[<?php echo $doc->percent(); ?>%]</small>
			</h2>
			<p><?php echo htmlspecialchars($search->highlight($doc->message)); ?></p>
			<ul>
				<li><span>Addr:</span> <?php echo htmlspecialchars($doc->addr); ?></li>
				<li><span>Dateline:</span> <?php echo htmlspecialchars($doc->dateline); ?></li>
			</ul>
		</div>
		<?php endforeach; ?>
	</div>

	<!-- pager -->
	<?php if (!empty($pager)): ?>
	<div id="res-pager" class="res_div2">
		<strong>分页：</strong>
		<?php echo $pager; ?>
	</div>
	<?php endif; ?>
	
	<!-- related query -->
	<?php if (count($related) > 0): ?>
	<div id="res-related" class="res_div2">
		<h4>相关搜索</h4>
		<ul>
			<?php foreach ($related as $word): ?>
			<li><a href="<?php echo $_SERVER['SCRIPT_NAME'] . '?q=' . urlencode($word); ?>"><?php echo $word; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>

	<!-- end search result -->
	<?php endif; ?>

	<!-- footer -->
	<div id="footer">
		(C)opyright 2011 - Hustonline search - 页面处理总时间：<?php printf('%.4f', $total_cost); ?>秒　<br />
		Powered by <a href="http://www.xunsearch.com" target="_blank"><?php echo PACKAGE_NAME . '/' . PACKAGE_VERSION; ?></a> 
	</div>
</div><!-- outer -->

<!-- load jquery from google -->
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/redmond/jquery-ui.css" type="text/css" media="all" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>

<!-- ready script -->
<script language="javascript">
$(function(){
	// input tips
	$('#q-input .text').focus(function(){
		if ($(this).val() == $(this).attr('title')) {
			$(this).val('').removeClass('tips');
		}
	}).blur(function(){
		if ($(this).val() == '' || $(this).val() == $(this).attr('title')) {
			$(this).addClass('tips').val($(this).attr('title'));
		}
	}).blur().autocomplete({
		'source':'suggest.php',
		'select':function(ev,ui) {
			$('#q-input .text').val(ui.item.label);
			$('#q-form').submit();
		}
	});
	// submit check
	$('#q-form').submit(function(){
		var $input = $('#q-input .text');
		if ($input.val() == $input.attr('title')) {
			alert('请先输入关键词');
			$input.focus();
			return false;
		}
	});	
});	
</script>
</body>
</html>
