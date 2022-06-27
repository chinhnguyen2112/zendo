<?php
// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/core/init.php');
if ($_GET['type'] == 'home') {
    $sql = "SELECT * FROM sitemap";
    $doc = new DOMDocument("1.0", "utf-8");
    $doc->formatOutput = true;
    $doc->appendChild($doc->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="https://zendo.vn/assets/css/sanacc/css_sitemap.xsl"'));
    $r = $doc->createElement("sitemapindex");
    $r->setAttribute("xmlns", "http://www.sitemaps.org/schemas/sitemap/0.9");
    $doc->appendChild($r);
    
    foreach ($db->fetch_assoc($sql, 0) as $key => $val) {
        $url = $doc->createElement("sitemap");
        $name = $doc->createElement("loc");
        $name->appendChild(
            $doc->createTextNode('https://zendo.vn/' . $val['name'])
        );
        $url->appendChild($name);
        $lastmod = $doc->createElement("lastmod");
        $lastmod->appendChild(
            $doc->createTextNode($val['time'] . 'T17:28:31+07:00')
        );
        $url->appendChild($lastmod);
        $r->appendChild($url);
    }
    $doc->save("sitemap.xml");
    if(isset($_COOKIE['url_sitemap']) && $_COOKIE['url_sitemap'] != ""){
            new Redirect($_COOKIE['url_sitemap']); // Trở về trang index
    }
} else if ($_GET['type'] == 'blog') {
    
    $sql = "SELECT id,alias,updated_at FROM baiviet ORDER BY id ASC";
    $blog = $db->fetch_assoc($sql, 0);
    $count = count($blog);
    $page = ceil($count / 200);
    for ($i = 1; $i <= $page; $i++) {
        $check_page = ($i - 1) * 200;
        $sql_limit = "SELECT id,alias,updated_at FROM baiviet ORDER BY id ASC LIMIT {$check_page}, 200";
        $blog_limit = $db->fetch_assoc($sql_limit, 0);
        $doc = new DOMDocument("1.0", "utf-8");
        $doc->formatOutput = true;
        $r = $doc->createElement("urlset");
        $r->setAttribute("xmlns", "http://www.sitemaps.org/schemas/sitemap/0.9");
        $doc->appendChild($r);
        foreach ($blog_limit as $val) {
            $url = $doc->createElement("url");
            $name = $doc->createElement("loc");
            $name->appendChild(
                $doc->createTextNode('https://zendo.vn/' . $val['alias'] . '/')
            );
            $url->appendChild($name);
            $changefreq = $doc->createElement("changefreq");
            $changefreq->appendChild(
                $doc->createTextNode('daily')
            );
            $url->appendChild($changefreq);
            $lastmod = $doc->createElement("lastmod");
            $lastmod->appendChild(
                $doc->createTextNode(date('Y-m-d', $val['updated_at']) . 'T07:24:06+00:00')
            );
            $url->appendChild($lastmod);
            $priority = $doc->createElement("priority");
            $priority->appendChild(
                $doc->createTextNode('0.8')
            );
            $url->appendChild($priority);
            $r->appendChild($url);
        }
        $name = ($i == 1) ? '' : $i - 1;
        $name_file = 'blog' . $name . ".xml";
        $date = date('Y-m-d', time());
        if ($i >= 2) {
            $sql_check = "SELECT * FROM sitemap  WHERE name = '$name_file' ";
            $row = $db->num_rows($sql_check);
            if ($row > 0) {
                $db->query("UPDATE `sitemap` SET `time`=$date WHERE name = $name_file");
            } else {
                $db->query("INSERT INTO `sitemap`( `name`, `time`) VALUES ('$name_file','$date')");
            }
        }
        $doc->save('blog' . $name . ".xml");
    }
    new Redirect('sitemap.php?type=home'); // Trở về trang index
    exit;
} else if ($_GET['type'] == 'account') {
    $sql = "SELECT id_post,date_posted FROM posts ORDER BY id_post ASC ";
    $blog = $db->fetch_assoc($sql, 0);
    $count = count($blog);
    $page = ceil($count / 200);
    for ($i = 1; $i <= $page; $i++) {
        $check_page = ($i - 1) * 200;
        $sql_limit = "SELECT id_post,date_posted FROM posts ORDER BY id_post ASC LIMIT {$check_page}, 200";
        $blog_limit = $db->fetch_assoc($sql_limit, 0);
        $doc = new DOMDocument("1.0", "utf-8");
        $doc->formatOutput = true;
        $r = $doc->createElement("urlset");
        $r->setAttribute("xmlns", "http://www.sitemaps.org/schemas/sitemap/0.9");
        $doc->appendChild($r);
        foreach ($blog_limit as $val) {
            $url = $doc->createElement("url");
            $name = $doc->createElement("loc");
            $name->appendChild(
                $doc->createTextNode('https://zendo.vn/tai-khoan-' . $val['id_post'] . '/')
            );
            $url->appendChild($name);
            $changefreq = $doc->createElement("changefreq");
            $changefreq->appendChild(
                $doc->createTextNode('daily')
            );
            $url->appendChild($changefreq);
            $lastmod = $doc->createElement("lastmod");
            $lastmod->appendChild(
                $doc->createTextNode(substr($val['date_posted'], 0, 10) . 'T07:24:06+00:00')
            );
            $url->appendChild($lastmod);
            $priority = $doc->createElement("priority");
            $priority->appendChild(
                $doc->createTextNode('0.5')
            );
            $url->appendChild($priority);
            $r->appendChild($url);
        }
        $name = ($i == 1) ? '' : $i - 1;
        $name_file = 'account' . $name . ".xml";
        $date = date('Y-m-d', time());
        if ($i >= 2) {
            $sql_check = "SELECT * FROM sitemap  WHERE name = '$name_file' ";
            $row = $db->num_rows($sql_check);
            if ($row > 0) {
                $db->query("UPDATE `sitemap` SET `time`=$date WHERE name = $name_file");
            } else {

                $db->query("INSERT INTO `sitemap`( `name`, `time`) VALUES ('$name_file','$date')");
            }
        }
        $doc->save('account' . $name . ".xml");
    }
    new Redirect('sitemap.php?type=home'); // Trở về trang index
    exit;
}
