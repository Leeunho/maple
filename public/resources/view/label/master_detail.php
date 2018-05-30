<section id="content">

	<div class="maple-container">
		<div class="label-list">
			<div class="label-item clear">
				<div class="label-item-title">마스터라벨 <?=$label->title?></div>
			</div>
			<div class="label-item clear">
				<div class="label-item-category">[M] 헤어</div>
				<?php foreach ( $hairList as $row ){?>
					<div class="label-item-img">
						<img src="<?=$this->assets( $row->img )?>">
						<div class="label-item-name"><?=$row->name?></div>
					</div>
				<?php }?>
			</div>
			<div class="label-item clear">
				<div class="label-item-category">[M] 모자</div>
				<?php foreach ( $hatList as $row ){?>
					<div class="label-item-img">
						<img src="<?=$this->assets( $row->img )?>">
						<div class="label-item-name"><?=$row->name?></div>
					</div>
				<?php }?>
			</div>
			<div class="label-item clear">
				<div class="label-item-category">[M] 한벌옷</div>
				<?php foreach ( $overwallList as $row ){?>
					<div class="label-item-img">
						<img src="<?=$this->assets( $row->img )?>">
						<div class="label-item-name"><?=$row->name?></div>
					</div>
				<?php }?>
			</div>

			<?php if ( $gloveList ) {?>
				<div class="label-item clear">
					<div class="label-item-category">[M] 장갑</div>
					<?php foreach ( $gloveList as $row ){?>
						<div class="label-item-img">
							<img src="<?=$this->assets( $row->img )?>">
							<div class="label-item-name"><?=$row->name?></div>
						</div>
					<?php }?>
				</div>
			<?php }?>

			<?php if ( $capeList ) {?>
				<div class="label-item clear">
					<div class="label-item-category">[M] 망토</div>
					<?php foreach ( $capeList as $row ){?>
						<div class="label-item-img">
							<img src="<?=$this->assets( $row->img )?>">
							<div class="label-item-name"><?=$row->name?></div>
						</div>
					<?php }?>
				</div>
			<?php }?>

			<div class="label-item clear">
				<div class="label-item-category">[M] 신발</div>
				<?php foreach ( $shoesList as $row ){?>
					<div class="label-item-img">
						<img src="<?=$this->assets( $row->img )?>">
						<div class="label-item-name"><?=$row->name?></div>
					</div>
				<?php }?>
			</div>
			<div class="label-item clear">
				<div class="label-item-category">[M] 무기</div>
				<?php foreach ( $weaponList as $row ){?>
					<div class="label-item-img">
						<img src="<?=$this->assets( $row->img )?>">
						<div class="label-item-name"><?=$row->name?></div>
					</div>
				<?php }?>
			</div>
		</div>
	</div>

</section>