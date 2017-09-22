<?php
	//过滤危险字符
	function filterString($string){
		return preg_replace('/\<.*$/', '', $string);
	}
	//显示错误
	function showError($msg){
		$msg = filterString($msg);
		echo '<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	<title>ERROR</title>
	<link rel="stylesheet" type="text/css" href="/static/css/api.css">
	<style type="text/css">
		.tipText{
			position: fixed;
			left: 50%;
			top: 50%;
			-webkit-transform: translateX(-50%) translateY(-50%);
			-moz-transform: translateX(-50%) translateY(-50%);
			-ms-transform: translateX(-50%) translateY(-50%);
			-o-transform: translateX(-50%) translateY(-50%);
			transform: translateX(-50%) translateY(-50%);
			padding: 10px 20px;
			text-align: center;
			border-radius: 3px;
			font-size: 20px;
		}
	</style>
	<style id="style-1-cropbar-clipper">/* Copyright 2014 Evernote Corporation. All rights reserved. */
	.en-markup-crop-options {
	    top: 18px !important;
	    left: 50% !important;
	    margin-left: -100px !important;
	    width: 200px !important;
	    border: 2px rgba(255,255,255,.38) solid !important;
	    border-radius: 4px !important;
	}
	
	.en-markup-crop-options div div:first-of-type {
	    margin-left: 0px !important;
	}
	</style>
</head>
<body>
	<div class="tipText">
		'.$msg.'
	</div>
</body>
</html> ';
		die;
	}
    //获取来源URL
    function getoldurl(){
    	return $_SERVER['HTTP_REFERER'];
    }
    //输出调试
    function P($data){
    	echo "<pre>";
    	print_r($data);
        die;
    }
    //取出二维数组中特定列
    function array_get_by_key(array $array, $string){
    	foreach ($array as $ar){
    		$res[] = $ar[$string];
    	}
    	return $res;
    }
    //获取客户端真实IP
    function getIPaddress(){
	    $IPaddress='';    
    	if (isset($_SERVER)){    
    		if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){    
    			$IPaddress = $_SERVER["HTTP_X_FORWARDED_FOR"];    
    		} else if (isset($_SERVER["HTTP_CLIENT_IP"])) {    
    			$IPaddress = $_SERVER["HTTP_CLIENT_IP"];    
    		} else {    
    			$IPaddress = $_SERVER["REMOTE_ADDR"];    
    		}    
    	} else {    
    		if (getenv("HTTP_X_FORWARDED_FOR")){    
    			$IPaddress = getenv("HTTP_X_FORWARDED_FOR");    
    		} else if (getenv("HTTP_CLIENT_IP")) {    
    			$IPaddress = getenv("HTTP_CLIENT_IP");    
    		} else {    
    			$IPaddress = getenv("REMOTE_ADDR");    
    		}    
    	}    
    	return $IPaddress;
    
    }
    //获取域名
    function getUrl(){
    	return 'http://'.$_SERVER['HTTP_HOST'];
    }
    //判断是否微信访问
    function IS_WEIXIN(){
    	if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
    		return true;
    	}
    	return false;
    }
    function curlGet($url,$params='') {
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
    	curl_setopt($ch, CURLOPT_TIMEOUT,3);
    	$data = curl_exec($ch);
    	curl_close ($ch);
    	return $data;
    }
    function getData($url) {
    	$data = file_get_contents($url);
    	$data = json_decode($data, true);
    	return $data;
    }
    function curlPost($url, $data,$showError=1){
    	$ch = curl_init();
    	$header = "Accept-Charset: utf-8";
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    	curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$data = curl_exec($ch);
    	$errorno=curl_errno($ch);
    	if ($errorno) {
    		return $errorno;
    	}else{
    		$data = json_decode($data, true);
    		return $data;
    	}
    }
    /**
     * 签名字符串
     * @param $prestr 需要签名的字符串
     * @param $key 私钥
     * return 签名结果
     */
    function md5Sign($prestr, $key) {
    	$prestr = $prestr . $key;
    	return md5($prestr);
    }
    
    /**
     * 验证签名
     * @param $prestr 需要签名的字符串
     * @param $sign 签名结果
     * @param $key 私钥
     * return 签名结果
     */
    function md5Verify($prestr, $sign, $key) {
    	$prestr = $prestr . $key;
    	$mysgin = md5($prestr);
    	if($mysgin == $sign) {
    		return true;
    	}
    	else {
    		return false;
    	}
    }
	//判断是否手机
    function isMobile(){
    	$useragent=isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
    	$useragent_commentsblock=preg_match('|\(.*?\)|',$useragent,$matches)>0?$matches[0]:'';
    	function CheckSubstrs($substrs,$text){
    		foreach($substrs as $substr)
    			if(false!==strpos($text,$substr)){
    			return true;
    		}
    		return false;
    	}
    	$mobile_os_list=array('Google Wireless Transcoder','Windows CE','WindowsCE','Symbian','Android','armv6l','armv5','Mobile','CentOS','mowser','AvantGo','Opera Mobi','J2ME/MIDP','Smartphone','Go.Web','Palm','iPAQ');
    	$mobile_token_list=array('Profile/MIDP','Configuration/CLDC-','160×160','176×220','240×240','240×320','320×240','UP.Browser','UP.Link','SymbianOS','PalmOS','PocketPC','SonyEricsson','Nokia','BlackBerry','Vodafone','BenQ','Novarra-Vision','Iris','NetFront','HTC_','Xda_','SAMSUNG-SGH','Wapaka','DoCoMo','iPhone','iPod');
    
    	$found_mobile=CheckSubstrs($mobile_os_list,$useragent_commentsblock) ||
    	CheckSubstrs($mobile_token_list,$useragent);
    
    	if ($found_mobile){
    		return true;
    	}else{
    		return false;
    	}
    }
    function encrypt($data, $key) {
    	$prep_code = serialize($data);
    	$block = mcrypt_get_block_size('des', 'ecb');
    	if (($pad = $block - (strlen($prep_code) % $block)) < $block) {
    		$prep_code .= str_repeat(chr($pad), $pad);
    	}
    	$encrypt = mcrypt_encrypt(MCRYPT_DES, $key, $prep_code, MCRYPT_MODE_ECB);
    	return base64_encode($encrypt);
    }
    
    function decrypt($str, $key) {
    	$str = base64_decode($str);
    	$str = mcrypt_decrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);
    	$block = mcrypt_get_block_size('des', 'ecb');
    	$pad = ord($str[($len = strlen($str)) - 1]);
    	if ($pad && $pad < $block && preg_match('/' . chr($pad) . '{' . $pad . '}$/', $str)) {
    		$str = substr($str, 0, strlen($str) - $pad);
    	}
    	return unserialize($str);
    }
	//生成随机字符串
	function createString($length = 5, $num = false){
		$string = '';
		$str = $num ? '1234567890' : 'qwertyuiopasdfghjklzxcvbnm1234567890';
		for($i = 0; $i < $length; $i++){
			$string .= $str[rand(0, strlen($str)-1)];
		}
		return $string;
	}
    //加密id
    function encodeID($int, $format=8) {
    	$dics = array( 
			0=>'0', 1=>'1', 2=>'2', 3=>'3', 4=>'4', 5=>'5', 6=>'6', 7=>'7', 8=>'8', 
			9=>'9', 10=>'A', 11=>'B', 12=>'C', 13=>'D', 14=>'E', 15=>'F', 16=>'G', 17=>'H', 
			18=>'I',19=>'J', 20=>'K', 21=>'L', 22=>'M', 23=>'N', 24=>'O', 25=>'P', 26=>'Q', 
			27=>'R',28=>'S', 29=>'T', 30=>'U', 31=>'V', 32=>'W', 33=>'X', 34=>'Y', 35=>'Z'
		);
    	$dnum = 36; //进制数
    	$arr = array ();
    	$loop = true;
    	while ($loop) {
    		$arr[] = $dics[bcmod($int, $dnum)];
    		$int = bcdiv($int, $dnum, 0);
    		if ($int == '0') {
    			$loop = false;
    		}
    	}
    	if (count($arr) < $format)
    		$arr = array_pad($arr, $format, $dics[0]);
    	return implode('', array_reverse($arr));
    }
    //解密id
    function decodeID($ids) {
    	$dics = array( 
			0=>'0', 1=>'1', 2=>'2', 3=>'3', 4=>'4', 5=>'5', 6=>'6', 7=>'7', 8=>'8', 
			9=>'9', 10=>'A', 11=>'B', 12=>'C', 13=>'D', 14=>'E', 15=>'F', 16=>'G', 17=>'H', 
			18=>'I',19=>'J', 20=>'K', 21=>'L', 22=>'M', 23=>'N', 24=>'O', 25=>'P', 26=>'Q', 
			27=>'R',28=>'S', 29=>'T', 30=>'U', 31=>'V', 32=>'W', 33=>'X', 34=>'Y', 35=>'Z'
		);
    	$dnum = 36; //进制数
    	//键值交换
    	$dedic = array_flip($dics);
    	//去零
    	$id = ltrim($ids, $dics[0]);
    	//反转
    	$id = strrev($id);
    	$v = 0;
    	for ($i = 0, $j = strlen($id); $i < $j; $i++) {
    		$v = bcadd(bcmul($dedic[$id {
    			$i }
    			], bcpow($dnum, $i, 0), 0), $v, 0);
    	}
    	return $v;
    }
	//数组转化json,中文不转义
	function json_encode_cn($input){
		// 从 PHP 5.4.0 起, 增加了这个选项.
		if(defined('JSON_UNESCAPED_UNICODE')){
			return json_encode($input, JSON_UNESCAPED_UNICODE);
		}
		if(is_string($input)){
			$text = $input;
			$text = str_replace('\\', '\\\\', $text);
			$text = str_replace(
					array("\r", "\n", "\t", "\""),
					array('\r', '\n', '\t', '\\"'),
					$text);
			return '"' . $text . '"';
		}else if(is_array($input) || is_object($input)){
			$arr = array();
			$is_obj = is_object($input) || (array_keys($input) !== range(0, count($input) - 1));
			foreach($input as $k=>$v){
				if($is_obj){
					$arr[] = json_encode_cn($k) . ':' . json_encode_cn($v);
				}else{
					$arr[] = json_encode_cn($v);
				}
			}
			if($is_obj){
				return '{' . join(',', $arr) . '}';
			}else{
				return '[' . join(',', $arr) . ']';
			}
		}else{
			return $input . '';
		}
	}
	/**
	 * 	作用：以post方式提交xml到对应的接口url
	 */
	function postXmlCurl($url, $xml, $second=30)
	{
		//初始化curl
		$ch = curl_init();
		//设置超时
		curl_setopt($ch, CURLOP_TIMEOUT, $second);
		//这里设置代理，如果有的话
		//curl_setopt($ch,CURLOPT_PROXY, '8.8.8.8');
		//curl_setopt($ch,CURLOPT_PROXYPORT, 8080);
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
		//设置header
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		//要求结果为字符串且输出到屏幕上
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		//post提交方式
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		//运行curl
		$data = curl_exec($ch);
		curl_close($ch);
		//返回结果
		if($data)
		{
			curl_close($ch);
			return $data;
		}
	}
	//生成签名
	function create_sign(array $array){
		$buff = '';
		ksort($array);                      //字典序排序
		foreach ($array as $k => $v){
			$buff .= $k . '=' . $v . '&';
		}
		$buff .= 'key=' . C('WECHAT_KEY');
		$buff  = md5($buff);
		$sign  = strtoupper($buff);         //转化为大写
		return $sign;
	}
	//生成xml
	function create_xml(array $array){
		$xml = '<xml>';
		foreach ($array as $key=>$val)
		{
			if (is_numeric($val)){
				$xml .= '<'.$key.'>'.$val.'</'.$key.'>';

			}
			else
				$xml .= '<'.$key.'><![CDATA['.$val.']]></'.$key.'>';
		}
		$xml .= '</xml>';
		return $xml;
	}
	//检测签名
	function checkSign(array $array){
		$old_sign = $array['sign'];
		unset($array['sign']);
		$sign = create_sign($array); //本地签名
		if ($old_sign == $sign) {
			return true;
		}
		return false;
	}
	//格式化时间
	function formatTime($time)
	{
		$surplus = time() - $time;
		if ($surplus < 60) {
			return $surplus . '秒前';
		} elseif ($surplus < 3600) {
			return round($surplus / 60) . '分钟前';
		} elseif ($surplus < 86400) {
			return round($surplus / 3600) . '小时前';
		} else {
			return round($surplus / 86400) . '小时前';
		}
	}
	function seach_key($array, $value) {
		foreach ($array as $key => $val) {
			$k = array_search($value, $val);
			if ($k !== false) {
				return array($key, $k);
			}
		}
	}
	function get_rand($num = 6) {
		$string = '1234567890qwertyuiopasdfghjklzxcvbnm';
		$max = strlen($string);
		for ($i = 1; $i <= $num; $i++) {
			$str .= $string[rand(0, $max-1)];
		}
		return $str;
	}
	function createBaiduUrl($url)
	{
		//所有的y值
		$y = array(
				0=>'0123456789abcdef',
				'1032547698badcfe',
				'23016745ab89efcd',
				'32107654ba98fedc',
				'45670123cdef89ab',
				'54761032dcfe98ba',
				'67452301efcdab89',
				'76543210fedcba98',
				'89abcdef01234567',
				'98badcfe10325476',
				'ab89efcd23016745',
				'ba98fedc32107654',
				'cdef89ab45670123',
				'dcfe98ba54761032',
				'efcdab8967452301',
				'fedcba9876543210'
		);
		//所有的x值
		$x = array(
				0=>'016745',
				'107654',
				'234567',
				'321076',
				'325476',
				'452301',
				'543210',
				'670123',
				'765432',
				'761032',
				'89abcd',
				'89efcd',
				'98fedc',
				'abcdef',
				'badcfe',
				'cdab89',
				'dcba98',
				'ef89ab',
				'fe98ba'
		);
		//$ascii码表x,y位置
		$ascii = array(
				0=>array(' ','!','"','#','$','%','&','\'','(',')','*','+',',','-','.','/'),
				1=>array('0','1','2','3','4','5','6','7','8','9',':',';','<','=','>','?'),
				2=>array('@','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O'),
				3=>array('P','Q','R','S','T','U','V','W','X','Y','Z','[','\\',']','^','_'),
				4=>array('`','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o'),
				5=>array('p','q','r','s','t','u','v','w','x','y','z','{','|','}','~',' '),);
		//url第N个位置对应的(x,y)，目前只得到80位的url
		$data  = array(
				array(13,10),
				array(10,1),
				array(16,15),
				array(7,6),
				array(5,13),
				array(18,9),
				array(13,11),
				array(7,12),
				array(10,5),
				array(15,9),
				array(15,9),
				array(13,5),
				array(16,11),
				array(0,1),
				array(8,2),
				array(8,5),
				array(0,0),
				array(17,15),
				array(14,8),
				array(2,1),
				array(10,5),
				array(17,14),
				array(16,5),
				array(3,8),
				array(14,9),
				array(5,8),
				array(15,1),
				array(3,15),
				array(13,10),
				array(10,12),
				array(5,7),
				array(0,2),
				array(18,14),
				array(0,15),
				array(1,6),
				array(13,5),
				array(2,1),
				array(15,14),
				array(18,8),
				array(18,9),
				array(1,10),
				array(14,14),
				array(13,2),
				array(5,3),
				array(5,8),
				array(0,4),
				array(1,5),
				array(16,1),
				array(8,1),
				array(2,5),
				array(10,7),
				array(10,15),
				array(14,14),
				array(17,3),
				array(15,0),
				array(14,5),
				array(7,7),
				array(3,4),
				array(14,8),
				array(12,0),
				array(13,12),
				array(12,3),
				array(6,5),
				array(3,1),
				array(1,14),
				array(5,4),
				array(0,12),
				array(7,0),
				array(10,7),
				array(15,12),
				array(8,2),
				array(18,15),
				array(3,12),
				array(1,12),
				array(0,15),
				array(17,4),
				array(17,2),
				array(11,1),
				array(3,12),
				array(11,5),
				array(0,13),
				array(1,1),
				array(2,12)
		);
		$start = 'http://www.baidu.com/link?url='.get_rand().'30fc293c5e471ef23de092fddc99';
		$url = str_replace('http://', '', $url);
		$array = str_split($url);
        $string = '';

		foreach($array as $k => $ar) {
			$this_data_x = str_split($x[$data[$k][0]]);
			$this_data_y = str_split($y[$data[$k][1]]);
			$keys = seach_key($ascii, $ar);
			$string .= $this_data_x[$keys[0]].$this_data_y[$keys[1]];
		}
		return $start.$string;
	}
	function createSinaUrl($url)
	{
		$ips = array('123.125.106.196', '180.149.135.224');
		$keys = array('3612000037', '3398000046', '3867000033', '3910000034', '3280000033', '3493000038', '3256000036', '3915000038', '3082000049', '3307000047', '3537000042', '3312000033', '3172000051', '3798000047', '3992000049', '3949000057', '3567000063', '3920000048', '3976000048', '3558000056', '3770000054', '3420000048', '3133000049', '3481000055', '3246000057', '3337000063', '3686000067', '3468000064', '3317000058', '3532000066', '3442000071', '3398000093', '3454000073', '3009000078', '3290000080', '3237000083', '3354000101', '3889000082', '3899000097', '3030000108', '3093000092', '3327000102', '3202000087', '3917000093', '3446000101', '3465000093', '3197000114', '3735000103', '3442000115', '3407000104', '3495000114', '3729000107', '3384000121', '3174000113', '3857000138', '3384000126', '3386000142', '3904000123', '3868000129', '3408000107', '3509000133', '3905000126', '3992000131', '3619000124', '3999000131', '3452000138', '3207000142', '3537000131', '3625000135', '3321000151', '3147000142', '3005000137', '3344000138', '3511000152', '3042000158', '3818000147', '3526000161', '3043000157', '3996000145', '3080000152', '3640000165', '3276000164', '3496000147', '3335000159', '3006000160', '3171000179', '3915000181', '3700000172', '3744000179', '3112000169', '3015000173', '3483000169', '3422000184', '3388000180', '3567000205', '3421000181', '3611000200', '3302000190', '3211000198', '3395000192', '3601000184', '3811000213', '3102000208', '3959000202', '3637000195', '3428000191', '3907000204', '3991000192', '3173000201', '3885000215', '3977000197', '3960000215', '3506000221', '3829000211', '3659000246', '3874000239', '3827000225', '3143000239', '3991000210', '3334000232', '3251000218', '3784000212', '3046000245', '3489000249', '3261000228', '3947000242', '3983000244', '3933000244', '3110000245', '3097000263', '3474000251', '3086000222', '3781000254', '3160000263', '3659000275', '3194000252', '3673000229', '3198000250', '3864000261', '3738000281', '3005000238', '3878000265', '3535000243', '3804000262', '3546000253', '3688000264', '3457000268', '3745000255', '3271000270', '3710000262', '3684000244', '3593000273', '3885000272', '3138000267', '3950000290', '3744000293', '3903000292', '3175000275', '3655000296', '3205000292', '3532000297', '3183000319', '3254000314', '3740000293', '3662000302', '3164000299', '3212000295');
		$sinaApi = 'http://'.$ips[array_rand($ips, 1)].'/short_url/shorten.json?source='.$keys[array_rand($keys, 1)].'&url_long='.urlencode($url);
		$sinaData = file_get_contents($sinaApi);
		$sinaData = str_replace('[', '', $sinaData);
		$sinaData = str_replace(']', '', $sinaData);
		$sinaAry = json_decode($sinaData, true);
		return $sinaAry['url_short'];
	}
