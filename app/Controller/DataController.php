<?php

namespace App\Controller;

use App\Core\Controller;
use App\Core\DB;

class DataController extends Controller
{

	public function ranking () 
	{
		$params = [];

		$sql = 'SELECT d.server, d.name, d.level, d.job, d.jobDetail, d.layer, d.img, d.clearTime, s.img as server_img FROM dojangRanking as d ';
		$sql .= 'LEFT JOIN server_icon as s ON d.server = s.serverID ';
		$sql .= 'where date = :date ';

		if ( isset( $_GET['date'] ) ) {
			$params[':date'] = $_GET['date'];
		} else {
			$params[':date'] = DB::fetch('SELECT max(date) as max_date FROM dojangRanking')->max_date;
		}

		if ( isset( $_GET['server'] ) ) {
			$sql .= 'and server = :server ';
			$params[':server'] = $_GET['server'];
		}

		$sql .= 'order by layer desc, clearTime asc ';
		$sql .= 'limit 0, 10';

		$rankingList = DB::fetchAll($sql, $params);

		$this->json($rankingList);
	}


}