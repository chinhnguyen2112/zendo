<?php
 
// Require database & thông tin chung
require_once 'core/init.php';
 
// Require header
require_once 'includes/header.php';
// Danh sach account

// $xss = new Anti_xss;

// $act = $xss->clean_up($_GET['act']);

// switch ($act) {
// 	case 'view':
// 		require_once 'templates/products/view.php'; 
// 		break;
// 	case 'LQM':
// 		require_once 'templates/products/lqm_list.php'; 
// 		break;  
// 			case 'HanQuoc':
// 		require_once 'templates/products/Han_list.php'; 
// 		break;
// 		case 'PBE':
// 		require_once 'templates/products/PBE_list.php'; 
// 		break;
// 	default:
// 		require_once 'templates/products/lol_list.php'; 
// 		break;
// }

?>
  <style>



.bg-img {
  position: relative;
  width: 100%;
  height: 100%;
  background-size: cover;
  background-color: #000;
  opacity: .5;
  filter: alpha(opacity=50);
}



h1 {
  font-size: 160px;
  margin-bottom: 0;
  margin-top: 0;
}

h2 {
  margin-top: 0;
  max-width: 700px;
  font-size: 30px;
  width: 90%;
}

p {
  text-align: left;
  padding-bottom: 32px;
}

.btn {
  display: inline-block;
  border: 1px solid #aaa;
  border-radius: 40px;
  padding: 15px 30px;
  margin-right: 15px;
  margin-bottom: 10px;
  &:hover {
    color: #e2e2e2;
    background: rgba(255,255,255,0.10);
  }
}

@media only screen and (max-width: 480px) {
  .btn {
    background-color: white;
    color: #444444;
    width: 100%;
  }

  h1 {
    font-size: 120px;
  };
}
  </style>
  <div class='container'>
    <div class='row content'>
      <div class='col-lg-12'></div>
      <div class='col-lg-12'>
        <h1>404</h1>
        <h2>Oops, the page you're looking for does not exist.</h2>
        <p>
          You may want to head back to the homepage.
          <br>
            If you think something is broken, report a problem.
          </br>
        </p>
        <a href="/" class='btn'>Về Home</a>
        <span class='btn'>REPORT PROBLEM</span>
      </div>
    </div>
  </div>
  <div class='bg-img'></div>

<?



// Require footer
require_once 'includes/footer.php';
 
?>