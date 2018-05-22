<section id="content">	
	<div class="maple-container">
		<div class="maple-dojang__cards clear">
			<div class="maple-dojang__card-info">
				<div class="maple-dojang__card-info__title">보스 정보</div>
				<div class="maple-dojang__card-info__content">
					<div class="maple-dojang__card-info__img">
						<img src="/assets/images/dojang/<?=$mobData->floor?>.png" alt="<?=$mobData->name?>">
					</div>
					<div class="maple-dojang__card-info__text">
						층수 : <?=$mobData->floor?>층
					</div>
					<div class="maple-dojang__card-info__text">
						이름 : <?=$mobData->name?>
					</div>
					<div class="maple-dojang__card-info__text">
						레벨 : <?=$mobData->level?>
					</div>
					<div class="maple-dojang__card-info__text">
						체력 : <?=number_format($mobData->hp)?>
					</div>
					<div class="maple-dojang__card-info__text">
						방어율 : 50%
					</div>
				</div>
			</div>
			<div class="maple-dojang__cards-content">	
				<div class="maple-dojang__cards-list clear">	
					<?php foreach ( $dojangData as $mob ){?>
						<div class="maple-dojang__card <?php if ( $mob->floor == $floor ) echo 'active'; ?>">	
							<div class="maple-dojang__card-content">	
								<div class="maple-dojang__card-img">
									<a href="/dojang/<?=$mob->floor?>"><img src="<?=$this->assets('images/dojang/' . $mob->floor . '.png')?>" alt="<?=$mob->name?>"></a>
								</div>
								<div class="maple-dojang__card-name">
									<?=$mob->name?>
								</div>
							</div>
						</div>	
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</section>	

<style type="text/css">
		
	.maple-dojang__cards {width: 100%; padding-bottom: 20px;}
	.maple-dojang__card-info {float: right; width: 35%; background: #fff; border: 1px solid #e9eff4; border-left: none; box-shadow: 0 1px 1px 0 rgba(0,0,0,0.12);}
	.maple-dojang__card-info__title {height: 50px; line-height: 50px; padding: 0 30px; border-bottom: 1px solid #e9eff4; font-weight: bold; color: #434343;}
	.maple-dojang__card-info__content {padding: 30px;}
	.maple-dojang__card-info__img {width: 100%; text-align: center;}
	.maple-dojang__card-info__img img {max-width: 100%; max-height: 100%;}
	.maple-dojang__card-info__text {margin-top: 12px;}

	.maple-dojang__cards-content {float: right; width: 65%; padding: 20px 20px 20px 11px; background: #fbfbfb; box-shadow: 0 1px 1px 0 rgba(0,0,0,0.12); border: 1px solid #e9eff4; border-radius: 3px; border-top-right-radius: 0;}

	@media (max-width: 960px) {
		.maple-dojang__card-info {width: 100%; margin-bottom: 20px;}
		.maple-dojang__cards-content {width: 100%;}
	}

	.maple-dojang__card {float: left; width: 25%; padding: 10px; position: relative;}
	.maple-dojang__card.active .maple-dojang__card-content {padding: 14px; border: 2px solid #fea24d}

	@media (max-width: 760px) {
		.maple-dojang__card {width: 33.33%;}
	}

	@media (max-width: 460px) {
		.maple-dojang__card {width: 50%;}
	}

	.maple-dojang__card-content {
		width: 100%;
		height: 100%;
		padding: 15px;
		background: #fff;
		border: 1px solid #e9eff4;
		box-shadow: 0 1px 1px 0 rgba(0,0,0,0.12);
		text-align: center;
		border-radius: 4px;
	}

	.maple-dojang__card-content img {
		max-width: 100%;
		max-height: 100%;
		vertical-align: middle;
	}

	.maple-dojang__card-img {
		height: 60px;
		line-height: 54px;
		margin-bottom: 20px;
	}

	.maple-dojang__card-name {padding-top: 20px; border-top: 1px solid #ddd; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;}
</style>