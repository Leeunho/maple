<?php

namespace App\Controller;

use App\Core\Controller;
use App\Core\DB;

class WebController extends Controller
{

	public function index()
	{
		$serverUserList = [];

		$serverList = DB::fetchAll('SELECT * FROM server_icon');

		$serverCountList = DB::fetchAll('select server, COUNT(server) as count FROM dojangRanking where date = (SELECT max(date) FROM dojangRanking) GROUP BY server order by count desc');

		require_once $this->viewFolder . '/header.php';
		require_once $this->viewFolder . '/index.php';
		require_once $this->viewFolder . '/footer.php';
	}

	public function search()
	{	
		$userlist = false;

		if ( isset( $_GET['username'] ) ) {
			$username = substr($this->p( $_GET['username'] ), 0, 50);
			if ( trim($username) != '' ) {
				$sql = 'SELECT d.*, s.img as server_img ';
				$sql .= 'FROM (SELECT distinct name, layer, server, clearTime, date, level, job, jobDetail, img FROM dojangRanking where name = ?) as d ';
				$sql .= 'LEFT JOIN server_icon as s ';
				$sql .= 'ON d.server = s.serverID '; 
				$sql .= 'order by d.date desc';

				$userlist = DB::fetchAll($sql, array( $username ));

				$crawlerDate = DB::fetch('SELECT ROUND(AVG(layer)) as layer, ROUND(AVG(clearTime)) as clearTime, min(date) as min, max(date) as max FROM dojangRanking where name = ?', array($username));

				$userinfo = DB::fetch('SELECT server, date, name, job, jobDetail, layer, clearTime FROM dojangRanking where name = ? order by layer desc, clearTime asc', array($username));

				if ( $userinfo ) {
					$this->title = $userinfo->name . ' - 무릉 전적 - maplestory';
					$this->description = $userinfo->name . ' / 서버 - ' . $userinfo->server . ' / 직업 - ' . $userinfo->job . ' ' . $userinfo->jobDetail .  ' / 최고 도달층 - ' . $userinfo->layer . '층 / 기록 - ' . floor($userinfo->clearTime / 60) . '분' . $userinfo->clearTime % 60 . '초';
				}

				$userAgent = $this->getUserAgent();
				DB::prepare('INSERT INTO searchlog (ip, app, browser, text, date) VALUES (?, ?, ?, ?, now())', array($this->getRealIpAddr(), $userAgent['app'], $userAgent['browser'], $username));
			}
		}

		require_once $this->viewFolder . '/header.php';
		require_once $this->viewFolder . '/search.php';
		require_once $this->viewFolder . '/footer.php';
	}

	public function dojang($floor = 1)
	{ 
		$dojangData = DB::fetchAll('SELECT * FROM dojangData');
		$mobData = DB::fetch('SELECT * FROM dojangData where floor = ?', array( $floor ));

		if ( !$mobData ) $this->move('/dojang/1');

		$this->title = $mobData->name . ' - 무릉도장 정보 - maplestory';
		$this->description = $mobData->name . ' / 층수 - ' . $mobData->floor . '층 / 레벨 - ' . $mobData->level . ' / 체력 - ' . $mobData->hp;
					
		require_once $this->viewFolder . '/header.php';
		require_once $this->viewFolder . '/dojang.php';
		require_once $this->viewFolder . '/footer.php';
	}

	public function log()
	{
		$visitCount = DB::fetch('SELECT COUNT(DISTINCT ip) as count FROM searchlog where DATE_FORMAT(date,"%Y-%m-%d") = CURDATE()');
		$logCount = DB::fetch('SELECT COUNT(ip) as count FROM searchlog where DATE_FORMAT(date,"%Y-%m-%d") = CURDATE()');
		$loglist = DB::fetchAll('SELECT * FROM searchlog order by date desc limit 0, 100');

		require_once $this->viewFolder . '/header.php';
		require_once $this->viewFolder . '/log.php';
		require_once $this->viewFolder . '/footer.php';
	}

	public function test()
	{

	}

}