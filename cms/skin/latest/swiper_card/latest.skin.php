<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 600;
$thumb_height = 450;
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/dist/css/swiper.css">
<script src="<?php echo $latest_skin_url ?>/dist/js/swiper.min.js"></script>


<div id="sw_event" class="swiper-container swiper1">
  <h2 >MEGA EVENT</h2>
    <div class="swiper-wrapper">
        <?php
        for ($i=0; $i<count($list); $i++) {
        $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

        if($thumb['src']) {
            $img = $thumb['src'];
        } else {
            $img = $latest_skin_url.'/img/noimg.png';
            $thumb['alt'] = '등록된 이미지가 없습니다.';
        }
        //$img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
        $img_content = $img;
        ?>
<style>
</style>

        <div class="swiper-slide swiper-lay" onclick="location.href='<?php echo $list[$i]['href'] ?>';" style="cursor: pointer; width:350px;">
            <div class="sw_tit">
                <?php echo $list[$i]['subject'] ?>
            </div>


            <div class="sw_img" style="background-image: url('<?php echo $img_content; ?>');">

            </div>
            <div class="sw_sub">
                <?php //echo cut_str(strip_tags($list[$i]['wr_content']), 80)?>
            </div>

        </div>

        <?php }  ?>
        <?php if (count($list) == 0) { //게시물이 없을 때  ?>
        <div class="swiper-slide">
            <div class="sw_sub">
                등록된 게시물이 없습니다.
            </div>
        </div>
        <?php }  ?>


      </div>

    <!-- 페이징 -->
    <div class="swiper-pagination swiper-pagination1"></div>
<!--
    좌우버튼 활성화시 주석해제  -->
    <!-- <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div> -->


</div>

<script>
    var swiper1 = new Swiper('.swiper1', {
        pagination: '.swiper-pagination1',
        slidesPerView: '4',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        loop: true, // 루프(반복)옵션 활성화시 주석해제
        autoplay: 3000,
        autoplayDisableOnInteraction: false,
        centeredSlides: true,
        spaceBetween: 20,
    });
</script>
