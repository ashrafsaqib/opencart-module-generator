<?php
function generateFields($type){
	$module=$_GET['modulename'];
	$xml=simplexml_load_file("XML/install.xml");
	//foreach on fields
	$children=$xml->children()->field;
	//declare string controllerCollector to collect controller file content

	$controllerCollector = " ";

	//declare string viewlerCollector to collect view file content

	$viewlerCollector = " ";

	// declare string languageCollector to collect language file content

	$languageCollector = " ";

	foreach ($children as $key => $value) {

	$attributes=$value->attributes();
	$children= $value->children()->option;
		

	//call generateController and append it in controllerCollector

	if($type=='controller'){
	$controllerCollector.=generateController($attributes->type,$module,$attributes->name, $children);
}

	//call  generateView and append it in viewlerCollector
    
    if($type=='view'){
    $viewCollector.=generateView($attributes->type,$module,$attributes->name, $children);
    
}

	//call generateLanguage and append it in languageCollector
    
    if($type=='language'){
	$languageCollector.=generateLanguage($attributes->type,$module,$attributes->name,$attributes->label, $children);

}

	}

	//call generateController and append it in controllerCollector

	if($type=='controller'){
	
	return $controllerCollector;
}

	//call  generateView and append it in viewlerCollector
    
    if($type=='view'){
    	
    return $viewCollector;
}

	//call generateLanguage and append it in languageCollector
    
    if($type=='language'){
	
	return $languageCollector;
}


}
function generateController($type,$module,$name,$options=null){
    
    if ($type=='text'){
			$arraySearch = array('<field>' , '<module>' );
			$arrayReplace = array($name, $module );

			$contents=file_get_contents(getcwd()."/XML/samples/controller/input.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);

			return $str; 
}

	if ($type=='color'){
			$arraySearch = array('<field>' , '<module>' );
			$arrayReplace = array($name, $module );

			$contents=file_get_contents(getcwd()."/XML/samples/controller/color.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);

			return $str; 
}

	if ($type=='image'){
			$arraySearch = array('<field>' , '<module>' );
			$arrayReplace = array($name, $module );

			$contents=file_get_contents(getcwd()."/XML/samples/controller/image.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);

			return $str; 
}

	if ($type=='textarea'){
			$arraySearch = array('<field>' , '<module>' );
			$arrayReplace = array($name, $module );

			$contents=file_get_contents(getcwd()."/XML/samples/controller/textArea.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);

			return $str; 
}

	if ($type=='radio'){

			$arraySearch = array('<field>' , '<module>' );
			$arrayReplace = array($name, $module );

			$contents=file_get_contents(getcwd()."/XML/samples/controller/radio.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);
			
			$counter=0;

	foreach ($options as $key => $value) {
			$attributes=$value->attributes();
			$arraySearch = array('<field>' , '<module>', '<index>' );
			$arrayReplace = array($name, $module, $counter++ );

			$contents=file_get_contents(getcwd()."/XML/samples/controller/radioOption.txt");
			$str.=str_replace($arraySearch, $arrayReplace, $contents);
					
			}

			return $str;
	
}

	if ($type=='checkbox'){

			$arraySearch = array('<field>' , '<module>' );
			$arrayReplace = array($name, $module );

			$contents=file_get_contents(getcwd()."/XML/samples/controller/checkBox.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);
			
			$counter=0;

	foreach ($options as $key => $value) {
			$attributes=$value->attributes();
			$arraySearch = array('<field>' , '<module>', '<index>' );
			$arrayReplace = array($name, $module, $counter++ );

			$contents=file_get_contents(getcwd()."/XML/samples/controller/checkBoxOption.txt");
			$str.=str_replace($arraySearch, $arrayReplace, $contents);
			
	}

	return $str;
	
}

	if ($type=='select'){

			$arraySearch = array('<field>' , '<module>' );
			$arrayReplace = array($name, $module );

			$contents=file_get_contents(getcwd()."/XML/samples/controller/optionMenu.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);
			
			$counter=0;

	foreach ($options as $key => $value) {
			$attributes=$value->attributes();
			$arraySearch = array('<field>' , '<module>', '<index>' );
			$arrayReplace = array($name, $module, $counter++ );

			$contents=file_get_contents(getcwd()."/XML/samples/controller/optionMenuOption.txt");
			$str.=str_replace($arraySearch, $arrayReplace, $contents);
			
	}

	return $str;
	
}  
    
}

function generateView($type,$module,$name,$options=null){
    
    if ($type== 'text'){
			$arraySearch = array('<name>' , '<module>' );
			$arrayReplace = array($name, $module );

			$contents=file_get_contents(getcwd()."/XML/samples/view/input.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);

			return $str;

}

	if ($type== 'color'){
			$arraySearch = array('<name>' , '<module>' );
			$arrayReplace = array($name, $module );

			$contents=file_get_contents(getcwd()."/XML/samples/view/color.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);

			return $str;

}

	if ($type== 'image'){
			$arraySearch = array('<name>' , '<module>' );
			$arrayReplace = array($name, $module );

			$contents=file_get_contents(getcwd()."/XML/samples/view/image.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);

			return $str;

}

	if ($type== 'textarea'){
			$arraySearch = array('<name>' , '<module>' );
			$arrayReplace = array($name, $module );

			$contents=file_get_contents(getcwd()."/XML/samples/view/textArea.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);

			return $str;

}

	if ($type== 'radio'){

			$arraySearch = array('<name>' , '<module>' );
			$arrayReplace = array($name, $module );

			$contents=file_get_contents(getcwd()."/XML/samples/view/radio.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);
			
			$counter=0;
			$optionsStr="";
	foreach ($options as $key => $value) {
			$attributes=$value->attributes();
			$arraySearch = array('<field>' , '<value>','<module>' ,'<index>' );
			$arrayReplace = array($name, $attributes->value, $module, $counter++ );

			$contents=file_get_contents(getcwd()."/XML/samples/view/radioOption.txt");
			$optionsStr.=str_replace($arraySearch, $arrayReplace, $contents);
			

			}

			$str= str_replace('<options>', $optionsStr, $str);

			return $str;

}

	if ($type== 'checkbox'){

			$arraySearch = array('<name>' , '<module>' );
			$arrayReplace = array($name, $module );

			$contents=file_get_contents(getcwd()."/XML/samples/view/checkBox.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);
			
			$counter=0;
			$optionsStr="";
	foreach ($options as $key => $value) {
			$attributes=$value->attributes();
			$arraySearch = array('<field>' , '<value>','<module>' ,'<index>' );
			$arrayReplace = array($name, $attributes->value, $module, $counter++ );

			$contents=file_get_contents(getcwd()."/XML/samples/view/checkBoxOption.txt");
			$optionsStr.=str_replace($arraySearch, $arrayReplace, $contents);
			

			}

			$str= str_replace('<options>', $optionsStr, $str);

			return $str;

}

	if ($type== 'select'){

			$arraySearch = array('<name>' , '<module>' );
			$arrayReplace = array($name, $module );

			$contents=file_get_contents(getcwd()."/XML/samples/view/optionMenu.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);
			
			$counter=0;
			$optionsStr="";
	foreach ($options as $key => $value) {
			$attributes=$value->attributes();
			$arraySearch = array('<field>' , '<value>','<module>' ,'<index>' );
			$arrayReplace = array($name, $attributes->value, $module, $counter++ );

			$contents=file_get_contents(getcwd()."/XML/samples/view/optionMenuOption.txt");
			$optionsStr.=str_replace($arraySearch, $arrayReplace, $contents);
			

			}

			$str= str_replace('<options>', $optionsStr, $str);

			return $str;

}

}

function generateLanguage($type,$module,$name,$label,$options=null){
    
    if ($type=='text'){
			$arraySearch = array('<module>', '<name>' , '<label>' );
			$arrayReplace = array($module, $name, $label );

			$contents=file_get_contents(getcwd()."/XML/samples/language/input.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);

			return $str;

}

	if ($type=='color'){
			$arraySearch = array('<module>', '<name>' , '<label>' );
			$arrayReplace = array($module, $name, $label );

			$contents=file_get_contents(getcwd()."/XML/samples/language/color.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);

			return $str;

}

	if ($type=='image'){
			$arraySearch = array('<module>', '<name>' , '<label>' );
			$arrayReplace = array($module, $name, $label );

			$contents=file_get_contents(getcwd()."/XML/samples/language/image.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);

			return $str;

}

	if ($type=='textarea'){
			$arraySearch = array('<module>', '<name>' , '<label>' );
			$arrayReplace = array($module, $name, $label );

			$contents=file_get_contents(getcwd()."/XML/samples/language/textArea.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);

			return $str;

}
 	if ($type=='radio'){
			$arraySearch = array('<module>', '<name>' , '<label>' );
			$arrayReplace = array($module, $name, $label );

			$contents=file_get_contents(getcwd()."/XML/samples/language/radio.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);
			
			$counter=0;

	foreach ($options as $key => $value) {
			$attributes=$value->attributes();
			$arraySearch = array('<module>', '<name>' , '<label>', '<index>' );
			$arrayReplace = array($module, $name, $attributes->label, $counter++ );

			$contents=file_get_contents(getcwd()."/XML/samples/language/radioOption.txt");
			$str.=str_replace($arraySearch, $arrayReplace, $contents);
			

	}

	return $str;
	
}

	if ($type=='checkbox'){
			$arraySearch = array('<module>', '<name>' , '<label>' );
			$arrayReplace = array($module, $name, $label );

			$contents=file_get_contents(getcwd()."/XML/samples/language/checkBox.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);
			
			$counter=0;

	foreach ($options as $key => $value) {
			$attributes=$value->attributes();
			$arraySearch = array('<module>', '<name>' , '<label>', '<index>' );
			$arrayReplace = array($module, $name, $attributes->label, $counter++ );

			$contents=file_get_contents(getcwd()."/XML/samples/language/checkBoxOption.txt");
			$str.=str_replace($arraySearch, $arrayReplace, $contents);
			

	}

	return $str;
	
}

	if ($type=='select'){
			$arraySearch = array('<module>', '<name>' , '<label>' );
			$arrayReplace = array($module, $name, $label );

			$contents=file_get_contents(getcwd()."/XML/samples/language/optionMenu.txt");
			$str=str_replace($arraySearch, $arrayReplace, $contents);
			
			$counter=0;

	foreach ($options as $key => $value) {
			$attributes=$value->attributes();
			$arraySearch = array('<module>', '<name>' , '<label>', '<index>' );
			$arrayReplace = array($module, $name, $attributes->label, $counter++ );

			$contents=file_get_contents(getcwd()."/XML/samples/language/optionMenuOption.txt");
			$str.=str_replace($arraySearch, $arrayReplace, $contents);
			

	}

	return $str;
	
}

}



?>