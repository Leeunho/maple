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
						체력 : <?=number_format($mobData->hp)?> <span>(<?=$this->num2han($mobData->hp)?>)</span>
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
									<?=$mob->floor?>층
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