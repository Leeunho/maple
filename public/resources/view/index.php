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
	
		<div class="maple-index__ranking-list">
			<div class="maple-index__ranking-item">
				<div class="maple-index__ranking-header">
					이번주 무릉랭킹 top 10
				</div>
				<div class="maple-index__ranking-content">
					<div class="maple-index__ranking-server">
						<span class="maple-index__server active" data-server="all">전체 랭킹</span>
						<?php foreach ( $serverList as $idx => $server ){?>
							<span class="maple-index__server" data-server="<?=$server->serverID?>">
								<img src="<?=$server->img?>" alt="<?=$server->serverID?>" title="<?=$server->serverID?>">
								<?=$server->serverID?>
							</span>
						<?php }?>
					</div>
					<div class="maple-index__ranking-items">
						<div class="loading">							
							<i class="fa fa-spinner fa-spin"></i>
							<p>로딩중...</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="maple-index__ranking-list">
			<div class="maple-index__ranking-item">
				<div class="maple-index__ranking-header">
					이번주 서버 별 무릉 유저
				</div>
				<div class="maple-index__ranking-content">
					<div class="maple-index__dojang-server-wrap">
						<?php foreach ( $serverCountList as $key => $server ){?>
							<div class="maple-index__dojang-server-info clear">
								<div class="maple-index__dojang-server-text">
									<span><?=$key+1?> 위</span>
									<p>등수</p>
								</div>
								<div class="maple-index__dojang-server-text">
									<span><?=$server->server?></span>
									<p>서버</p>
								</div>
								<div class="maple-index__dojang-server-text">
									<span><?=number_format($server->count)?>명</span>
									<p>유저</p>
								</div>
							</div>
						<?php }?>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			function getRankingUser( server, callback )
			{
				var url = '/data/ranking';
				if ( server != 'all' ) url = url + '?server=' + encodeURI(server);

				$.ajax({
					url: url,
					type: 'GET',
					success: function( data ) {
						callback( data );
					}
				});
			}

			function getRankingHTML( user )
			{
				var html = '';
				html += '<li class="maple-index__item">';
					html +=	'<div class="maple-index__item-content">';
						html +=	'<div class="maple-index__item-title">';
							html += '<span class="maple-index__item-ranking">' + user['ranking'] + '</span>';
							html += '<span class="maple-index__item-server-icon">';
								html += '<img src="' + user['server_img'] + '" alt="' + user['server'] + '">';
							html += '</span>';
						html += '</div>';
						html += '<div class="maple-index__item-img">';
							html += '<a href="/search?username=' + encodeURI(user['name']) + '">';
								html += '<img src="' + user['img'] + '">';
							html +=	'</a>';
						html += '</div>';
						html += '<div class="maple-index__item-info">';
							html += '<div class="maple-index__item-name">';
								html += '<span>' + user['name'] + '</span>';
								html += '<span class="maple-index__item-level"> Lv.' + user['level'] + '</span>';
							html += '</div>';
							html += '<div class="maple-index__item-job">';
								html += user['job'];
								if ( user['jobDetail'] != user['job'] ) html += '/' + user['jobDetail'];
							html += '</div>';
						html += '</div>';
						html += '<div class="maple-index__item-record">';
							html += '<div class="maple-index__item-layer">';
								html += user['layer'] + '<span>층</span>';
							html += '</div>';
							html += '<div class="maple-index__item-clearTime">';
								html += Math.floor(user['clearTime']/60) + '분' + user['clearTime'] % 60 + '초';
							html += '</div>';
						html += '</div>';
					html += '</div>';
				html += '</li>'

				return html;
			}

			function setRankingUser( server, callback )
			{
				$('.maple-index__ranking-items').append( "<ul class='maple-index__item-list' data-server=\'" + server + "\' style='display: none;'></ul>" );

				getRankingUser(server, function( data ){
					for ( var i in data ) {
						data[i].ranking = parseInt(i) + 1;
						$(".maple-index__item-list[data-server=\'" + server + "\']").append( getRankingHTML(data[ i ]) );
					}	
					callback();
				});
			}

			function setRankingUserList( callback )
			{
				var count = 0;
				for ( var i = 0; i < $(".maple-index__server").length; i++ ) {
					var server = $(".maple-index__server").eq( i ).attr('data-server');
					setRankingUser( server, function(){
						count += 1;
						if ( count >= $(".maple-index__server").length) {
							callback();
						}
					});
				}
			}

			var rankingIdx = 0;

			function rankingSlide()
			{
				rankingIdx++;
				if ( rankingIdx >= $(".maple-index__server").length ) {
					rankingIdx = 0;
				}

				$('.maple-index__server').eq( rankingIdx ).addClass('active').siblings().removeClass('active');
				$('.maple-index__item-list').eq( rankingIdx ).show().siblings().hide();

				initRankingSlide();
			}

			function initRankingSlide()
			{
				setTimeout(function(){
					rankingSlide();
				}, 3000);
			}

			$(function(){
				setRankingUserList(function(){
					$(".loading").hide();
					$('.maple-index__item-list[data-server="all"]').show();
				});

				$(".maple-index__server").on('click', function(){
					$(this).addClass('active').siblings().removeClass('active');
					var server = $(this).attr('data-server');
					$('.maple-index__item-list[data-server="' + server + '"]').show().siblings().hide();
				});
			});
		</script>
	</div>
</section>