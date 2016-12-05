<?php

function criaBanco(){
	$comando_sql = 'CREATE DATABASE if NOT EXISTS '.DBNAME.';';
	mysql_query($comando_sql) or die(mysql_error());
}

function selectBanco(){
	criaBanco();
	mysql_select_db(DBNAME);
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
}

function conectaBanco(){
	date_default_timezone_set("UTC");
	mysql_connect(DBHOST, DBUSER, DBPASS) or die(mysql_error());
	selectBanco();
}

function criaTabela($nome,$chave){
	selectBanco();
	$comando_sql = "CREATE TABLE if NOT EXISTS ".$nome."(`".$chave."` INT(2) NOT NULL AUTO_INCREMENT,PRIMARY KEY (`".$chave."`)) ENGINE=INNODB DEFAULT CHARSET=latin1;";
	mysql_query($comando_sql) or die(mysql_error());
}

function insereColuna($table,$nome,$valor){
	selectBanco();
	$comando_sql = "ALTER TABLE `".$table."` ADD `".$nome."` ".$valor." NOT NULL ;";
	mysql_query($comando_sql) or die(mysql_error());
}

function inserir($table,$campos,$valores){
	selectBanco();
    $comando_sql = "INSERT INTO ".$table."(".$campos.") VALUES (".$valores.")";
    $result = mysql_query($comando_sql) or die(mysql_error());
}

function alterar($table,$altera,$nome){
	selectBanco();
    $comando_sql = "UPDATE ".$table." SET ".$altera." WHERE ".$nome;
    $result = mysql_query($comando_sql) or die(mysql_error());
}

function deletar($table,$campo,$valor){
	selectBanco();
    $comando_sql = "DELETE FROM ".$table." WHERE ".$campo."='".$valor."'";
    $result = mysql_query($comando_sql) or die(mysql_error());
}

function recupera($table,$valor,$retorno){
	selectBanco();
    $result = mysql_query("SELECT * FROM ".$table." Where ".$valor) or die(mysql_error());
	if(mysql_num_rows($result) > 0){
		$linha = mysql_fetch_assoc($result);
		return $linha[$retorno];
	}
	else{
		return NULL;
	}
}

function manifest($manifest){
	if(!empty($manifest)):
		echo ' manifest="'.URL.'system/manifest/manifest__dll.php?screen='.$_SESSION['screen'].'&zone='.$_GET['zone'].'&lang='.$_GET['lang'].'&page='.$_GET['page'].'"';
	endif;
}

?>