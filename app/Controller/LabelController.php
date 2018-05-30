<?php

namespace App\Controller;

use App\Core\Controller;
use App\Core\DB;

class LabelController extends Controller
{

	public function master()
	{
		$labelList = DB::fetchAll('SELECT * FROM label_thumb where type = ?', array('master'));

		$this->title = '마스터라벨 정보 - maplestory';
		$this->description = '메이플스토리 마스터라벨 1기 ~ ' . count($labelList) . '기 정보';

		require_once $this->viewFolder . '/header.php';
		require_once $this->viewFolder . '/label/master_thumb.php';
		require_once $this->viewFolder . '/footer.php';
	}

	public function master_detail($idx)
	{
		$label = DB::fetch('SELECT * FROM label_thumb where thumbID = ? and type = ?', array($idx, 'master'));
		$hairList = DB::fetchAll('SELECT * FROM label where thumbID = ? and category = ?', array($idx, 'hair'));
		$hatList = DB::fetchAll('SELECT * FROM label where thumbID = ? and category = ?', array($idx, 'hat'));
		$overwallList = DB::fetchAll('SELECT * FROM label where thumbID = ? and category = ?', array($idx, 'overwall'));
		$gloveList = DB::fetchAll('SELECT * FROM label where thumbID = ? and category = ?', array($idx, 'glove'));
		$capeList = DB::fetchAll('SELECT * FROM label where thumbID = ? and category = ?', array($idx, 'cape'));
		$shoesList = DB::fetchAll('SELECT * FROM label where thumbID = ? and category = ?', array($idx, 'shoes'));
		$weaponList = DB::fetchAll('SELECT * FROM label where thumbID = ? and category = ?', array($idx, 'weapon'));

		$desList = DB::fetchAll('SELECT * FROM label where thumbID = ?', array( $idx ));
		$des = '';

		foreach ( $desList as $key => $row ) {
			$des .= $row->name;
			if ( count( $desList ) - 1 > $key ) {
				$des .= ' , ';
			}
		}

		$this->title = '마스터라벨 ' . $label->title . ' - maplestory';
		$this->description = $des;

		require_once $this->viewFolder . '/header.php';
		require_once $this->viewFolder . '/label/master_detail.php';
		require_once $this->viewFolder . '/footer.php';
	}

}