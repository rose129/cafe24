<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

?>

<div id="youtube_sec" class="lt_gal">

    	<?php for ($i = 0; $i < count($list); $i++) {
    $link1_id = $list[$i]['wr_link1'];
    ?>
	<div class="youtube_wrap" >
    <h2>MEGA VIDEO</h2>
		<div class="youtube" style="position:relative">
			<iframe style=" background:#000; color:#fff" src="https://www.youtube.com/embed/<?php echo $link1_id; ?>?rel=0&amp;controls=0&amp;showinfo=0&autoplay=0" frameborder="0" border=0 scrolling=no allowfullscreen>
			</iframe>
		</div>
	</div>
	<?php }  ?>
	<?php if (count($list) == 0) { //동영상이 없을 때  ?>
	<li>동영상이 없습니다.</li>
	<?php }  ?>


</div>
<style>

.col-md-12,.col-md-8{
	position:relative;
	min-height:1px;
	padding-right:0px;
	padding-left:0px
}
.youtube { position: relative; width: 700px; padding-bottom: 56%; margin: 5% 0;}
.youtube iframe { position: absolute; width: 100%; height: 100%; }
@media (min-width:992px) {
.col-md-4 {

    margin:50px;
	}
	.col-md-12 {
		width:100%
	}
	.col-md-4 {
		width:45%
	}
	}
  .lt_gal{  padding: 100px;}
#youtube_sec{display: inline-block;}

</style>
