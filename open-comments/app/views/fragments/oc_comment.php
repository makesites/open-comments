<?php foreach($comments as $k=>$v){ 
$bgcolor = ( is_int($k/2) ) ? 'row1': 'row2';
?>
<div id="comment-<?=$v['id']?>" class="comment-container <?=$bgcolor?>">
	<h4 class="title"><a href="<?=$v['openid']?>"><?=$v['name']?></a></h4>
	<p class="date"><?=$v['date']?></p>
	<div class="comment">
	<?=$v['comment']?>
	</div>
</div>
<?php } ?>