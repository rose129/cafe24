<div id="hd">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>
    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
    }
    ?>
    <div id="tnb">
    	<div class="inner">
			<ul id="hd_qnb">
	            <li><a href="<?php echo G5_BBS_URL ?>/faq.php">FAQ</a></li>
	            <li><a href="<?php echo G5_BBS_URL ?>/qalist.php">Q&A</a></li>
	            <li><a href="<?php echo G5_BBS_URL ?>/new.php">새글</a></li>
	            <li><a href="<?php echo G5_BBS_URL ?>/current_connect.php" class="visit">접속자<strong class="visit-num"><?php echo connect('theme/basic'); // 현재 접속자수, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정  ?></strong></a></li>
	        </ul>
		</div>
    </div>
    <div id="hd_wrapper">

      <div id="logo">
      <a href="<?php echo G5_URL ?>">
        <?php echo latest('pic_list_timg','top_logo',1,100); ?>
      </a>
      </div>


        <ul class="hd_login">
            <?php if ($is_member) {  ?>
            <li><a class="" href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php"></a><span class="sound_only">정보수정</span></li>
            <li><a class="xi-log-out xi-3x" href="<?php echo G5_BBS_URL ?>/logout.php"></a><span class="sound_only">로그아웃</span></li>
            <?php if ($is_admin) {  ?>
            <li class="tnb_admin "><a class="xi-cog xi-3x" href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>"></a><span class="sound_only">관리자</span</li>
            <?php }  ?>
            <?php } else {  ?>
            <li class="Log_in"><a href="<?php echo G5_BBS_URL ?>/login.php"><img src="/cms/img/top_mypage_wh.png"></a><span class="sound_only">로그인</span></li>
            <?php }  ?>

        </ul>
        <nav id="gnb">
            <h2>MENU</h2>
            <div class="gnb_wrap">
                <ul id="gnb_1dul">
                    <li class="gnb_1dli gnb_mnal"><button type="button" class="gnb_menu_btn" title="전체메뉴"><i class="xi-bars" aria-hidden="true"></i><span class="sound_only">전체메뉴열기</span></button></li>
                    <?php
    				$menu_datas = get_menu_db(0, true);
    				$gnb_zindex = 999; // gnb_1dli z-index 값 설정용
                    $i = 0;
                    foreach( $menu_datas as $row ){
                        if( empty($row) ) continue;
                        $add_class = (isset($row['sub']) && $row['sub']) ? 'gnb_al_li_plus' : '';
                    ?>
                    <li class="gnb_1dli gnb_menu <?php echo $add_class; ?>" style="z-index:<?php echo $gnb_zindex--; ?>">
                        <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"><?php echo $row['me_name'] ?></a>
                        <?php
                        $k = 0;
                        foreach( (array) $row['sub'] as $row2 ){

                            if( empty($row2) ) continue;

                            if($k == 0)
                                echo '<span class="bg">하위분류</span><div class="gnb_2dul"><ul class="gnb_2dul_box">'.PHP_EOL;
                        ?>
                            <li class="gnb_2dli"><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="gnb_2da"><?php echo $row2['me_name'] ?></a></li>
                        <?php
                        $k++;
                        }   //end foreach $row2

                        if($k > 0)
                            echo '</ul></div>'.PHP_EOL;
                        ?>
                    </li>
                    <?php
                    $i++;
                    }   //end foreach $row

                    if ($i == 0) {  ?>
                        <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                    <?php } ?>
                </ul>
                <div id="gnb_all">

                    <ul class="gnb_al_ul">
                        <?php

                        $i = 0;
                        foreach( $menu_datas as $row ){
                        ?>
                        <li class="gnb_al_li">
                            <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_al_a"><?php echo $row['me_name'] ?></a>
                            <?php
                            $k = 0;
                            foreach( (array) $row['sub'] as $row2 ){
                                if($k == 0)
                                    echo '<ul>'.PHP_EOL;
                            ?>
                                <li><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"><?php echo $row2['me_name'] ?></a></li>
                            <?php
                            $k++;
                            }   //end foreach $row2

                            if($k > 0)
                                echo '</ul>'.PHP_EOL;
                            ?>
                        </li>

                        <?php
                        $i++;
                        }   //end foreach $row

                        if ($i == 0) {  ?>
                            <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                        <?php } ?>
                        <li class="menu_event">
                          <?php

                          //echo latest('basic_list_event', 'event', 1, 30);
                          ?>
                          <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=event&wr_id=1"><img src="<?php echo G5_IMG_URL ?>/event.jpg" alt="다이어리이벤트">
                          </a>
                        </li>
                    </ul>
                    <button type="button" class="gnb_close_btn"><i class="xi-close" aria-hidden="true"></i></button>
                </div>
                <div id="gnb_all_bg"></div>
            </div>
        </nav>
    </div>


    <script>

    $(function(){
        $(".gnb_menu_btn").click(function(){
            $("#gnb_all, #gnb_all_bg").show();
        });
        $(".gnb_close_btn, #gnb_all_bg").click(function(){
            $("#gnb_all, #gnb_all_bg").hide();
        });
    });

    </script>
</div>
