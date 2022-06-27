<?php
$get_info = new Info;
$sql_chuyenmuc = "SELECT name,alias FROM chuyenmuc WHERE id = '{$blog['chuyenmuc']}' ";
$chuyenmuc = $db->fetch_assoc($sql_chuyenmuc, 1);
?>
<link rel="stylesheet" href="/assets/css/chi_tiet_blog.css">
<style>
    #main-container {
         overflow-x: unset; 
    }
    .c_menu{
        position:unset;
    }
    body {
        background-color: #ffffff;
    }
    
</style>
<div class="t_detail q-detail-pc">
    <div class="t_detail_link">
        <a class="t_link_detail" href="/">Trang chủ</a>
        <i class=" t_icon"></i>
        <a class="t_link_detail" href="/blog/">Blog</a>
        <?php if($blog['chuyenmuc'] > 1){ ?>
        <i class=" t_icon"></i>
        <a class="t_link_detail" href="/blog/<?= $chuyenmuc['alias'] ?>"><?= $chuyenmuc['name'] ?></a>
        <?php } ?>
        <i class=" t_icon"></i>
        <p class="t_link_home"><?= $blog['title'] ?></p>
    </div>
    <div class="t_detail_link_tablet">
        <a class="t_link_detail" href="/">Trang chủ</a>
        <div class="t_detail_link_icon"><i class="t_icon"></i></div>
        <a class="t_link_detail" href="/blog/">Blog</a>
        <?php if($blog['chuyenmuc'] > 1){ ?>
        <div class="t_detail_link_icon"><i class="t_icon"></i></div>
        <a class="t_link_detail"href="/blog/<?= $chuyenmuc['alias'] ?>"><?= $chuyenmuc['name'] ?></a>
        <?php } ?>
        <div class="t_detail_link_icon"><i class="t_icon"></i></div>
        <p class="t_link_home"><?= $blog['title'] ?></p>
    </div>
</div>
<div class="t_body_detail ">
    <div class="t_detail_left ">
        <div class="t_group_title">
            <h1 class="t_title_detail"><?= $blog['title'] ?></h1>
            <div class="t_detail_info">
               
                <div class="t_info_icon icon_time"><img src="/assets/images/t_icontime.svg" alt="image" width="18" height="18" class="t_info_icon lazyload"></div>
                <p class="t_info_time"><?= date('d-m-Y',$blog['created_at']) ?></p>
            </div>
        </div>
    </div>
    <div class="t_detail_right t-detail-tablet t_fix">
        <div class="t_socical_group">
            <p class="t_socical_title">CHIA SẺ BÀI VIẾT</p>
            <div class="t_socical_item">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $_DOMAIN . substr($_SERVER['REQUEST_URI'], 1); ?>" target="_blank" class="t_icon_socical"></a>
                <a href="http://www.linkedin.com/share?url=<?= $_DOMAIN . substr($_SERVER['REQUEST_URI'], 1); ?>" target="_blank" class="t_icon_socical"></a>
                <a href="http://www.twitter.com/share?url=<?= $_DOMAIN . substr($_SERVER['REQUEST_URI'], 1); ?>" target="_blank" class="t_icon_socical"></a>
            </div>
        </div>
    </div>
