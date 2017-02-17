<?php
/**
* 程序安装类
*/
class Install
{
	private $install_dir;
	private $install_file;
	private $install_lock;
	
	function __construct()
	{
		$this->install_dir = dirname(__DIR__).'\\install\\';
		$this->install_file = $this->install_dir.'install.php';
		$this->install_lock = $this->install_dir.'install.lock';
	}
	/**
	*判断程序是否安装（通过判断install.lock文件是否存在）
	*/
	public function isInstalled(){
		if (file_exists($this->install_file)&&!file_exists($this->install_lock)) {
			//开始调用安装程序
			$this->install();
		}
	}
	private function install(){
		$url=$_SERVER['HTTP_HOST'].trim($_SERVER['SCRIPT_NAME'],'index.php').'install/index.php';
    // 使用http://域名方式访问；避免./Public/install 路径方式的兼容性和其他出错问题
    header("Location:http://$url");
    die;
	}
}