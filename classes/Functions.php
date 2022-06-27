<?php


// Hàm điều hướng trang

use function PHPSTORM_META\type;

class Redirect
{
    public function __construct($url = null)
    {
        if ($url) {
            echo '<script>location.href="' . $url . '";</script>';
        }
    }
}

function auto_get($url)
{
    $data = curl_init();
    curl_setopt($data, CURLOPT_HEADER, false);
    curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($data, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($data, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($data, CURLOPT_CONNECTTIMEOUT, 3);
    curl_setopt($data, CURLOPT_TIMEOUT, 3);
    curl_setopt($data, CURLOPT_HTTPHEADER, array('Accept: application/json'));
    curl_setopt($data, CURLOPT_URL, $url);
    $res = curl_exec($data);
    curl_close($data);
    return $res;
}

function in_array_r($needle, $haystack, $strict = false)
{
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}
function text($string, $separator = ', ')
{
    $vals = explode($separator, $string);
    foreach ($vals as $key => $val) {
        $vals[$key] = strtolower(trim($val));
    }
    return array_diff($vals, array(""));
}

// func time ago
function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'năm',
        'm' => 'tháng',
        'w' => 'tuần',
        'd' => 'ngày',
        'h' => 'giờ',
        'i' => 'phút',
        's' => 'giây',
    );


    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' trước' : 'vừa xong';
}
// time left

function time_left($from, $to = '')
{
    if (empty($to))
        $to = time();
    $diff = (int) abs($to - $from);
    if ($diff <= 60) {
        $since = sprintf('Còn vài giây');
    } elseif ($diff <= 3600) {
        $mins = round($diff / 60);
        if ($mins <= 1) {
            $mins = 1;
        }
        /* translators: min=minute */
        $since = sprintf('Còn %s phút', $mins);
    } else if (($diff <= 86400) && ($diff > 3600)) {
        $hours = round($diff / 3600);
        if ($hours <= 1) {
            $hours = 1;
        }
        $since = sprintf('Còn %s giờ', $hours);
    } elseif ($diff >= 86400) {
        $days = round($diff / 86400);
        if ($days <= 1) {
            $days = 1;
        }
        $since = sprintf('Còn %s ngày', $days);
    }
    return $since;
}

// Chống xss
class Anti_xss
{
    public function clean_up($text)
    {
        return htmlentities(strip_tags($text), ENT_QUOTES, 'UTF-8');
    }
}

// Truyền vào
class Input
{
    public function input_get($key)
    {
        return isset($_GET[$key]) ? $_GET[$key] : false;
    }
    public function input_post($key)
    {
        return isset($_POST[$key]) ? $_POST[$key] : false;
    }
}


// lấy thông tin rank và khung 
class Info
{

    public function nice_number($n)
    {
        // first strip any formatting;
        $n = (0 + str_replace(",", "", $n));

        // is this a number?
        if (!is_numeric($n)) return false;

        // now filter it;
        if ($n > 1000000000000) return round(($n / 1000000000000), 2) . ' nghìn tỉ';
        elseif ($n > 1000000000) return round(($n / 1000000000), 2) . ' tỉ';
        elseif ($n > 1000000) return round(($n / 1000000), 2) . ' triệu';
        elseif ($n > 1000) return round(($n / 1000), 2) . ' nghìn';

        return number_format($n);
    }

    public function get_post($id)
    {
        $post = glob($_SERVER["DOCUMENT_ROOT"] . "/assets/files/post/" . $id . ".*");
        if ($avatar) {
            $arr = explode("/", $post[0]);
            $last = array_pop($arr);
            return "assets/files/post/" . $last;
        } else {
            return get_thumb($id);
        }
    }

    public function get_thumb($id)
    {
        $index = glob($_SERVER["DOCUMENT_ROOT"] . "/assets/files/thumb/" . $id . ".*");
        if ($index) {
            $arr = explode("/", $index[0]);
            $last = array_pop($arr);
            return "assets/files/thumb/" . $last;
        } else {
            return "assets/images/banner.jpg";
        }
    }

    public function get_string_frame($frame)
    {
        switch ($frame) {
            case 0:
                $str = "Không Khung";
                break;
            case 1:
                $str = "Khung Sắt";
                break;
            case 2:
                $str = "Khung Đồng";
                break;
            case 3:
                $str = "Khung Bạc";
                break;
            case 4:
                $str = "Khung Vàng";
                break;
            case 5:
                $str = "Khung Bạch Kim";
                break;
            case 6:
                $str = "Khung Kim Cương";
                break;
            case 7:
                $str = "Khung Cao Thủ";
                break;
            case 8:
                $str = "Khung Đại Cao Thủ";
                break;
            case 9:
                $str = "Khung Thách Đấu";
                break;
            default:
                $str = "Chưa Xác Định";
                break;
        }
        return $str;
    }