</div>
<div class="t_body_detail t_view_tablet ">

    <!-- phần mục lục -->
    <div class="ml t_detail_right" id="mucluc">
        <div id="muc-luc-content-thu" class="t_appendix_group">
            <div class="t_socical_title" id="tieudemucluc" style="text-align:center;">
            </div>
            <div class="t_appendix_content">
                <ul id="content-mucluc"> </ul>
            </div>
        </div>
    </div>
    <div class="content_blog t_detail_left" id="t_detail_content">
        <div class="q-content_suggest">
            <div class="content_suggest_v2"><?= $blog['sapo'] ?></div>
        </div>
        <div name="content-thu t_detail_content" id="content-thu">
            <?php
            $replace_http =  $blog['content'];
            echo str_replace('font-size:14px', '', $replace_http);
            ?>
        </div>
        <!-- hết phần mục lục -->
    </div>
    <div class="t_dasher_gr">
        <span class="t_dasher"></span>
    </div>


    <div class="t_dasher_gr">
        <span class="t_dasher"></span>
    </div>
    </div>
    <script type="text/javascript">
        var urlHref = "<?= $_DOMAIN . substr($_SERVER['REQUEST_URI'], 1); ?>";
        var mucluc = document.getElementById("muc-luc-content-thu");
        var input1 = document.getElementById("content-thu");
        var contentmucluc = document.getElementById("content-mucluc");
        var ml = document.getElementById("mucluc");
        var title_mucluc = document.getElementById("tieudemucluc");

        function click_show(e) {
            if (contentmucluc.style.display == 'none') {
                contentmucluc.style.display = 'block';
                ml.style.width = "100% ";
                mucluc.style.height = "auto ";
                mucluc.style.overflow = "hidden ";
                mucluc.style.setProperty('margin', 'auto', 'important');
                mucluc.style.setProperty('height', 'auto', 'important');
                mucluc.style.setProperty('min-height', '40px', 'important');
                mucluc.style.setProperty('padding', ' 0px 40px 25px  40px', 'important');
                //
                ml.style.height = "auto";
                ml.style.overflow = "hidden ";
                title_mucluc.style.lineHeight = "60px";
            } else {
                contentmucluc.style.display = 'none';
                ml.style.width = "255px ";
                mucluc.style.height = "50px ";
                mucluc.style.overflow = "hidden ";
                mucluc.style.setProperty('margin', 'auto', 'important');
                mucluc.style.setProperty('height', '40px', 'important');
                mucluc.style.setProperty('min-height', '40px', 'important');
                mucluc.style.setProperty('padding', '0 20px', 'important');
                //
                ml.style.height = "auto";
                ml.style.overflow = "hidden ";
                title_mucluc.style.lineHeight = "40px";
            }

        }
        if (mucluc != null && input1 != null) {
            var input2 = input1.getElementsByTagName("*");
            var h2 = input1.getElementsByTagName("H2").length;
            var h3 = input1.getElementsByTagName("H3").length;
            var h4 = input1.getElementsByTagName("H4").length;
            var h5 = input1.getElementsByTagName("H5").length;
            if (h2 > 0 || h3 > 0 || h4 > 0 || h5 > 0) {
                var tieudemucluc = document.getElementById("tieudemucluc");
                var strong = document.createElement("strong");
                strong.innerHTML = "Mục lục bài viết";
                mucluc.style.minHeight = "100px";
                mucluc.style.width = "100%";
                mucluc.style.fontSize = "16px";
                mucluc.style.color = "black";

                tieudemucluc.appendChild(strong);
            } else {
                mucluc.style.display = "none";
            }
            for (i = 0; i < input2.length; i++) {
                if (input2[i].tagName == 'H1' || input2[i].tagName == "IMG" || input2[i].tagName == 'H2' || input2[i].tagName == 'H3' || input2[i].tagName == 'H4' || input2[i].tagName == 'H5' || input2[i].tagName == 'H6') {
                    var uri_ct = input2[i].textContent;
                    if (input2[i].tagName == 'H1') {
                        input2[i].setAttribute("id", uri_ct + i);
                        var li = document.createElement("div");
                        var href = document.createElement("a");
                        if (input2[i].hasAttribute("img")) {}
                        href.href = urlHref + "#" + uri_ct + i;
                        href.innerHTML = uri_ct;
                        href.className = "H1abc";
                        li.appendChild(href);
                        contentmucluc.appendChild(li);
                    }
                    if (input2[i].tagName == 'H2') {
                        input2[i].setAttribute("id", uri_ct + i);
                        var li = document.createElement("li");
                        var href = document.createElement("a");
                        href.href = urlHref + "#" + uri_ct + i;
                        href.innerHTML = uri_ct;
                        href.className = "H2abc";
                        li.appendChild(href);
                        contentmucluc.appendChild(li);
                        input2[i].style.marginLeft = "20px";
                    }
                    if (input2[i].tagName == 'H3') {
                        input2[i].setAttribute("id", uri_ct + i);
                        var li = document.createElement("li");
                        var href = document.createElement("a");
                        href.href = urlHref + "#" + uri_ct + i;
                        href.className = "H3abc";
                        href.innerHTML = uri_ct;
                        li.appendChild(href);
                        contentmucluc.appendChild(li);
                    }
                    if (input2[i].tagName == 'H4') {
                        input2[i].setAttribute("id", uri_ct + i);
                        var li = document.createElement("li");
                        var href = document.createElement("a");
                        href.href = urlHref + "#" + uri_ct + i;
                        href.className = "H4abc";
                        href.innerHTML = uri_ct;
                        li.appendChild(href);
                        contentmucluc.appendChild(li);
                    }
                }
                // if (input2[i].tagName == 'IMG') {
                //   input2[i].setAttribute("class", "view");
                // }
            }
        }
    </script>