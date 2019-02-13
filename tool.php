<?php

include(getcwd().'/XML/tool.php');
function generateFiles($source,$path,$extension){

	//read sample controller file
	$contents = file_get_contents('./'.$source);


	//replace the sample controller file
	$str = str_replace("<modulename>",$_GET['modulename'],$contents);

	//write a new file 	 
	$target = (getcwd()."/".$_GET['modulename'].$path.$_GET['modulename'].$extension);

	//create directory	
	mkdir(getcwd()."/".$_GET['modulename'].$path , 0777, true);

	// Write the contents back to the file
	file_put_contents($target, $str); 

return $target;
}
function appendFields($target,$str){

	// echo $str;
	//read sample controller file
	$contents = file_get_contents($target);


	//replace the sample controller file
	$str = str_replace("<content>",$str,$contents);


	// Write the contents back to the file
	file_put_contents($target, $str); 
}
$file=generateFiles('adminController.txt',"/upload/admin/controller/extension/module/",".php");
$str=generateFields('controller');
appendFields($file,$str);
$file=generateFiles('adminLanguage.txt',"/upload/admin/language/en-gb/extension/module/",".php");
$str=generateFields('language');
appendFields($file,$str);
$file=generateFiles('adminView.txt',"/upload/admin/view/template/extension/module/",".twig");
$str=generateFields('view');
appendFields($file,$str);
exit;
generateFiles('catalogController.txt',"/upload/catalog/controller/extension/module/",".php");

generateFiles('catalogLanguage.txt',"/upload/catalog/language/en-gb/extension/module/",".php");

generateFiles('catalogView.txt',"/upload/catalog/view/theme/default/template/extension/module/",".twig");



?>