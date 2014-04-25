<script src='<?=x::url_theme()?>/js/banner.js' /></script>

	<?
	
		$banners = array();
		$container_width = 0;
		for ( $i = 1; $i <= 5 ; $i++) { 
			if ( file_exists( x::path_file( "banner$i" ) ) ) {
				$container_width = $container_width + 970;
				$banners[] = array(
					'src' => x::url_file( "banner$i" ),
					'href' => x::meta( "banner{$i}_url" ),
					'subject' => x::meta("banner{$i}_subject"),
					'content' => x::meta("banner{$i}_content")
				);
			}
		}
		
		if ( $total_banners = count($banners) ) {
	?>	
		<div class='banner' total_banners="<?=$total_banners?>" >
			<div class='inner' style="position: relative; height: 318px; width: 968px;">
				<div class='images-container' style='width: <?=$container_width+(968*2)?>px; position: relative; left: -968px;' container-width='<?=$container_width?>'>
				<?

					if ( $banners ) {
						$selected = 0;
						foreach ( $banners as $banner ) {					
							if ( ! $selected ++ ) $first_image = 'selected';
							else $first_image = '';
							
							if ( !$url = $banner['href'] ) {
								$url = "javascript:void(0)";
								$target = '';
							} else $target = "target='_blank'";
							echo "<div class='banner-image image_$selected $first_image' image_num='$selected'>";
							echo "<a href='$url' $target><img src='$banner[src]''></a>";
							echo "<a href='$url' $target><span class='banner-content'><p class='banner-text'><div class='post-subject'>".cut_str(strip_tags($banner['subject']),50,'...')."</div><div class='post-content'>".cut_str(strip_tags($banner['content']),200,'...')."</div></p></span></a>";
							echo "<div class='banner-more'><a href='$url' $target>자세히 &gt;</a></div>";
							echo "</div>";						
						}
					}
					else {
						echo "<img src='".x::url_theme()."/img/no_image_banner1.png' />";
					}

					/**Fake Image */
					
							if ( !$url = $banners[0]['href'] ) $url = "javascript:void(0)";
							
							echo "<div class='banner-image' image_num='".($total_banners+1)."'>";
							echo "<a href='$url' $target><img src='".$banners[0]['src']."'></a>";
							echo "<a href='$url' $target><span class='banner-content'><p class='banner-text'><div class='post-subject'>".cut_str(strip_tags($banners[0]['subject']),50,'...')."</div><div class='post-content'>".cut_str(strip_tags($banners[0]['content']),200,'...')."</div></p></span></a>";
							echo "<div class='banner-more'><a href='$url' $target>자세히 &gt;</a></div>";
							echo "<div class='banner-more'><a href='$url' $target>자세히 &gt;</a></div>";
							echo "</div>";	


							
				?>
				</div>
				<div class='banner-pagination'>
					<? for($i=1; $i<=$total_banners; $i++) {?>
						<a href="javascript:void(0)" class='page_num page_<?=$i?> <? if ($i==1) echo "selected_num"?>' page_num='<?=$i?>'><?=$i?></a>
					<?}?>				
				</div>
		
				<div class='previous-banner'> &lt; </div>
				<div class='next-banner'> &gt; </div>

			</div>
		</div>
	<? }
		else {?>
			<div style='margin-bottom:10px;'><img src='<?=x::url_theme()?>/img/no_banner_image.png' /></div>
	<?	}?>
<div class='posts-container'>
	<div class='left-posts-container'>
	<?
		include widget(
			array(
				'code'		=> 'x-latest-left-gallery',
				'name'		=> 'x-latest-left-gallery',
				'default_forum_id' => bo_table(1),
				'git'		=> 'https://github.com/x-widget/x-latest-left-gallery',
			)
		);
	?>
	</div>
	<div class='right-posts-container'>
		<div class='right-panel-posts'>
			<div class='right-posts-1'>
		<?
			include widget(
				array(
					'code'		=> 'x-latest-gallery-posts-1',
					'name'		=> 'x-latest-gallery-posts',
					'default_forum_id' => bo_table(2),
					//temporarily added default_no_of_posts
					'default_no_of_posts' => 10,					
					'git'		=> 'https://github.com/x-widget/x-latest-gallery-posts',
				)
			);
		?>
			</div>
			<div class='right-posts-2'>
		<?
			include widget(
				array(
					'code'		=> 'x-latest-gallery-posts-2',
					'name'		=> 'x-latest-gallery-posts',
					'default_forum_id' => bo_table(3),
					//temporarily added default_no_of_posts
					'default_no_of_posts' => 5,					
					'git'		=> 'https://github.com/x-widget/x-latest-gallery-posts',
				)
			);
		?>
			</div> 
		</div>
		<div class='right-gallery-post'>
		<?
			include widget(
				array(
					'code'		=> 'x-latest-right-gallery',
					'name'		=> 'x-latest-right-gallery',
					'default_forum_id' => bo_table(4),
					'git'		=> 'https://github.com/x-widget/x-latest-right-gallery',
				)
			);
		?>
		</div>
		<div style='clear: left'></div>
	</div>
	<div style='clear: left'></div>
</div>