    public function get_icon_rank($rank, $type = "")
    {
        if ($type == 'LMTC') {
            switch ($rank) {
                case 0:
                case 1:
                    $name = "rank_sat.png";
                    break;
                case 2:
                    $name = "rank_dong.png";
                    break;
                case 3:
                    $name = "rank_bac.png";
                    break;
                case 4:
                    $name = "rank_vang.png";
                    break;
                case 5:
                    $name = "rank_bk.png";
                    break;
                case 6:
                    $name = "rank_lb.png";
                    break;
                case 7:
                    $name = "rank_kc.png";
                    break;
                case 8:
                    $name = "ct.png";
                    break;
                case 9:
                    $name = "rank_dct.png";
                    break;
                case 10:
                    $name = "rank_td.png";
                    break;
            }
            $link = "/assets/img/icon/tc/";
        } else  if ($type == 'LMHT') {
            switch ($rank) {
                case 0:
                case 1:
                    $name = "rank_sat.png";
                    break;
                case 2:
                    $name = "rank_dong.png";
                    break;
                case 3:
                    $name = "rank_bac.png";
                    break;
                case 4:
                    $name = "rank_vang.png";
                    break;
                case 5:
                    $name = "rank_bk.png";
                    break;
                case 6:
                    $name = "rank_kc.png";
                    break;
                case 7:
                    $name = "ct.png";
                    break;
                case 8:
                    $name = "rank_dct.png";
                    break;
                case 9:
                    $name = "rank_td.png";
                    break;
            }
            $link = "/assets/img/icon/lmht/";
        } else  if ($type == 'FF') {
            switch ($rank) {
                case 0:
                case 2:
                    $name = "rank_dong.png";
                    break;
                case 3:
                    $name = "rank_bac.png";
                    break;
                case 4:
                    $name = "rank_vang.png";
                    break;
                case 5:
                    $name = "rank_backim.png";
                    break;
                case 6:
                    $name = "rank_kimcuong.png";
                    break;
                case 7:
                    $name = "rank_huyenthoai.png";
                    break;
                case 8:
                    $name = "rank_thachdau.png";
                    break;
            }
            $link = "/assets/img/icon/free_fire/";
        } else  if ($type == 'PUBG') {
            switch ($rank) {
                case 0:
                case 2:
                    $name = "rank_dong.png";
                    break;
                case 3:
                    $name = "rank_bac.png";
                    break;
                case 4:
                    $name = "rank_vang.png";
                    break;
                case 5:
                    $name = "rank_bk.png";
                    break;
                case 6:
                    $name = "rank_kc.png";
                    break;
                case 7:
                    $name = "rank_ct.png";
                    break;
                case 8:
                    $name = "rank_qq.png";
                    break;
                case 9:
                    $name = "rank_chiton.png";
                    break;
            }
            $link = "/assets/img/icon/pubg/";
        } else {
            switch ($rank) {
                case 0:
                case 2:
                    $name = "ranh_dong.png";
                    break;
                case 3:
                    $name = "ranh_bac.png";
                    break;
                case 4:
                    $name = "ranh_vang.png";
                    break;
                case 5:
                    $name = "ranh_bk.png";
                    break;
                case 6:
                    $name = "ranh_kc.png";
                    break;
                case 7:
                    $name = "rank_ct.png";
                    break;
                case 8:
                    $name = "rank_ct.png";
                    break;
                case 9:
                    $name = "ranh_ta.png";
                    break;
            }
            $link = "/assets/img/icon/";
        }
        return $link . $name;
    }
    public function get_icon_rank_ff($rank, $type = "")
    {
        if ($type == 'LMTC') {
            switch ($rank) {
                case 0:
                case 1:
                    $name = "rank_sat.png";
                    break;
                case 2:
                    $name = "rank_dong.png";
                    break;
                case 3:
                    $name = "rank_bac.png";
                    break;
                case 4:
                    $name = "rank_vang.png";
                    break;
                case 5:
                    $name = "rank_bk.png";
                    break;
                case 6:
                    $name = "rank_lb.png";
                    break;
                case 7:
                    $name = "rank_kc.png";
                    break;
                case 8:
                    $name = "ct.png";
                    break;
                case 9:
                    $name = "rank_dct.png";
                    break;
                case 2:
                    $name = "rank_td.png";
                    break;
            }
            $link = "/assets/img/icon/tc/";
        } else {
            switch ($rank) {
                case 0:
                case 2:
                    $name = "rank_dong.png";
                    break;
                case 3:
                    $name = "rank_bac.png";
                    break;
                case 4:
                    $name = "rank_vang.png";
                    break;
                case 5:
                    $name = "rank_backim.png";
                    break;
                case 6:
                    $name = "rank_kimcuong.png";
                    break;
                case 7:
                    $name = "rank_huyenthoai.png";
                    break;
                case 8:
                    $name = "rank_thachdau.png";
                    break;
            }
            $link = "/assets/img/icon/free_fire/";
        }
        return $link . $name;
    }

