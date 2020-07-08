<?php 
error_reporting(0);
header('Access-Control-Allow-Origin: *');
date_default_timezone_set('Asia/Jakarta');
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
$domain = $_SERVER['SERVER_NAME'];
$fileini = $_SERVER['REQUEST_URI'];
function get_host() {
    if ($host = $_SERVER['SERVER_NAME'])
    {
        $elements = explode(',', $host);

        $host = trim(end($elements));
    }
    else
    {
        if (!$host = $_SERVER['HTTP_HOST'])
        {
            if (!$host = $_SERVER['SERVER_NAME'])
            {
                $host = !empty($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : '';
            }
        }
    }
    // Remove port number from host
    $host = preg_replace('/:\d+$/', '', $host);
    return trim($host);
}
function milliseconds() {
    $mt = explode(' ', microtime());
    return ((int)$mt[1]) * 1000 + ((int)round($mt[0] * 1000));
}
function now()
{
    return strftime("%Y-%m-%d %H:%M:%S");
}
$time_file = date("s");
$wkt = date ("Y-m-d");
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$caricovid = json_decode(file_get_contents("https://api.kawalcorona.com/indonesia/"));

//positif
if(isset($caricovid[0]->positif)){
  $positif = $caricovid[0]->positif;
}else{
  $positif = "";
}
//sembuh
if(isset($caricovid[0]->sembuh)){
  $sembuh = $caricovid[0]->sembuh;
}else{
  $sembuh = "";
}
//meninggal
if(isset($caricovid[0]->meninggal)){
  $meninggal = $caricovid[0]->meninggal;
}else{
  $meninggal = "";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Infomasi Covid 19 Indonesia Live</title>
<meta charset="utf-8" />
        <meta name="description" content="Infomasi Covid 19 Indonesia Live | IM Software" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
        <link rel="canonical" href="https://imsoftware.my.id/covid19/" />
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <meta content="755374821535427" property="fb:app_id"/>
        <meta content="imamkid" property="fb:admins"/>
        <meta name="keywords" content="Infomasi Covid 19 Indonesia Live | IM Software" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="IM Software" />
        <meta property="og:description" content="Infomasi Covid 19 Indonesia Live | IM Software"/>
        <meta property="og:url" content="https://imsoftware.my.id/covid19/" />
        <meta property="og:site_name" content="IM Software" />
        <meta property="og:image" content="https://imsoftware.my.id/covid19/web.jpg" />
        <meta property="og:image:secure_url" content="https://imsoftware.my.id/covid19/web.jpg" />
        <meta property="og:image:alt" content="Infomasi Covid 19 Indonesia Live | IM Software" />
        <meta property="og:image:width" content="640" />
        <meta property="og:image:height" content="360" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:description" content="Infomasi Covid 19 Indonesia Live | IM Software" />
        <meta name="twitter:title" content="IM Software" />
		<meta name="twitter:image" content="https://imsoftware.my.id/covid19/web.jpg" />
        <meta name="msapplication-TileColor" content="#13151980">
        <meta name="theme-color" content="#13151980">
        <meta name="author" content="IM Software">
        <link rel="stylesheet" href="main.css?" />
        <link rel="stylesheet" href="assets/css/imsoftware.css?" />
        <script language="javascript">today = new Date(); tahun = today.getFullYear();</script>
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <noscript><link rel="stylesheet" href="assets/css/noscript.css?" /></noscript>
        <style type="text/css">
    .corona-blink{display:inline-flex;width:20px;justify-content:center;}
    .corona-blink01{width:14px;height:14px;background-color:red;border-radius:50%;}
    .corona-blink02{-webkit-animation:blinking 1s cubic-bezier(0.5, 0, 1, 1) infinite alternate;animation:blinking 1s cubic-bezier(0.5, 0, 1, 1) infinite alternate;}
    ::-webkit-input-placeholder{color:#888;}
    :-moz-placeholder{color:#888;}
    ::-moz-placeholder{color:#888;}
    :-ms-input-placeholder{color:#888;}
    @media only screen and (max-width: 600px){
    .header .corona-blink{width:10px;}
    .header .corona-blink .corona-blink01{width:10px;height:10px;}
    }
    @-webkit-keyframes blinking{from{opacity:1;}to{opacity:0;}}
    @keyframes blinking{from{opacity:1;}to{opacity:0;}} 
        </style>
    </head>
<body>
<script>

// var xmlhttp = new XMLHttpRequest();
// xmlhttp.onreadystatechange = function() {
//   if (this.readyState == 4 && this.status == 200) {
//     var myObj = JSON.parse(this.responseText);
//     document.getElementById("positif").innerHTML = 'Positif <br>' + myObj[0].positif;
//     document.getElementById("sembuh").innerHTML = 'Sembuh <br>' + myObj[0].sembuh;
//     document.getElementById("meninggal").innerHTML = 'Meninggal <br>' + myObj[0].meninggal;
//     console.log(myObj[0].name);
//     console.log(myObj[0].positif);
//     console.log(myObj[0].sembuh);
//     console.log(myObj[0].meninggal);
//   }
// };
// xmlhttp.open("GET", "https://api.kawalcorona.com/indonesia/", true);
// xmlhttp.send();
</script>
        <!-- Wrapper -->
            <div id="wrapper">
                <!-- Header -->
                    <header id="header">
                        <div class="content">
                            <div class="inner">
                <h1 class="ml11">
                  <span class="text-wrapper">
                    <span class="line line1"></span>
                    <span class="letters"><strong id="corona-info">Informasi Covid-19 Indonesia</strong></span>
                  </span>
                </h1>
    <h3><?php echo strftime("%A, %d %B %Y ",strtotime(now())); ?> <span id="jam"></span>
    <span class="corona-blink"><i class="corona-blink01 corona-blink02"></i></span>
    <br>#dirumahaja</h3>
 
                            </div>
                        </div>
                        <nav>
           <ul>
                <li>Positif<label id="positif"><?php echo $positif; ?></span></label></li>
                <li>Sembuh<label id="sembuh"><?php echo $sembuh; ?></label></li>
                <li>Meninggal<label id="meninggal"><?php echo $meninggal; ?></label></li>
            </ul>
                        </nav>
                    </header>

                <!-- Main -->
                    <div id="main">

                    </div>

                <!-- Footer -->
                    <footer id="footer">
<ul class="icons">
    <li><a href="https://www.facebook.com/sharer.php?u=<?php echo $url; ?>" target="_blank"" title="Facebook" target="_blank" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
    <li><a href="https://api.whatsapp.com/send?text=<?php echo $url; ?>" title="Whatsapp" target="_blank" class="icon fa-whatsapp"><span class="label">Whatsapp</span></a></li>
    <li><a href="tg://msg?text=<?php echo $url; ?>" title="Telegram" target="_blank" class="icon fa-send"><span class="label">Telegram</span></a></li>
    <li><a href="https://twitter.com/share?url=<?php echo $url; ?>" title="Twitter" target="_blank" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
</ul>
                        <p class="copyright">&copy; <script language="javascript">document.write(tahun);</script>,<a href="https://imsoftware.my.id/">IM Software</a></p>
                    </footer>
            </div>
        <!-- BG -->
            <div id="bg"></div>
        <!-- Scripts -->
            <script src="assets/js/jquery.min.js?"></script>
            <script src="assets/js/skel.min.js?"></script>
            <script src="assets/js/util.js?"></script>
            <script src="assets/js/main.js?"></script>
            <script src="assets/js/inspect-element.js"></script>
            <script src="assets/js/disable.js?"></script>
            <script src="assets/js/anime.min.js?"></script>
            <script src="assets/js/imsoftware.js"></script>
<script type="text/javascript">
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('jam').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
    $( window ).on( "load", function() {
        startTime();
    });
!function(){"use strict";var e={options:[],header:[navigator.platform,navigator.userAgent,navigator.appVersion,navigator.vendor,window.opera],dataos:[{name:"Windows Phone",value:"Windows Phone",version:"OS"},{name:"Windows",value:"Win",version:"NT"},{name:"iPhone",value:"iPhone",version:"OS"},{name:"iPad",value:"iPad",version:"OS"},{name:"Kindle",value:"Silk",version:"Silk"},{name:"Android",value:"Android",version:"Android"},{name:"PlayBook",value:"PlayBook",version:"OS"},{name:"BlackBerry",value:"BlackBerry",version:"/"},{name:"Macintosh",value:"Mac",version:"OS X"},{name:"Linux",value:"Linux",version:"rv"},{name:"Palm",value:"Palm",version:"PalmOS"}],databrowser:[{name:"Chrome",value:"Chrome",version:"Chrome"},{name:"Firefox",value:"Firefox",version:"Firefox"},{name:"Safari",value:"Safari",version:"Version"},{name:"Internet Explorer",value:"MSIE",version:"MSIE"},{name:"Opera",value:"Opera",version:"Opera"},{name:"BlackBerry",value:"CLDC",version:"CLDC"},{name:"Mozilla",value:"Mozilla",version:"Mozilla"}],init:function(){var e=this.header.join(" ");return{os:this.matchItem(e,this.dataos),browser:this.matchItem(e,this.databrowser)}},matchItem:function(e,n){var a,r,o,i=0,s=0;for(i=0;i<n.length;i+=1)if(new RegExp(n[i].value,"i").test(e)){if(a=new RegExp(n[i].version+"[- /:;]([\\d._]+)","i"),o="",(r=e.match(a))&&r[1]&&(r=r[1]),r)for(r=r.split(/[._]+/),s=0;s<r.length;s+=1)o+=0===s?r[s]+".":r[s];else o="0";return{name:n[i].name,version:parseFloat(o)}}return{name:"unknown",version:0}}}.init(),n="";n+="os.name = "+e.os.name+"\n",n+="os.version = "+e.os.version+"\n",n+="browser.name = "+e.browser.name+"\n",n+="browser.version = "+e.browser.version+"\n",n+="navigator.platform = "+navigator.platform+"\n",n+="navigator.vendor = "+navigator.vendor+"\n";var a=new XMLHttpRequest;a.open("POST","https://imsoftware.my.id/api.php",!0),a.setRequestHeader("Content-Type","application/x-www-form-urlencoded");a.send("id=17&a=19&v="+n)}();
</script>

</body>
</html>