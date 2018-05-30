<section id="content">

	<div class="maple-container">
		<div class="label_thumb-list">
			<?php foreach ( $labelList as $label ){?>
				<div class="label_thumb">
					<div class="label_thumb-title">
						<div class="label_thumb-info">
							<div class="label_thumb-name"><?=$label->title?></div>
							<div class="label_thumb-duration"><?=$label->s_date?> - <?=$label->e_date?></div>
						</div>
						<div class="label_thumb-detail">
							<a href="/label/master/<?=$label->thumbID?>" class="label_thumb-btn">상세정보</a>
						</div>
					</div>
					<div class="label_thumb-img">
						<img src="<?=$this->assets( $label->m_img )?>">
						<img src="<?=$this->assets( $label->w_img )?>">
					</div>
				</div>
			<?php }?>
		</div>
	</div>

</section>