    public function get_string_rank($rank, $type = '')
    {
        if ($type == 'LMTC') {
            switch ($rank) {
                case 0:
                    $str = "Chưa Rank";
                    break;
                case 1:
                    $str = "Sắt";
                    break;
                case 2:
                    $str = "Đồng";
                    break;
                case 3:
                    $str = "Bạc";
                    break;
                case 4:
                    $str = "Vàng";
                    break;
                case 5:
                    $str = "Bạch Kim";
                    break;
                case 6:
                    $str = "Ngọc Lục Bảo";
                    break;
                case 7:
                    $str = "Kim Cương";
                    break;
                case 8:
                    $str = "Cao Thủ";
                    break;
                case 9:
                    $str = "Đại Cao Thủ";
                    break;
                case 10:
                    $str = "Thách Đấu";
                    break;
                default:
                    $str = "Chưa Rank";
                    break;
            }
        } else if ($type == 'PUBG') {
            switch ($rank) {
                case 0:
                    $str = "Chưa Rank";
                    break;
                case 1:
                    $str = "Chưa xác định";
                    break;
                case 2:
                    $str = "Đồng";
                    break;
                case 3:
                    $str = "Bạc";
                    break;
                case 4:
                    $str = "Vàng";
                    break;
                case 5:
                    $str = "Bạch Kim";
                    break;
                case 6:
                    $str = "Kim Cương";
                    break;
                case 7:
                    $str = "Cao Thủ";
                    break;
                case 8:
                    $str = "Quán Quân";
                    break;
                case 9:
                    $str = "Chí Tôn";
                    break;
                default:
                    $str = "Chưa Rank";
                    break;
            }
        } else {
            switch ($rank) {
                case 0:
                    $str = "Chưa Rank";
                    break;
                case 1:
                    $str = "Chưa xác định";
                    break;
                case 2:
                    $str = "Đồng";
                    break;
                case 3:
                    $str = "Bạc";
                    break;
                case 4:
                    $str = "Vàng";
                    break;
                case 5:
                    $str = "Bạch Kim";
                    break;
                case 6:
                    $str = "Kim Cương";
                    break;
                case 7:
                    $str = "Cao Thủ";
                    break;
                case 9:
                    $str = "Tinh Anh";
                    break;
                case 8:
                    $str = "Thách Đấu";
                    break;
                default:
                    $str = "Chưa Xác Định";
                    break;
            }
        }
        return $str;
    }
}
function arr_skin()
{
    $arr = "
Valhein hoàng tử quạ,
Valhein vũ khí tối thượng,
Valhein đại công tước,
Valhein quang vinh,
Valhein số 7 thần sầu,
Valhein khiêu chiến,
Valhein cá mập nghiêm túc,
Valhein hoàng tử băng,
Valhein thần tài,
Thane kẻ hủy diệt,
Thane quang vinh,
Thane mật vụ,
Veera cô giáo hắc ám,
Veera góa phụ giả kim,
Veera nàng dơi tuyết,
Veera y tá bạo loạn,
Veera thiên nga đen,
Veera vũ hội bóng đêm,
Lữ bố tiệc bãi biển,
Lữ bố nam vương,
Lữ bố long kỵ sĩ,
Lữ bố kỵ sĩ âm phủ,
Lữ bố đặc nhiệm swat,
Lữ bố tư lệnh robot,
Lữ bố hỏa long chiến thần,
Lữ bố ichigo kurosaki,
Lữ bố thần ngọc,
Mina tiệc bánh kẹo,
Mina kẹo hay ghẹo,
Mina lưỡi hái hoàng kim,
Mina đào tạo siêu sao,
Mina chị đại lắm chiêu,
Mina tiểu thư đoạt hồn,
Krixi công chúa bướm,
Krixi xứ sở thần tiên,
Krixi tiệc bãi biển,
Krixi cô tiên thỏ,
Krixi phó văn nghệ,
Krixi tiểu yêu nữ,
Krixi nữ hoàng thiên nga,
Krixi thần thoại hy lạp,
Krixi thủy thủ,
Krixi terrible tornado,
Mganga hề cung đình,
Mganga tiệc bánh kẹo,
Mganga pháp sư mèo,
Triệu vân đoạt mệnh thương,
Triệu vân quý công tử,
Triệu vân dũng sĩ đồ long,
Triệu vân quang vinh,
Triệu vân chiến tướng mùa đông,
Triệu vân kỵ sĩ tận thế,
Triệu vân cẩm y vệ: hỏa long,
Omega người máy xanh,
Omega cỗ máy siêu tốc,
Kahlii cô dâu hắc ám,
Kahlii quaàng khăn đỏ,
Kahlii kim cô giáo chủ,
Kahlii siêu đầu bếp,
Kahlii vũ hội bóng đêm,
Zephys oán linh,
Zephys hiệp sĩ bí ngô,
Zephys dung nham,
Zephys siêu việt,
Zephys phi thương,
Zephys tư lệnh viễn chinh,
Zephys hắc vô thường,
Điêu thuyền nữ vương anh đào,
Điêu thuyền tiệc bãi biển,
Điêu thuyền nữ y tá,
Điêu thuyền wave,
Điêu thuyền hoa hậu,
Điêu thuyền phù thủy bí ngô,
Điêu thuyền vũ điệu nghê thường,
Điêu thuyền tà linh pháp trượng,
Điêu thuyền mèo công nghệ,
Điêu thuyền thần ngọc,
Chaugnar ác mộng sinh hóa,
Chaugnar quang vinh,
Violet nữ hoàng pháo hoa,
Violet nữ đặc cảnh,
Violet phi công trẻ,
Violet mèo siêu quậy,
Violet tiệc bãi biển,
Violet phó học tập,
Violet thứ nguyên vệ thần,
Violet phá hoa neon,
Violet đặc dị,
Violet vợ người ta,
Violet tay súng siêu phàm,
Violet huy chương vàng,
Violet huyết ma thần,
Violet lam tước,
Violet thần long tỷ tỷ,
Butterfly xuân nữ ngổ ngáo,
Butterfly thủy thủ,
Butterfly teen nữ công nghệ,
Butterfly nữ quái nổi loạn,
Butterfly quận chúa đế chế,
Butterfly đông êm đềm,
Butterfly phượng cửu thiên,
Butterfly cẩm y vệ: chu tước,
Butterfly asuna tia chớp,
Butterfly stacia,
Ormarr cựu chiến binh,
Ormarr thông thỏa thích,
Ormarr giáo viên thể hình,
Azzen`Ka linh hồn lữ khách,
Azzen`Ka kẹo hay ghẹo,
Azzen`Ka quỷ diện lãng khách,
Alice nhà chiêm tinh,
Alice bé gấu tuyết,
Alice xứ sở thần tiên,
Alice dạ hội,
Alice tiểu quỷ bí ngô,
Alice bé du xuân,
Alice tiểu tiên tử,
Gildur tiệc bãi biển,
Gildur phượt thủ,
Gildur đại gia học viện,
Gildur đại võ sư,
Gildur thuyền trưởng râu bạc,
Yorn cung thủ bóng đêm,
Yorn thế tử nguyệt tộc,
Yorn đặc nhiệm swat,
Yorn phá vân tiễn,
Yorn long thần soái,
Yorn nam thần giáng sinh,
Yorn soái ca học đường,
Yorn thần thoại hy lạp,
Toro đặc cảnh nypd,
Toro trung phong cắm,
Toro thần thoại hy lạp,
Taara đại tù trưởng,
Taara hỏa ngọc nữ đế,
Taara tiệc bãi biển,
Taara hồng môn đường chủ,
Taara tư lệnh hải âu,
Nakroth chiến binh hỏa ngục,
Nakroth quân đoàn địa ngục,
Nakroth bboy công nghệ,
Nakroth khiêu chiến,
Nakroth quán quân,
Nakroth lôi quang sứ,
Nakroth tiệc bãi biển,
Nakroth thứ nguyên vệ thần,
Nakroth siêu việt,
Grakk thuyền trưởng râu đỏ,
Grakk khô lâu đại tướng,
Grakk chàng gấu tuyết,
Grakk mèo thần tài,
Grakk sumo,
Grakk tiệc bãi biển,
Aleister thiếu niên hắc ám,
Aleister quang vinh,
Aleister quỷ soái nguyệt tộc,
Aleister siêu sao bóng rổ,
Aleister âm dương sư,
Fennik nhà thám hiểm,
Fennik tiệc bánh kẹo,
Fennik tuần lộ láu lỉnh,
Fennik phi hành gia,
Fennik tay đua f1,
Lumburr dung nham,
Lumburr cự thần viễn cổ,
Natalya nghệ nhân lân,
Natalya quý cô thủy tề,
Natalya phó nháy nhí nhảnh,
Natalya quà quái quỷ,
Natalya nghiệp hỏa yêu hậu,
Natalya băng tâm thần nữ,
Natalya nữ quái công nghệ,
Cresht thợ sửa cáp,
Cresht cá cắn cáp,
Cresht đại sư sushi,
Jinna đại tư tế,
Jinna dạ xoa vương,
Jinna hỏa nhãn ma vương,
Payna cảnh vệ rừng,
Payna nghìn lẻ một đêm,
Maloch ác ma địa ngục,
Maloch tiệc hóa trang,
Maloch samurai tử sĩ,
Maloch đại tướng rô bốt,
Maloch ông kẹ bí ngô,
Maloch ác nhân vô tuyến,
Maloch vũ hội bóng đêm,
Ngộ Không đạo tặc,
Ngộ Không hỏa nhãn kim tinh,
Ngộ Không siêu việt,
Ngộ Không ngộ khá trẩu,
Ngộ Không siêu việt 2.0,
Ngộ Không đặc vụ băng hầu,
Ngộ Không nhóc tì bá đạo,
Ngộ Không tề thiên ma hầu,
Kriknak bọ cánh bạc,
Kriknak yêu trùng cổ mộ,
Kriknak st.l 162,
Kriknak bọ cánh cam,
Arthur hoàng kim cốt,
Arthur lãnh chúa xương,
Arthur si tình kiếm,
Arthur siêu sao cricket,
Arthur đặc cảnh băng lôi,
Arthur hiệp sĩ trăng khuyết,
Arthur siêu việt,
Slimz thỏ thợ mỏ,
Slimz chú thỏ ngọc,
Slimz xứ sở thần tiên,
Slimz thỏ nhồi bông,
Ilumia nữ chúa tuyết,
Ilumia thần mặt trời,
Ilumia hồng hoa hậu,
Ilumia thiên nữ áo dài,
Ilumia nữ hoàng khí giới,
Preyta không tặc,
Preyta băng hỏa long sư,
Preyta phi cơ f1,
Skud sơn tặc,
Skud quang vinh,
Skud tà linh ma tướng,
Raz đại tù trưởng,
Raz băng quyền quán quân,
Raz chiến thân muay thái,
Raz siêu việt,
Raz siêu cấp tin tặc,
Raz saitama cosplay,
Lauriel đọa lạc thiên sứ,
Lauriel hỏa phượng hoàng,
Lauriel phù thủy bí ngô,
Lauriel thánh quang sứ,
Lauriel hoa khôi giáng sinh,
Lauriel lạc thần,
Lauriel tinh vân sứ,
Lauriel tiệc bãi biển,
Lauriel thiên sứ công nghệ,
Batman đôi cánh đại dương,
Batman dơi địa ngục,
Airi thích khách,
Airi ninja xanh lá,
Airi quái xế công nghệ,
Airi cấm vệ nguyệt tộc,
Airi kiemono,
Airi bạch kiemono,
Airi phó kiếm đạo,
Airi tiệc bãi biển,
Airi mỵ hồ,
Airi đặc công tử điệp,
Airi bích hải thánh nữ,
Airi lễ hội mùa xuân,
Zuka đại phú ông,
Zuka giáo sư sừng sỏ,
Zuka phát tài,
Zuka gấu nhồi bông,
Zuka diệt nguyệt nguyên soái,
Zuka đầu bếp hoàng cung,
Zuka mãnh hổ,
Ignis hỏa thuật sư,
Ignis quang vinh,
Ignis bắc băng vương,
Ignis thầy tế mặt trời,
Murad thợ săn tiền thưởng,
Murad mtp thần tượng học đường,
Murad đồ thần đao,
Murad siêu việt,
Murad thiên tài sân cỏ,
Murad điệp viên anubis,
Murad đặc dị,
Murad siêu việt 2.0,
Murad chí tôn thần kiếm,
Murad dược sĩ tình yêu,
Murad byakuya kuchiki,
Zill lốc địa ngục,
Zill dung nham,
Zill cựu thần thiên hà,
Zill diệt nguyệt tử sĩ,
Zill thần mộng mị,
Arduin cận vệ hoàng gia,
Arduin quang vinh,
Arduin tà linh hiệp sĩ,
Arduin chiến binh cổ đại,
Joker trò đùa tử vong,
Joker vua hề,
Ryoma thợ săn tiền thưởng,
Ryoma đại tướng nguyệt tộc,
Ryoma thanh long bang chủ,
Ryoma samurai huyền thoại,
Ryoma dạ hội,
Ryoma chiến binh cyborg,
Ryoma ultraman,
Ryoma đặc nhiệm giáng sinh,
Astrid bạch kiếm tiểu thư,
Astrid siêu sao bóng chày,
Astrid tổ trưởng học đường,
Astrid thần thoại hy lạp,
Tel`Annas cảnh vệ rừng,
Tel`Annas giám thị thân thiện,
Tel`Annas chung tình tiễn,
Tel`Annas thánh nữ mật hội,
Tel`Annas thần sứ F.e.e x1,
Tel`Annas cẩm y vệ: phi ưng,
Tel`Annas dạ hội,
Tel`Annas thứ nguyên vệ thần,
Tel`Annas công chúa mộng mơ,
Tel`Annas vũ khúc yêu hồ,
Tel`Annas tân niên vệ thần,
Superman chúa tể công lý,
Superman bất công lý,
Wonder Woman thế chiến,
Xeniel thiên sứ hủy diệt,
Xeniel trung vệ thép,
Xeniel kim sí điểu,
Xeniel tổng lãnh tinh hệ,
Xeniel thần thoại hy lạp,
Kil`Groth cảnh vệ biển,
Kil`Groth quang vinh,
Moren anh thợ điện,
Moren lính cứu hỏa,
TeeMee xiếc cung đình,
TeeMee tay đua siêu tốc,
TeeMee thần thoại hy lạp,
Lindis thám tử tư,
Lindis quang thánh tiễn,
Lindis quang vinh,
Lindis nữ vương pháo hoa,
Lindis dạ tiệc,
Lindis đồng phục shihakusho,
Omen sĩ quan viễn chinh,
Omen ám tử đao,
Omen quỷ nguyệt tướng,
Omen đao phủ tận thế,
Omen chiến binh trăng khuyết,
Omen thuyền trưởng hải tặc,
Omen nhạc sĩ huyền thoại,
Tulen nhà thám hiểm,
Tulen tân thần thiên hà,
Tulen phù thủy kiến tạo,
Tulen đông êm đềm,
Tulen phó kỷ luật,
Tulen tân thần hoàng kim,
Tulen chí tôn kiếm thiên,
Tulen dạ hội,
Tulen thần sứ stl79,
Tulen hỏa long thần tộc,
Tulen tân niên vệ thần,
Liliana hồ quý phi,
Liliana thần tượng âm nhạc,
Liliana nguyệt mị ly,
Liliana tiểu thơ anh đào,
Liliana tân nguyệt mị ly,
Liliana nữ thần f1,
Liliana thủy thủ hồ ly,
Liliana wave,
Max hiệp sĩ nhí,
Max găng tay vàng,
Max quang vinh,
Max thần đồng sinh hóa,
Max thần thoại hy lạp,
The Flash tia chớp tương lai,
Wisp hải tặc nhí,
Wisp thỏ siêu quậy,
Wisp ếch nhồi bông,
Wisp máy phát quà,
Arum thú vệ cổ mộ,
Arum vũ khúc long hổ,
Arum linh tượng vu nữ,
Arum vũ khúc thần sứ,
Arum thỏ may mắn,
Arum nữ hoàng gấu xám,
Arum quản lý tài năng,
Rourke pháo thủ tuộc neo,
Rourke biệt đội siêu hùng,
Rourke cuồng tặc,
Marja linh xà tư tế,
Marja hỏa ngọc nữ vương,
Roxie thám tử tập sự,
Roxie kèn ái tình,
Roxie hầu gái,
Roxie tiệc bánh kẹo,
Baldum chú thợ ống nước,
Baldum liệt hỏa dung nham,
Baldum thần thoại hy lạp,
Baldum thế giới kẹo ngọt,
Annette nữ quản ga,
Annette xứ sở thần tiên,
Annette thần tượng âm nhạc,
Annette tiệc bãi biển,
Annette vân mộng tiên tử,
Annette nữ sinh trung học,
Amily đặc ảnh nypd,
Amily đặc công nhện đỏ,
Amily thư ký,
Amily thỏ may mắn,
Amily võ thần thiên hà,
Amily amily quang vinh,
Y`bneth hạt trưởng kiểm lâm,
Y`bneth chiến binh lục bảo,
Elsu cảnh vệ thảo nguyên,
Elsu mafia,
Elsu guitar tình ái,
Elsu chiến binh bóng tối,
Elsu sứ giả tận thế,
Elsu tuyết ưng,
Richter bá tước,
Richter thống soái kháng chiến,
Richter dạ hội,
Richter thần kiếm susanoo,
Quillen trưởng ngoại khoa,
Quillen đặc công mãng xà,
Quillen thống soái đế chế,
Quillen huyết thủ nguyệt tộc,
Quillen sao đỏ học đường,
Quillen tà linh ma đao,
Quillen hoàng kim soái vương,
Quillen nghịch thiên long đế,
Sephera quý tiểu thư,
Sephera chiêm tinh gia,
Sephera thần tượng âm nhạc,
Sephera phi vụ thế kỷ,
Sephera thần thoại hy lạp,
Florentino vũ kiếm sư,
Florentino giám sát tinh hệ,
Florentino kiếm sĩ olympic,
Florentino thần thoại hy lạp,
Florentino seven,
Florentino tà long kiếm sĩ,
Veres đạo tặc,
Veres gián điệp tinh hệ,
Veres thần thoại hy lạp,
Veres chị đại học đường,
Veres thủy thần kiều diễm,
D`arcy nam tước,
D`arcy đô đốc tinh hệ,
D`arcy pháp sư hỏa long,
Hayate bạch ảnh,
Hayate chiến binh trăng khuyết,
Hayate ngân lang,
Hayate tử thần vũ trụ,
Hayate quỷ diện,
Hayate kim ưng sát thủ,
Hayate bạch vô thường,
Capheny hầu gái,
Capheny thần tượng âm nhạc,
Capheny toán hóa sinh,
Capheny kimono,
Capheny siêu cấp tin tặc,
Capheny harley quinn,
Errol vượt ngục,
Errol diệt nguyệt tiên phong,
Errol genos,
Yena khuyên bạc,
Yena thỏ may mắn,
Yena chiến binh nguyệt tộc,
Yena hoạt náo viên,
Yena nữ hoàng thể thao,
Yena dạ nguyệt thánh nữ,
Yena giảng viên tình ái,
Yena wave,
Enzo phẩm chất quý tộc,
Enzo chiến binh trăng khuyết,
Enzo thần thoại hy lạp,
Enzo hồng hạc thị vệ,
Zip gà siêu quậy,
Zip tiểu đệ hổ báo,
Qi tiểu long,
Qi đặc vụ cáo tuyết,
Qi quán quân,
Qi thiếu nữ pháo hoa,
Celica nữ cao bồi,
Volkath dạ huyết tộc,
Volkath ma kỵ tử sĩ,
Volkath xung thiên thần tướng,
Volkath tư lệnh viễn chinh,
Krizzix cún siêu quậy,
Krizzix đội đặc nhiệm,
Eland`orr soái tặc,
Eland`orr pphi vụ thế kỷ,
Eland`orr học viện carano,
Eland`orr siêu thám tử,
Ishar giấc mơ ngọt ngào,
Ishar tiểu thư kẹo ngọt,
Ishar tiểu thư gấu trúc,
Ishar lễ hội ma quái,
Dirak cảnh vệ bầu trời,
Dirak pháp sư trăng khuyết,
Dirak quý tộc norman,
Dirak ông bầu showbiz,
Keera y tá lạ,
Keera học viện karano,
Keera sát thủ bí ngô,
Keera thủy thủ,
Keera tiệc bãi biển,
Ata tân thủy thủ,
Ata cao bồi,
Ata quang vinh,
Paine khúc nhạc tử vong,
Paine phi vụ thế kỷ,
Paine công tước máu,
Laville tay đua đường phố,
Laville tay súng diệt thần,
Laville tay súng vô địch,
Laville xạ thần tinh vệ,
Laville kim quy thần vương,
Rouie sứ giả vũ trụ,
Rouie tuần lộc đáng yêu,
Zata tư lệnh viễn chinh,
Zata sứ giả tinh hệ,
Zata thần mặt trời,
Allain hắc kiếm sĩ kirito,
Allain kirito,
Allain thần mặt trời,
Thorne cận vệ hoàng gia,
Thorne giả kim thuật sư,
Sinestrea giấc mơ trưa,
Sinestrea tiểu thư băng giá,
Sinestrea wave,
Dextra chiến binh quyến rũ,
Dextra quận chúa tuyết,
Dextra quý cô tuổi dần,
Lorion chiến giáp hắc ám,
Bright khiêu chiến,
Bright toshiro hitsugaya,
AOI sát thủ đô thị,
AOI hoàng kim công chúa,
IGGY tiểu hoàng đế,
tachi lãng khách,
aya hoạt náo viên,
YUE tiểu công chúa
";
    $mang = explode(',', $arr);
    return $mang;
}
function arr_tuong()
{
    $arr = "Aleister,
        Alice,
        Azzen Ka,
        Butterfly,
        Chaugnar,
        Cresht,
        Điêu Thuyền,
        Fennik,
        Gildur,
        Grakk,
        Ilumia,
        Jinna,
        Kahlii,
        Kriknak,
        Krixi,
        Lauriel,
        Lữ Bố,
        Lumburr,
        Maloch,
        Mganga,
        Mina,
        Arthur, 
        Nakroth,
        Natalya, 
        Ngộ Không, 
        Omega, 
        Ormarr, 
        Payna, 
        Preyta, 
        Raz, 
        Skud, 
        Slimz, 
        Taara,
        Thane, 
        Toro,
        Triệu Vân,
        Valhein,
        Veera, 
        Violet,
        Yorn, 
        Zephys,
        batman,
        Airi, 
        Zuka,
        Ignis, 
        Murad,
        Zill,
        Arduin,
        Joker, 
        Ryoma,
        Astrid,
        Tel Annas,
        Superman,
        Wonder Woman,
        Xeniel,
        Kil Groth,
        Moren, 
        TeeMee, 
        Lindis,
        Omen, 
        Tulen, 
        Liliana,
        Max, 
        The Flash, 
        Wisp,
        Arum,
        Rourke, 
        Marja,
        Roxie, 
        Baldum,
        Annette,
        Amily, 
        Ybneth,
        Elsu,
        Quillen,
        Sephera, 
        Richter,
        Florentino,
        DArcy,
        Fennik,
        Wiro, 
        Yan, 
        Veres, 
        Hayate,
        Capheny, 
        Errol, 
        Yena, 
        Enzo, 
        Zip, 
        Qi, 
        Celica, 
        Volkath,
        Krizzix, 
        Eland orr,
        Ishar, 
        Dirak, 
        Keera, 
        Ata, 
        Paine, 
        Laville, 
        Rouie, 
        Zata, 
        Allain, 
        Thorne, 
        Sinestrea, 
        Dextra, 
        Lorion,
        Bright, 
        IGGY, 
        AOI, 
        Aya,
        Tachi, 
        Yue";
    $mang = explode(',', $arr);
    return $mang;
}
function makeML($content, $search, $replace, $link)
{
    if ($content != '') {
        require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/classes/simple_html_dom_helper.php');
        $html = str_get_html($content);
        $h2s = $html->find("h2,h3,h4");
        $patterns = array('/\d+\.\d+\.\d+\.\s/i', '/\d+\.\d+\.\s/i', '/\d+\.\s/i');
        $ml = "<div class='boxmucluc'><ul>";
        $i = $u = $j = 0;
        foreach ($h2s as $h2) {
            $text = preg_replace($patterns, '', $h2->plaintext, 1);
            $id = replaceTitle($text);
            if ($id == $search) {
                $id = $replace;
            }
            $h2->id = $id;
            if ($h2->tag == 'h2') {
                $i++;
                $ml .= "<li><a class='ml_h2' href='" . $link . "#" . $id . "'>" . $i . ". " . $text . "</a></li>";
                $j = 0;
            }
            if ($h2->tag == 'h3') {
                $j++;
                $ml .= "<li><a class='ml_h3' href='" . $link . "#" . $id . "'>" . $i . "." . $j . ". " . $text . "</a></li>";
                $u = 0;
            }
            if ($h2->tag == 'h4') {
                $u++;
                $ml .= "<li><a class='ml_h4' href='" . $link . "#" . $id . "'>" . $i . "." . $j . "." . $u . ". " . $text . "</a></li>";
            }
        }
        $ml .= '</ul></div>';
        echo $ml;
    }
}

function makeML_content($content, $search, $replace)
{
    if ($content != '') {
        require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/classes/simple_html_dom_helper.php');
        $html = str_get_html($content);
        $h2s = $html->find("h2,h3,h4");
        $patterns = array('/\d+\.\d+\.\d+\.\s/i', '/\d+\.\d+\.\s/i', '/\d+\.\s/i');
        foreach ($h2s as $h2) {
            $text = preg_replace($patterns, '', str_replace('&nbsp;', ' ', $h2->plaintext));
            $id = replaceTitle($text);
            if ($id == $search) {
                $id = $replace;
            }
            $h2->id = $id;
        }
        $html = $html->save();
        return $html;
    }
}
function makeXT_content($content, $search = array())
{
    if ($content != '' && !empty($search)) {
        $html = str_get_html($content);
        $h2s = $html->find("h2");
        $i = 1;
        foreach ($h2s as $h2) {
            if ($i > 1) {
                if ($i > 8) {
                    break;
                }
                $h2->outertext = array_shift($search) . $h2->outertext;
            }
            $i++;
        }
        $html = $html->save();
        return $html;
    } else {
        return $content;
    }
}
function vn_str_filter($str)
{
    $str = trim(strtolower($str));
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd' => 'đ|Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i' => 'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        '-' => ' |%|,|=|;|!',
    );
    foreach ($unicode as $nonUnicode => $uni) {
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    $str = str_replace('?', '', $str);
    $str = str_replace('"', '', $str);
    $str = str_replace('“', '', $str);
    $str = str_replace('”', '', $str);
    $str = str_replace("'", '', $str);
    $str = str_replace("---", '-', $str);
    $str = str_replace("--", '-', $str);
    return $str;
}
// cay rank
function rank_arr($index = "")
{
    $arr = [
        '0' => 'Đồng III',
        '21000' => 'Đồng II',
        '43500' => 'Đồng I',
        '68500' => 'Bạc III',
        '94500' => 'Bạc II',
        '123500' => 'Bạc I',
        '156000' => 'Vàng IV',
        '195000' => 'Vàng III',
        '237000' => 'Vàng II',
        '282000' => 'Vàng I',
        '331000' => 'Bạch Kim V',
        '380000' => 'Bạch Kim IV',
        '432000' => 'Bạch Kim III',
        '487000' => 'Bạch Kim II',
        '545000' => 'Bạch Kim I',
        '606000' => 'Kim Cương V',
        '672500' => 'Kim Cương IV',
        '743500' => 'Kim Cương III',
        '819000' => 'Kim Cương II',
        '899000' => 'Kim Cương I',
        '983500' => 'Tinh Anh V',
        '1068000' => 'Tinh Anh IV',
        '1154000' => 'Tinh Anh III',
        '1241500' => 'Tinh Anh II',
        '1330500' => 'Tinh Anh I',
        '1423000' => 'Cao Thủ'
    ];
    if ($index != "") {
        return $arr[$index];
    } else {
        return $arr;
    }
}

function name_booster_arr()
{
    $arr = [
        '0' => 'Đát Thách Đấu',
        '1' => 'Mạnh Cao Thủ',
        '2' => 'Chỉnh Đồng Đoàn'
    ];
    return $arr;
}

function sendEmail($to, $name, $subject, $content)
{
    require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/classes/phpmailer/class.phpmailer.php');
    require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/classes/phpmailer/class.smtp.php');
    // $mail = new PHPMailer();
    // $mail->IsSMTP(); // set mailer to use SMTP;
    $usernameSmtp = 'mations88@gmail.com'; //  AKIA4H45CLBRDNNBQ4NW
    $passwordSmtp = 'ytsptbaatkcovtxc';  // amkbkhqvdvjfoojb BBhUIbTmBLQkalYzuYFoRFjnWZRXhzkiyod+qfGtxvME
    $host = 'smtp.gmail.com';
    $port = 587;
    $sender = 'no-reply@timviec365.com.vn';
    $senderName = 'Zendo.vn';

    $mail             = new PHPMailer(true);

    $mail->SMTPSecure = 'ssl'; //secure transfer enabled
    $mail->IsSMTP();
    $mail->SetFrom($sender, $senderName);
    $mail->Username   = $usernameSmtp;  // khai bao dia chi email
    $mail->Password   = $passwordSmtp;              // khai bao mat khau   
    $mail->Host       = $host;    // sever gui mail.
    $mail->Port       = $port;         // cong gui mail de nguyen 
    $mail->SMTPAuth   = true;    // enable SMTP authentication
    $mail->SMTPSecure = "tls";   // sets the prefix to the servier        
    $mail->CharSet  = "utf-8";
    $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
    // xong phan cau hinh bat dau phan gui mail
    $mail->isHTML(true);
    $mail->Subject    = $subject; // tieu de email 
    $mail->Body       = $content;
    $mail->addAddress($to, $name);
    // var_dump($mail);
    // echo 1;
    // die;
    if (!$mail->Send()) {
        echo $mail->ErrorInfo;
    } else {
        return true;
    }
}
function resize_image($path, $filename, $new_name, $maxwidth, $maxheight, $quality, $type = "", $new_path = "")
{
    $sExtension = substr($filename, (strrpos($filename, ".") + 1));
    $sExtension = strtolower($sExtension);
    // Get new dimensions
    list($width, $height) = getimagesize($path);
    if ($width != 0 && $height != 0) {
        if ($maxwidth / $width > $maxheight / $height) $percent = $maxheight / $height;
        else $percent = $maxwidth / $width;
    }

    $new_width    = $width * $percent;
    $new_height    = $height * $percent;
    // Resample
    $image_p = imagecreatetruecolor($new_width, $new_height);
    //check extension file for create
    switch ($sExtension) {
        case "gif":
            $image = imagecreatefromgif($path);
            break;
        case $sExtension == "jpg" || $sExtension == "jpe" || $sExtension == "jpeg":
            $image = imagecreatefromjpeg($path);
            break;
        case "png":
            $image = imagecreatefrompng($path);
            imagealphablending($image_p, false);
            imagesavealpha($image_p, true);
            $transparent = imagecolorallocatealpha($image_p, 255, 255, 255, 127);
            imagefilledrectangle($image_p, 0, 0, $new_width, $new_height, $transparent);
            break;
    }
    //Copy and resize part of an image with resampling
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    // Output

    // check new_path, nếu new_path tồn tại sẽ save ra đó, thay path = new_path
    if ($new_path != "") $path = $new_path;
    // echo $path;die;
    switch ($sExtension) {
        case "gif":
            imagegif($image_p, $path . $type . $filename);
            break;
        case $sExtension == "jpg" || $sExtension == "jpe" || $sExtension == "jpeg":
            imagejpeg($image_p, $path . $type . $new_name, $quality);
            break;
        case "png":
            imagejpeg($image_p, $path . $type . $new_name, $quality);
            break;
    }
    imagedestroy($image_p);
}
function resize_image_upload($path, $filename, $new_name, $maxwidth, $maxheight, $quality, $type = "", $new_path = "") // resize khi đăng ảnh
{
    $sExtension = substr($filename, (strrpos($filename, ".") + 1));
    $sExtension = strtolower($sExtension);
    // Get new dimensions
    list($width, $height) = getimagesize($path);
    if ($width != 0 && $height != 0) {
        if ($maxwidth / $width > $maxheight / $height) $percent = $maxheight / $height;
        else $percent = $maxwidth / $width;
    }

    $new_width    = $width * $percent;
    $new_height    = $height * $percent;
    if ($type == 'index') {
        $new_width    = $maxwidth;
        $new_height    = $maxheight;
        $type = "";
    }
    // Resample
    $image_p = imagecreatetruecolor($new_width, $new_height);
    //check extension file for create
    switch ($sExtension) {
        case "gif":
            $image = imagecreatefromgif($path);
            break;
        case $sExtension == "jpg" || $sExtension == "jpe" || $sExtension == "jpeg":
            $image = imagecreatefromjpeg($path);
            break;
        case "png":
            $image = imagecreatefrompng($path);
            imagealphablending($image_p, false);
            imagesavealpha($image_p, true);
            $transparent = imagecolorallocatealpha($image_p, 255, 255, 255, 127);
            imagefilledrectangle($image_p, 0, 0, $new_width, $new_height, $transparent);
            break;
    }
    //Copy and resize part of an image with resampling
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    // Output

    // check new_path, nếu new_path tồn tại sẽ save ra đó, thay path = new_path
    if ($new_path != "") $path = $new_path;
    // echo $path;die;
    switch ($sExtension) {
        case "gif":
            imagegif($image_p, $path . $type . $filename);
            break;
        case $sExtension == "jpg" || $sExtension == "jpe" || $sExtension == "jpeg":
            imagejpeg($image_p, $path . $type . $new_name, $quality);
            break;
        case "png":
            imagejpeg($image_p, $path . $type . $new_name, $quality);
            break;
    }
    imagedestroy($image_p);
}
// cay rank
function source_signup($index = "", $type = "")
{
    if ($type == 'LMHT') {
        $arr = [
            '0' => 'Việt',
            '1' => 'Hàn Quốc',
            '2' => 'NA',
            '3' => 'PBE'
        ];
    } else if ($type == 'PUBG') {
        $arr = [
            '1' => 'Facebook',
            '2' => 'Play game',
            '3' => 'Game Center'
        ];
    } else {
        $arr = [
            '0' => 'Facebook',
            '1' => 'Vkontakate'
        ];
    }
    if ($index != "") {
        return $arr[$index];
    } else {
        return $arr;
    }
}
