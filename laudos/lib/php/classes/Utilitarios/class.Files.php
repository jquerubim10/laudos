<?
/**
 * @package Utilitários
 * Conjunto de métodos php que manupulam informações de arquivos no lado do servidor.
 */
class Files{
    /**
     * Monta um array com a estrutura de arquivos encontrada de acordo com a pasta especificada
	 *
	 * @param string $path_base caminho base
	 * @return array
     */
	function getArrayFromPath($path_base){
		$files = array();
		//Util::prt("", scandir($path_base));
		$path = scandir($path_base);
		foreach($path as $name){
			if ($name != "." && $name != ".."){
				if (is_dir($path_base."/".$name)){
					$files[] = array($name => Files::getArrayFromPath($path_base."/".$name));
				} else {
					$files[] = $name;
				}
			}
		}
		return $files;
	}
	
    /**
     * carrega todos os arquivos dos diretórios especificados no array estrutura
	 *
	 * @param string $path_base caminho inicial
	 * @param array $estrutura estrutura de diretórios e arquivos
     */
	function includeFiles($path_base, $estrutura){
		//Util::prt("estrutura", $estrutura);
		foreach($estrutura as $name => $content){
			//Util::prt($name, $content);
			if (is_array($content)){
				Files::includeFiles($path_base.(is_int($name) ? "":"/".$name), $content);
			} else {
				require_once($path_base."/".$content);
			}
		}
	}
}
?>
