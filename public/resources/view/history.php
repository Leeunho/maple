<section id="content">
	<div class="maple-container">
		<div class="maple-index__ranking-list">	
			<div class="maple-index__ranking-item">	
				<div class="maple-index__ranking-header">
					<p>
						IP를 기준으로 찾은 검색기록입니다.<br><br>
						검색횟수 : <?=$countlist->count?>회
					</p>
				</div>
				<div class="maple-index__ranking-content">	
					<div class="maple-index__dojang-server-wrap">	
						<?php foreach ( $loglist as $log ){?>
							<div class="maple-history__item clear">	
								<div class="maple-history__item-content">
									<div class="maple-history__item-keyword">
										<p><a href="/search?username=<?=urlencode($log->text)?>"><?=$log->text?></a></p>
										<p>검색어</p>
									</div>
									<div class="maple-history__item-keyword">
										<p><?=$log->app?></p>
										<p>어플리케이션</p>
									</div>
									<div class="maple-history__item-keyword">
										<p><?=$log->browser?></p>
										<p>브라우저</p>
									</div>
									<div class="maple-history__item-keyword">
										<p><?=$log->date?></p>
										<p>날짜</p>
									</div>
								</div>
							</div>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<style type="text/css">
		.maple-history__item {width: 100%; border-radius: 4px; background: #fff; border: 1px solid #e9eff4; box-shadow: 0 1px 1px 0 rgba(0,0,0,.12); padding: 15px; margin-bottom: 8px;}
		.maple-history__item-content {padding-left: 10px; width: 100%;}
		.maple-history__item-keyword {float: left; width: 25%;}
		.maple-history__item-keyword p:first-child {color: #434343; font-size: 14px;}
		.maple-history__item-keyword p:last-child {margin-top: 8px; color: #696969; font-size: 13px;}
		.maple-history__item-keyword a {color: #fea24d; text-decoration: underline;}

		@media (max-width: 720px) {
			.maple-search__item-content {display: block;}
			.maple-history__item-keyword {width: 100%; display: block; text-align: left;}
			.maple-history__item-keyword p {display: inline-block; margin-right: 5px;}
		}
	</style>
</section>