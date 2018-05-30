<?php

namespace App\Core;

use App\Core\DB;

class Controller
{

	protected $header = SOURCE . '/view/include/header.php';

	protected $viewFolder = SOURCE . '/view';

	protected $title = '메이플스토리 정보 | maple.unoup.co.kr - 무릉 전적 검색';

	// protected $description = '무릉도장 기록을 확인할 수 있습니다. 랭킹, 유저 수 등 상세 정보를 할 수 있습니다. 다양한 메이플 관련 자료를 볼 수 있습니다.';

	protected $description = '무릉도장 전적, 메이플 정보등을 볼 수 있습니다. 다양한 메이플 관련 자료를 확인하세요.';

	protected $keywords = '메이플스토리, 메이플, 메이플 무릉도장, 무릉도장, 메이플 전적 검색, 메이플 무릉 전적 검색, 무릉 전적 검색, 무릉도장 전적 검색, 랭킹, 전적검색';

	protected $msg;

	protected $msgType;

	public function __construct()
	{
		if ( isset( $_SESSION['msg'] ) ) {
			$this->msg = $_SESSION['msg'];
			unset( $_SESSION['msg'] );
		}

		if ( isset( $_SESSION['msgType'] ) ) {
			$this->msgType = $_SESSION['msgType'];
			unset( $_SESSION['msgType'] );
		}
	}

	public function assets( $link )
	{
		return '/assets/' . trim( $link, '/' );
	}

	public function success( $msg )
	{
		return $this->addMsg( 'success', $msg );
	}

	public function error( $msg )
	{
		return $this->addMsg( 'danger', $msg );
	}

	public function addMsg( $msgType, $msg )
	{
		$_SESSION['msgType'] = $msgType;
		$_SESSION['msg'] = $msg;

		return $this;
	}

	public function move( $uri )
	{
		header('Location:' . $uri);
		exit;
	}

	public function back()
	{
		$uri = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : '/';
		$this->move( $uri );
	}

	public function required( $data )
	{
		foreach ( $data as $row ) {
			if ( trim( $row ) == '' ) {
				$this->error('누락된 항목이 있습니다.')->back();
			}
		}
	}

	public function phash( $id, $pw )
	{
		return hash( 'sha256', $id . $pw );
	}

	public function text( $text )
	{
		$text = htmlentities( $text );

		return str_replace( ' ', '&nbsp;', $text );
	}

	public function p( $msg )
	{
		return htmlspecialchars($msg);
	}

	public function json( $data )
	{
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function getUserAgent()
	{	
		$user_agent = $_SERVER['HTTP_USER_AGENT'];

		$m_type = '';

		$browser = '';

		if (strpos($user_agent, 'Whale')) $browser = 'Whale';
	    elseif (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) $browser = 'Opera';
	    elseif (strpos($user_agent, 'Edge')) $browser = 'Edge';
	    elseif (strpos($user_agent, 'SamsungBrowser')) $browser = 'Samsung Internet';
	    elseif (strpos($user_agent, 'UBrowser')) $browser = 'UC Browser';
	    elseif (strpos($user_agent, 'Chrome')) $browser = 'Chrome';
	    elseif (strpos($user_agent, 'Safari')) $browser = 'Safari';
	    elseif (strpos($user_agent, 'Firefox')) $browser = 'Firefox';
	    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) $browser = 'Internet Explorer';
	    else $browser = 'etc';

		if (strpos(strtolower($user_agent), 'mobile')) $m_type = 'mobile';
		else $m_type = 'pc';

		return array('app' => $m_type, 'browser' => $browser);
	}

	public function getRealIpAddr()
	{
	    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
	    {
	      $ip=$_SERVER['HTTP_CLIENT_IP'];
	    }
	    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
	    {
	      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	    else
	    {
	      $ip=$_SERVER['REMOTE_ADDR'];
	    }

	    if ( strpos($ip, ',') ) {
	    	$ip = explode(',', $ip)[ 1 ];
	    }

	    return $ip;
	}

	public function getIP()
	{
	    $fields = array('HTTP_X_FORWARDED_FOR',
	                    'REMOTE_ADDR',
	                    'HTTP_CF_CONNECTING_IP',
	                    'HTTP_X_CLUSTER_CLIENT_IP');

	    foreach($fields as $f)
	    {
	        $tries = isset( $_SERVER[$f] ) ? $_SERVER[$f] : '';
	        if (empty($tries))
	            continue;
	        $tries = explode(',',$tries);
	        foreach($tries as $try)
	        {
	            $r = filter_var($try,
	                            FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 |
	                            FILTER_FLAG_NO_PRIV_RANGE |
	                            FILTER_FLAG_NO_RES_RANGE);

	            if ($r !== false)
	            {
	                return $try;
	            }
	        }
	    }
	    return false;
	}

	function num2han($num) { 
		// if(!ctype_digit($num)) $num = (string)$num; 
		$won = array('', '만', '억', '조', '경', '해'); 
		$rtn = ''; 
		$len = strlen($num); 
		for($i = 0, $cnt = ceil($len/4); $i < $cnt; $i++) { 
			$spos = $len - ($i + 1) * 4; 
			$epos = 4; 

			if($spos < 0) { 
				$epos += $spos; $spos = 0; 
			} 

			if($tmp = (int)substr($num, $spos, $epos)) {
				$rtn = $tmp.$won[$i].$rtn; 
			}
		} 
		return $rtn; 
	}

}