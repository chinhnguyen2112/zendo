<?php

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
$path = '../files/'; // patch lưu file

// Nếu đăng nhập và là admin
if ($user && $data_user['admin'] > 0) {

    $total_champs = count($_FILES["champs"]["name"]);
    $thumb = count($_FILES["thumb"]["name"]);
    $username = addslashes(htmlspecialchars($_POST['username']));
    $password = addslashes(htmlspecialchars($_POST['password']));
    $price = addslashes(htmlspecialchars($_POST['price']));
    $price_atm = $price - (20 / 100 * $price);
    $skins_count = addslashes(htmlspecialchars($_POST['skins_count']));
    $champs_count = addslashes(htmlspecialchars($_POST['champs_count']));
    $rank = addslashes(htmlspecialchars($_POST['rank']));
    $note = addslashes(htmlspecialchars($_POST['note']));
    $type_post = 'LIÊN QUÂN MOBILE SHOPMOBAVIET';
    $ngoc = addslashes(htmlspecialchars($_POST['ngoc']));

    if(isset($_POST['champ'])){
        $ten = array(

            '35' => '35-Toro',
            '9' => '9-Gildur',
            '13' => '13-Kahlii',
            '20' => '20-Mganga',
            '15' => '15-Krixi',
	        '21' => '21-Mina',
	         '36' => '36-Triệu Vân',
            '37' => '37-Valhein',
            '38' => '38-Veera',
            '33' => '33-Taara',
            '17' => '17-Lữ Bố',
            '44' => '44-Zuka',
            '39' => '39-Violet',
            '40' => '40-Yorn',            
            
            '1' => '1-Aleister',
            '2' => '2-Alice',
            '3' => '3-Azzen Ka',
            '4' => '4-Butterfly',
            '5' => '5-Chaugnar',
	        '6' => '6-Cresht',
            '7' => '7-Điêu Thuyền',
            '8' => '8-Fennik',
            '10' => '10-Grakk',
	        '11' => '11-Ilumia',
            '12' => '12-Jinna',
            '14' => '14-Kriknak',
	        '16' => '16-Lauriel',

            '18' => '18-Lumburr',
            '19' => '19-Maloch',
            '22' => '22-Arthur',
            '23' => '23-Nakroth',
            '24' => '24-Natalya',
            '25' => '25-Ngộ Không',
	        '26' => '26-Omega',
            '27' => '27-Ormarr',
            '28' => '28-Payna',
            '29' => '29-Preyta',
            '30' => '30-Raz',
	        '31' => '31-Skud',
            '32' => '32-Slimz',
            '34' => '34-Thane',

	        '41' => '41-Zephys',
    	    '42' => '42-batman',
            '43' => '43-Airi',
            '45' => '45-Ignis',
            '46' => '46-Murad',
	        '47' => '47-Zill',
            '48' => '48-Arduin',
            '49' => '49-Joker',
            '50' => '50-Ryoma',
            '51' => '51-Astrid',
	        '52' => '52-Tel Annas',
            '53' => '53-Superman',
            '54' => '54-Wonder Woman',
            '55' => '55-Xeniel',
            '56' => '56-Kil Groth',
            '57' => '57-Moren',
            '58' => '58-TeeMee',
            '59' => '59-Lindis',
           '60' => '60-Omen',
           '61' => '61-Tulen',
           '62' => '62-Liliana',
           '63' => '63-Max',
           '64' => '64-The Flash',
           '65' => '65-Wisp',
           '66' => '66-Arum',
           '67' => '67-Rourke',
           '68' => '68-Marja',
           '69' => '69-Roxie',
           '70' => '70-Baldum',
           '71' => '71-Annette',
           '72' => '72-Amily',
            '73' => '73-Ybneth',
            '74' => '74-Quillen',
            '75' => '75-Florentino',
            '76' => '76-Sephera',
            '77' => '77-Elsu',
            '78' => '78-Wiro',
            '79' => '79-Richter',





        );
        foreach($_POST['champ'] as $a){
            $anthien .= $ten[$a] . "|";
        }
    }
    $luoc = rtrim($anthien, "|");
    
    if(isset($_POST['skin'])){
            $ten2 = array(
  '37'=> 'vanhein hoàng tử quạ',
'67'=> 'Triệu Vân Quang vinh',
'33'=> 'Thane Quang Vinh)',
'3'=> 'Butterfly Thủy thủ',
'4'=> 'Chaugnar Ác mộng sinh hóa',
'5'=> 'cresht thợ sửa cáp',
'7'=> 'Fennik Nhà thám hiểm',
'8'=> 'Gildur Phượt thủ',
'13'=> 'Kriknak Bọ cánh bạc',
'14'=> 'Krixi Công chúa bướm',
'20'=> 'Mganga Hề cung đình',
'21'=> 'mina tiểu thu đoạt hồn',
'22'=> 'Nakroth Quân đoàn địa ngục',
'34'=> 'toro đặc cảnh SNDP',
'31'=> 'Slimz Thỏ thợ mỏ',
'41'=> 'Violet Nữ đặc cảnh',
'43'=> 'Yorn Cung thủ bóng đêm',
'44'=> 'Zephys Oán linh',
'47'=> 'Zuka Đại phú nông',
'55'=> 'Mganga Tiệc bánh kẹo',
'56'=> 'Grakk Khô lâu đại tướng',
'57'=> 'mortos hoàng kim cốt',
'78'=> 'Mina Tiệc bánh kẹo',
'1'=> 'Alice Nhà chiêm tinh',
'2'=> 'Butterfly Teen nữ công nghệ',
'6'=> 'Điêu thuyền Nữ vương anh đào',
'9'=> 'grakk choàng gấu tuyết',
'10'=> 'iLumia Nữ chúa tuyết',
'11'=> 'Jinna Đại tư tế',
'12'=> 'Veera Cô dâu hắc ám',
'15'=> 'Krixi Xứ sở thần tiên',
'16'=> 'lauriel đọa lạc thiên sứ',
'17'=> 'lữ bố long kị sỹ',
'18'=> 'Lumburr Dung nham',
'19'=> 'maloch tiệc hóa trang',
'23'=> 'Natalya Nghệ nhân lân',
'24'=> 'Natalya Quý cô thủy tề',
'25'=> 'Omega Người máy',
'26'=> 'orrmar cựu chiến binh',
'27'=> 'Payna Cảnh vệ rừng',
'28'=> 'preyta không tăc',
'29'=> 'Raz Đại tù trưởng',
'30'=> 'Skud Sơn tặc',
'32'=> 'Butterfly Xuân nữ ngổ ngáo',
'35'=> 'Triệu vân Đoạt mệnh thương',
'36'=> 'Triệu vân Quý công tử',
'38'=> 'vanhein vũ khí tối thượng',
'39'=> 'Veera Cô giáo hắc ám',
'40'=> 'veera nàng dơi tuyết',
'42'=> 'Violet Nữ hoàng pháo hoa',
'45'=> 'Lữ Bố Kỵ sĩ âm phủ',
'46'=> 'Airi Ninja xanh lá',
'48'=> 'taara đại tù trưởng',
'49'=> 'Maloch Ác ma địa ngục',
'50'=> 'azzenka linh hồn lữ khách',
'51'=> 'Ignis Hỏa thuật sư',
'52'=> 'Murad Thợ săn tiền thưởng',
'53'=> 'butterfly nữ quái  nổi loạn',
'54'=> 'Zill Lốc địa ngục',
'58'=> 'Arthur Lãnh chúa sương',
'59'=> 'Aleister Thiếu niên hắc ám',
'60'=> 'Nakroth Bboy công nghệ',
'61'=> 'Ngộ Không Đạo tặc',
'62'=> 'yorn đặc cảnh WAT',
'63'=> 'Veera Y tá bạo loạn',
'64'=> 'arduin cảnh vệ hoàng gia',
'65'=> 'Batman Đôi cánh đại dương',
'66'=> 'Lữ Bố Đặc nhiệm SWAT',
'68'=> 'Joker Trò đùa tử vong',
'69'=> 'Ryoma Thợ săn tiền thưởng',
'70'=> 'Astrid Bạch kiếm tiểu thư',
'71'=> 'TelAnnas cảnh vệ rừng',
'72'=> 'Airi Thích khách',
'73'=> 'Maloch Samurai tử sĩ',
'74'=> 'zephy hiệp sĩ bí ngô',
'75'=> 'lauriel phù thùy bí ngô',
'76'=> 'Slimz chú thỏ ngọc',
'77'=> 'Gildur Tiệc bãi biển',
'79'=> 'superman chúa tể công lí',
'80'=> 'Fennik Tiệc bánh kẹo',
'81'=> 'Krixi Tiệc bãi biển',
'82'=> 'Ilumia Hồng hoa hậu',
'83'=> 'Xeniel Thiên sứ hủy diệt',
'84'=> 'Lữ Bố Tiệc bãi biển',
'85'=> 'Triệu vân Dũng sĩ đồ long',
'86'=> 'Kil Groth cảnh vệ biển',
'87'=> 'Nakroth chiến binh hỏa ngục',
'88'=> 'natalya quà quái quỷ',
'89'=> 'orrmar thông thỏa thích',
'90'=> 'moren anh thợ rèn',
'91'=> 'vanhein đại công tước',
'92'=> 'Aleister Quang Vinh',
'93'=> 'Điêu thuyền hoa hậu',
'94'=> 'Lauriel hoả phụng hoàng',
'95'=> 'lữ bố nam dương',
'96'=> 'Zuka giáo sư sừng sỏ',
'97'=> 'Toro trung phong cắm',
'98'=> 'TeeMee xiếc cung đình',
'99'=> 'murad mtp thần tượng',
'100'=> 'Fenik tuần lộc láu lỉnh',
'101'=> 'ngộ không hỏa nhãn kim tinh',
'102'=> 'Lindis thám tử tư',
'103'=> 'preyta băng hỏa long sư',
'104'=> 'Violet phi công trẻ',
'105'=> 'thế tử nguyệt tộc',
'106'=> 'Zill dung nham',
'107'=> 'nakroth siêu việt',
'108'=> 'arthur chung tình tiễn',
'109'=> 'Tulen nhà thám hiểm',
'110'=> 'telannas chung tình tiễn',
'111'=> 'Violet mèo siêu quậy',
'112'=> 'omen sĩ quan viễn trinh',
'113'=> 'liliana hỏa quý phi',
'114'=> 'Airi cấm vệ nguyệt tộc',
'115'=> 'Ormarr giáo viên thể hình',
'116'=> 'Cresht cá cắn cáp',
'117'=> 'Krixi cô tiên thỏ',
'118'=> 'zuka phát  tài',
'119'=> 'Wonder Woman thế chiến',
'120'=> 'Max hiệp sĩ nhí',
'121'=> 'telannas giám thị thân thiện',
'122'=> 'taara hỏa ngọc nữ đế',
'123'=> 'Chaugnar quang vinh',
'124'=> 'Raz băng quyền quán quân',
'125'=> 'Natalya phó nháy nhí nhảnh',
'126'=> 'Grakk thuyền trưởng râu đỏ',
'127'=> 'Joker Vua hề',
'128'=> 'Kriknak yêu trùng cổ mộ',
'129'=> 'Ryoma đại tướng nguyệt tộc',
'130'=> 'Airi kiemono',
'131'=> 'Tulen tân thần thiên hà',
'132'=> 'Batman dơi địa ngục',
'133'=> 'arum thú vệ  cổ mộ',
'134'=> 'Butterfly quận chúa đế chế',
'135'=> 'Wisp hải tặc nhí',
'136'=> 'Zuka gấu nhồi bông',
'137'=> 'Tulen phù thủy kiến tạo',
'138'=> 'Murad thiên tài sân cỏ',
'139'=> 'Xeniel trung vệ thép',
'140'=> 'Kahlii quàng khăn đỏ',
'141'=> 'Vanhein số 7 thần sầu',
'142'=> 'rourke pháo thủ tuột leo',
'143'=> 'Arum thủ vệ cổ mộ',
'144'=> 'Marja linh xà tư tế',
'145'=> 'Superman bất công lí',
'146'=> 'Violet tiệc bãi biển',
'147'=> 'Taara tiệc bãi biển',
'148'=> 'max gang tay vàng',
'149'=> 'Điêu thuyền tiệc bãi biển',
'150'=> 'Vanhein quang vinh',
'151'=> 'baldlum chú thợ ống nước',
'152'=> 'Roxie thám tử tập sự',
'153'=> 'The Flash tia chớp tương lai',
'154'=> 'Ngộ không siêu việt',
'155'=> 'amily nữ đặc cảnh NYDP',
'156'=> 'Zephys dung nham',
'157'=> 'Astrid siêu sao bóng chày',
'158'=> 'ybneth hạt trưởng kiểm lâm',
'159'=> 'annette nữ quản ga',
'160'=> 'alice gấu tuyết',
'161'=> 'Liliana thần tượng âm nhạc',
'162'=> 'jinna dạ xoa vương',
'163'=> 'Raz chiến thần muay thái',
'164'=> 'telannas thánh nữ hội mật',
'165'=> 'Murad siêu việt',
'166'=> 'Airi quái xế công nghệ',
'167'=> 'Ilumia thiên nữ áo dài',
'168'=> 'Mina kẹo hay ghẹo',
'169'=> 'KilGroth Quang vinh',
'170'=> 'Krixi phó văn nghệ',
'171'=> 'Violet phó học tập',
'172'=> 'Arthur siêu sao kricket',
'173'=> 'Nakroth khiêu chiến',
'174'=> 'Butterfly đông êm đềm',
'175'=> 'Maloch đại tướng robot',
'176'=> 'Ryoma thanh long bang chủ',
'177'=> 'Liliana nguyệt mị ly',
'178'=> 'Tulen đông êm đềm',
'179'=> 'Xeniel kim si điểu',
'180'=> 'Arum vũ khúc long hổ',
'181'=> 'Airi bạch kiemono',
'182'=> 'Wisp thỏ siêu quậy',
'183'=> 'Rourke biệt đội siêu hùng',
'184'=> 'Lindis quang thánh tiễn',
'185'=> 'Omen ám tử đao',
'186'=> 'Quillen trưởng ngoại khoa',
'187'=> 'Florentino vũ kiếm sư',
'188'=> 'Sephera quý tiểu thư',
'189'=> 'Elsu mafia',
'190'=> 'Veera góa phụ giả kim',
'191'=> 'Taara tiệc bãi biển',
'192'=> 'Thane mật vụ',
'193'=> 'Richter bá tước',
'194'=> 'Skud quang vinh',
'999'=> 'THIẾU TƯỚNG',

            
        );
        foreach($_POST['skin'] as $b){
            $hieucms .= $ten2[$b] . ",";
        }
    }
    $skins = rtrim($hieucms, "|");
      // điều kiện post
       if (empty($username)){
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Chưa Nhập đủ thông tin"));
      }else{

        $sql_add_post = "INSERT INTO posts VALUES (
                        '',
                        '$username',
                        '$password',
                        '$price',
                        '$price_atm',
                        '',
                        '$skins_count',
                        '$skins',
                        '$champs_count',
                        '$luoc',
                        '$rank',
                        '',
                        '$ngoc',
                        '$note',
                        '$type_post',
                        'Liên Quân Mobile SHOP MOBAVIET',
                        '$date_current',
                        '0'
                    )";
          
       $db->query($sql_add_post); // insert vào csdl
        $id_new = $db->insert_id();



        // ảnh tướng
        for ($i = 0; $i < $total_champs; $i++) {
          if ($_FILES["champs"]["error"][$i] == 0) {
             $arr = explode(".", $_FILES["champs"]["name"][$i]);
             move_uploaded_file($_FILES["champs"]["tmp_name"][$i], $path."post/".$id_new."-".($i + 1).".".end($arr));
          }
       } 
       
       // ảnh index
        if ($_FILES["thumb"]["error"] == 0) {
            $arr = explode(".", $_FILES["thumb"]["name"]);
            move_uploaded_file($_FILES["thumb"]["tmp_name"], $path."thumb/".$id_new.".".end($arr));
        }

        echo json_encode(array('status' => "success", 'title' => "Thành công", 'msg' => "Đăng tài khoản #$id_new  thành công"));
        $db->close(); // Giải phóng

      }

} else {
    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}