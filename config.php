<?php

function incluirClasses($nomeClasse){
	if(file_exists("classes".DIRECTORY_SEPARATOR.$nomeClasse.".php")){
		require_once("classes".DIRECTORY_SEPARATOR.$nomeClasse.".php");
	}
}

spl_autoload_register("incluirClasses");

?>