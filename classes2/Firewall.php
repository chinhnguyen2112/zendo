<?php

Class Firewall
  {


    
    public function SecureUris()
      {
          // get the current url
          $inurl = $_SERVER['REQUEST_URI'];
          if (preg_match("#select|update|delete|concat|create|table|union|length|show_table|mysql_list_tables|mysql_list_fields|mysql_list_dbs#i", $inurl))
          {
            exit($this->SecurityWarningTemplate());
          }
           $securityUlrs_url = $_SERVER['QUERY_STRING'];
           if ($securityUlrs_url != '' AND !preg_match("/^[_a-zA-Z0-9-=&]+$/", $securityUlrs_url))
           {
            exit($this->SecurityWarningTemplate());
           }

           foreach ($_POST as $param_name => $param_val) {
            $post = $param_val;
              if (preg_match("#select|update|delete|concat|create|table|union|length|show_table|mysql_list_tables|mysql_list_fields|mysql_list_dbs#i", $param_val))
              {
                exit($this->SecurityWarningTemplate());
              }            
           }
           
           return true;
      }
    public function getClean($txt){
        $txt = htmlspecialchars($txt);
        $txt = str_replace("select","5ev1ect",$txt);
        $txt = str_replace("update","upd4tee",$txt);
        $txt = str_replace("insert","1dn5yert",$txt);
        $txt = str_replace("where","w6eere",$txt);
        $txt = str_replace("like","1insk",$txt);
        $txt = str_replace("or","08r",$txt);
        $txt = str_replace("and","4nd",$txt);
        $txt = str_replace("set","5eut",$txt);
        $txt = str_replace("into","1n8t0",$txt);
        $txt = str_replace("'", "", $txt);
        $txt = str_replace(";", "", $txt);
        $txt = str_replace(">", "", $txt);
        $txt = str_replace("<", "", $txt);
        $txt = strip_tags($txt);
        return $txt;
    }
    public function get_ip()
     {
           if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                 $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
           }
           elseif(isset($_SERVER['HTTP_CLIENT_IP'])) {
                 $ip = $_SERVER['HTTP_CLIENT_IP'];
           }
           else {
                 $ip = $_SERVER['REMOTE_ADDR'];
           }
           return $ip;
     }
   
  }
 ?>