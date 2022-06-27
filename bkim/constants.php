<?php
//CẤU HÌNH TÀI KHOẢN (Configure account)
define('EMAIL_BUSINESS','mphamngoc95@gmail.com');//Email Bảo kim
define('MERCHANT_ID','33102');                // Mã website tích hợp
define('SECURE_PASS','PdxDBFDtV5F6fCNzhf6z');   // Mật khẩu
// Cấu hình tài khoản tích hợp
define('API_USER','ngocmanh123');  //API USER
//define('API_PWD','2q1vYc8pJ57bAW9VjCnXH1htk3GOK');       //API PASSWORD
define('API_PWD','c808kG42i6D1THrp8RU4uz28vg06N');       //API PASSWORD
define('PRIVATE_KEY_BAOKIM','-----BEGIN PRIVATE KEY-----
MIIEwAIBADANBgkqhkiG9w0BAQEFAASCBKowggSmAgEAAoIBAQDGBP6P6MwURf0N
bkuqPDZ5VHQoRmkbBV/2OO/Y6JWazDy19HibBh2hZSqTXHY59r+HY3lcHilN8d+L
llTHYO+H1Xw5o9ftF7QMoMEVTx1716s4N3sKGYjHtD12yPipfKqjC/xf7OqpURQ1
Y05sIZG6uLxHfKiFBR33VPeoGMPnD+nVgM0AgtJo//fGNL/ap5duVRx6J8nc80sU
bib+UpjH2A1QeVinqazCaR2+8Aq1uam48dUZBfvi8rb8Tp9T7tirH2bCg7prCb3L
GhuDlWmVe5IQ//3JjN6p+tLH/iFmwXmzj9zwPhgrrevHb1MxXze54/UQ+WnYqGnV
ah81lHEbAgMBAAECggEBAJRRqVqhRDrrMV+d/Y7FCwhV+asxEgjrPbVvcDdH/saz
s8WWF8AGFKuO2xUFbIh+CXefSod1D/sR8B7duyKbuM5FWYbS8ijkWDgdMIKFf9AC
+nxhEge+mHT8zAzs+1P3zNfTYnV3P00TLc/PUi4r9rulI2FoPdFkw80+F0IRSqsG
LpdKFt9F3mRuJuEyXpRPMarxMGVcht+w6rtpSWpj/IosUnIrwpODp1G3dIjsXLnn
acL+pZcsfl5C3m8v/AdKiwRJXkO8WBmOATyO8McEsS6mbvWTtzy+ByHQTnAibiuq
9y31mvcaI5gno76BnkF07wBwipMR6OS9xj32ooiIhgECgYEA7a/Fy2dOv3MkQTyz
c+XQ80gUZRJBtV2htDJyEkcOs2Ybfl6zzxkBrBDyosjJDwUSxHRy8xwnikxzeQrF
DJKhh1L9Gaej4w6Sy3rfpBOVd1yC5V/pAgjDbrVtPDL8jCx+Q7adqhkZvAPqXSkI
Hcb03heUlkYNBOGdgruoYb/LQN0CgYEA1UbPyvqDhePE9TSYqWBoIgKxDbvw3RyQ
83BmMaasfwIQ2jeJ2f/FZrb588iWmVzaxwHddhEia4YizjQ3PbCUUJlyOa2X75yu
4Txzo2FecXRCSGpRKLnVbsm1Y4NlOLNKCcz71NGGWTkPrXXSiCyRe2ZmrTWUom1U
G4Y/Zq9NnlcCgYEAyLrgLSaC37Zq0NllqCRW8Y5XAwCHE5cOgDL2GS9/X8yEvZVW
/zhcLCdn8kflXNTpA5ZgmaWWUvq7rmaFAVg4KCPS8j6cbp4ZJNURV+zeFp6/QN1d
18T032NC7EsW836D58Wqo0Ntc1ZPL/v+Cb/DfmilqL9iMVQkhIrc6ihii9UCgYEA
wzVyIdYTpevpLYp7pKQSC/csuWZpOujXn4okb5Of1Qw+Ao3NBhS+SJp3w3O4rBy6
PmZtnpBmUcZPey991GAYEIGydCp4o59kzdG4AjWv7OY9eOye5kjZmvLSrIfqkPBB
dyEA6zTv5CB/QgRSs8MfUbRTjHw7VEP/NMY2p7UStTcCgYEAja5Zfp6ePVLzn8fo
bDhfirnVhF3IJ+8CGI7Ovb8P6GegMHfLZmJQ+DIbtJdCG3nE7diLm0Cx0ktt1AtP
5bYNde/X9bj+Z7FfG7N7+1X/KWGMzQnfauhEgfCt2yFlS79EgAuApNWhG03X36Y7
nlE03m7A/RwFS6DWxiEcJcc5wQo=
-----END PRIVATE KEY-----');

define('BAOKIM_API_SELLER_INFO','/payment/rest/payment_pro_api/get_seller_info');
define('BAOKIM_API_PAY_BY_CARD','/payment/rest/payment_pro_api/pay_by_card');
define('BAOKIM_API_PAYMENT','/payment/order/version11');

define('BAOKIM_URL','https://www.baokim.vn');
//define('BAOKIM_URL','http://baokim.dev');
//define('BAOKIM_URL','http://kiemthu.baokim.vn');

//Phương thức thanh toán bằng thẻ nội địa
define('PAYMENT_METHOD_TYPE_LOCAL_CARD', 1);
//Phương thức thanh toán bằng thẻ tín dụng quốc tế
define('PAYMENT_METHOD_TYPE_CREDIT_CARD', 2);
//Dịch vụ chuyển khoản online của các ngân hàng
define('PAYMENT_METHOD_TYPE_INTERNET_BANKING', 3);
//Dịch vụ chuyển khoản ATM
define('PAYMENT_METHOD_TYPE_ATM_TRANSFER', 4);
//Dịch vụ chuyển khoản truyền thống giữa các ngân hàng
define('PAYMENT_METHOD_TYPE_BANK_TRANSFER', 5);

?>