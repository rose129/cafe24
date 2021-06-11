<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head_main.php');
?>


    <?php

    echo latest('main_slider', 'mainSlide', 4, 23);		// 최소설치시 자동생성되는 자유게시판

    ?>


    <?php

    echo latest('pic_block_pro', 'product', 5, 10);


      ?>


    <?php

    echo latest('swiper_card', 'event', 4, 30);


      ?>

      <?php

  //   echo latest('basic', 'notice', 3, 30);


        ?>

      <?php

    // echo latest('basic_press', 'press', 5, 30);


        ?>


    <?php

     //echo latest('pic_basic_slide','NBM',4,300);

    //echo latest('latest 폴더속 폴더명', '게시판테이블명', 출력개수, 제목길이);
    //내가 사용하는 테마 폴더안에 skin/latest 폴더안에 넣었다면
    //echo latest('theme/latest 폴더 속 폴더명','게시판테이블명',출력개수,제목길이);

      ?>
    <div id="yutube_wrap">
        <?php

        echo latest('movie', 'youtube_', 1, 30);

        ?>
      <div class="y_cont">
        <div class="y_title">
          <p>메가커피 TV</p>
        </div>
        <strong class="y_tit_cont">
          다양한 음료와 차별화된 메뉴
          <p>메가커피를 영상으로 만나보세요!</p>
        </strong>

      </div>
    </div>


    <div id="join">
      <h3><i class="xi-calendar-list"></i>가맹문의</h3>
      <a href="<?php echo G5_BBS_URL ?>/write.php?bo_table=pormmail">문의하기</a>
    </div>



<?php
include_once(G5_THEME_PATH.'/tail.php');
