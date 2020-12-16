<?php //HEADERS
header("Content-Type: text/html; charset=utf-8");
header('Cache-Control: no-store, no-cache');
header('Expires: '.date('r'));
?>
<?php //DEFINE
define('TITLE', 'Менеджер документов');
define('AUTHOR', 'Антонов Кирилл');
define('APP_NAME', 'siteManager');
define('APP_VERSION', 'v16-12-20');
define('SUPPORT','+7(996)-795-85-13');
define('EMAIL','work.kaa98@yandex.ru');
define('FILE','storage.json');
?>
<?php //FUNCTIONS
function DrawCard(string $card, string $url, string $propety){
    echo 
    '<div class="property-card">
        <a href="'.$url.'" title="'.$url.'">
            <div class="property-image">
                <div class="property-image-title">
                    <h5>'.$card.'</h5>
                    <p class="word">'.$propety.'</p>
                </div>
            </div>
        </a>
        <div class="property-description">
            <h5>'.$card.'</h5>
        </div>
    </div>';    
}
function Logger(string $arg){
    echo '<script>console.log("'.$arg.'")</script>';
}
function Get(string $file){
    $json_file =file_get_contents($file);
    $json = json_decode($json_file, true);
    foreach ($json as $v) {
        DrawCard($v['name'],$v['url'],$v['prop']);
        Logger('Name: '.$v['name'].'\nUrl: '.$v['url'].'\nProperty: '.$v['prop']);
    }
}
function AddNew(string $file, string $json){
    file_put_contents($file,json_encode($json));
}
?>
<style>
    body{background-color:#f2f2f2;font-family:'RobotoDraft','Roboto',sans-serif;-webkit-font-smoothing:antialiased}*{-webkit-box-sizing:border-box;box-sizing:border-box}h5{margin:0;font-size:1.4em;font-weight:700}.center{height:100vh;width:100%;display:flex;justify-content:center;align-items:center;flex-wrap:wrap}.property-card{margin:10px;height:18em;width:14em;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;position:relative;-webkit-transition:all .4s cubic-bezier(0.645,0.045,0.355,1);-o-transition:all .4s cubic-bezier(0.645,0.045,0.355,1);transition:all .4s cubic-bezier(0.645,0.045,0.355,1);border-radius:16px;overflow:hidden;-webkit-box-shadow:15px 15px 27px #e1e1e3,-15px -15px 27px #fff;box-shadow:15px 15px 27px #e1e1e3,-15px -15px 27px #fff}.property-image{height:6em;width:14em;padding:1em 2em;position:Absolute;-webkit-transition:all .4s cubic-bezier(0.645,0.045,0.355,1);-o-transition:all .4s cubic-bezier(0.645,0.045,0.355,1);transition:all .4s cubic-bezier(0.645,0.045,0.355,1);background-color:#DC143C}.property-description{background-color:#FAFAFC;height:12em;width:14em;position:absolute;bottom:0;-webkit-transition:all .4s cubic-bezier(0.645,0.045,0.355,1);-o-transition:all .4s cubic-bezier(0.645,0.045,0.355,1);transition:all .4s cubic-bezier(0.645,0.045,0.355,1);padding:.5em 1em;text-align:center}.property-card:hover .property-description{height:0;padding:0 1em}.property-card:hover .property-image{height:18em}.property-image-title{text-align:center;position:Relative;top:30%;opacity:0;transition:all .4s cubic-bezier(0.645,0.045,0.355,1) .2s;color:#fff;font-size:1.2em}.property-card:hover .property-image-title{opacity:1}.word{word-break:break-all;font-size:12px}
</style>
<html>
<head>
<title><?php echo TITLE;?></title>
</head>
<body>
    <div class="center">
        <?php
        Logger('AUTHOR: '.AUTHOR.'\nAPP_NAME: '.APP_NAME.'\nAPP_VERSION: '.APP_VERSION.'\nSUPPORT: '.SUPPORT.'\nE-MAIL: '.EMAIL);
		Get(FILE);
        
        /*if(isset($_POST['Add'])){
			AddNew(FILE,JSON);
		}*/
		?>
		<!-- <form action="" method="POST"><input type="submit" name="Add" value="Add"></form> -->
    </div>
</body>
</html>
<script>
</script>