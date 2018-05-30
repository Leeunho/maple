<section id="content">
	<div class="maple-container">
		<div class="maple-search__item">	
			<div class="maple-search__item-text">	
				<p>
					닉네임을 기준으로 분류하기에 닉네임 변경에 취약합니다.<br><br> 
					메이플 공식홈페이지를 매일 7시 ~ 19시까지 수집합니다.<br><br>
					현재 사이트는 Beta 버전(ver 1.0)이며, 버그가 있을 수 있습니다.<br><br>
					크롬, 익스11, 파이어폭스를 지원하며, Android 2.1~4.3과 IE 10이하는 정상적으로 보이지 않을 수도 있습니다.
				</p>
			</div>	
		</div>
		<div class="maple-search">
			<?php if ( $userlist ){?>
				<div class="maple-search__user">
					<div class="maple-search__user-wrapper">
						<div class="maple-search__user-title">
							<?=$userinfo->name?>님의 정보
						</div>
						<div class="maple-search__user-content">
							<div>서버 : <?=$userinfo->server?></div>
							<div>직업 : <?=$userinfo->job?><?php if ( $userinfo->jobDetail != $userinfo->job ){?>/<?=$userinfo->jobDetail?><?php }?></div>
							<div>최고 도달층 : <?=$userinfo->layer?>층</div>
							<div>기록 : <?=floor($userinfo->clearTime / 60)?>분 <?=$userinfo->clearTime % 60?>초</div>
							<div>날짜 : <?=$userinfo->date?></div>
							<div>무릉도장 횟수 : <?=count($userlist)?>개</div>
							<div>무릉도장 기간 : <?=$crawlerDate->min?> ~ <?=$crawlerDate->max?></div>
							<div>평균 도달층 : <?=$crawlerDate->layer?>층</div>
							<div>평균 클리어시간 : <?=floor($crawlerDate->clearTime / 60)?>분 <?=$crawlerDate->clearTime % 60?>초</div>
						</div>
					</div>
				</div>
				<ul class="maple-search__item-list">
					<?php foreach ( $userlist as $user ){?>
						<li class="maple-search__item">
							<div class="maple-search__item-img">
								<img src="<?=$user->img?>" alt="<?=$user->name?>">
								<span>vs</span>
								<div class="maple-search__item-mob">
									<a href="/dojang/<?=$user->layer?>"><img src="<?=$this->assets('/images/dojang/' . $user->layer)?>.png" alt="무릉도장"></a>
								</div>
							</div>
							<div class="maple-search__item-content">
								<div class="maple-search__item-level maple-search__item-text">
									<?=$user->level?>
									<p>레벨</p>
								</div>
								<div class="maple-search__item-text">
									<?=$user->job?><?php if ( $user->jobDetail != $user->job ){?>/<?=$user->jobDetail?><?php }?>
									<p>직업</p>
								</div>
								<div class="maple-search__item-layer maple-search__item-text">
									<?=$user->layer?>층
									<p>도달층</p>
								</div>
								<div class="maple-search__item-clearTime maple-search__item-text">
									<?=floor($user->clearTime / 60)?>분 <?=$user->clearTime % 60?>초
									<p>기록</p>
								</div>
								<div class="maple-search__item-date maple-search__item-text">
									<?=$user->date?>
									<p>날짜</p>
								</div>
							</div>
						</li>
					<?php }?>
				</ul>
			<?php }else{?>
				<div class="maple-search__item">
					<div class="maple-search__item-text">검색한 내용에 대한 데이터가 없습니다.</div>
				</div>
			<?php }?>
		</div>
	</div>
</section>
