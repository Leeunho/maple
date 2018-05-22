<section id="content">
	<div class="maple-container">
		<div class="maple-search__item maple-log">	
			<div class="maple-search__item-content">	
				<div class="maple-search__item-text">
					<p><?=$visitCount->count?>명</p>	
					<p>방문자 수</p>
				</div>	
				<div class="maple-search__item-text">	
					<p><?=$logCount->count?>회</p>
					<p>총 검색 수</p>
				</div>	
			</div>
		</div>
		<?php foreach ( $loglist as $log ){?>
			<div class="maple-search__item maple-log">	
				<div class="maple-search__item-content">
					<div class="maple-search__item-text">
						<p><?=preg_replace('/([0-9]){1,3}\.([0-9]){1,3}$/', '***.***', $log->ip)?></p>
						<p>아이피</p>
					</div>
					<div class="maple-search__item-text">
						<p><?=$log->text?></p>
						<p>검색어</p>
					</div>
					<div class="maple-search__item-text">
						<p><?=$log->app?></p>
						<p>어플리케이션</p>
					</div>
					<div class="maple-search__item-text">
						<p><?=$log->browser?></p>
						<p>브라우저</p>
					</div>
					<div class="maple-search__item-text">
						<p><?=$log->date?></p>
						<p>날짜</p>
					</div>
				</div>
			</div>
		<?php }?>
	</div>
</section>