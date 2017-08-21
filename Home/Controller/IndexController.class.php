<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	function _initialize()
	{
		///$this->display('./header');
		//global
		//var_dump($_SESSION['UserInfo']);
		//echo '<br>'.$_SESSION['UserLoged'];
	}
    public function index(){
    	$this->TheTel=$Tel=@$_POST['Tel']?$_POST['Tel']:'';
    	$PreviousTel=@$_POST['PreviousTel']?$_POST['PreviousTel']:'';
    	if($Tel){
	    	if(!M('application')->where(array('Tel'=>$Tel))->find()){
	    		if(strlen($Tel)>10){
	    			$PreviousUserInfo=M('user')->where(array('email'=>$PreviousTel))->find();
    				if($PreviousUserInfo || $PreviousTel==""){
    					if(M('application')->data(array('Tel'=>$Tel,'PreviousTel'=>$PreviousTel,'CreateTime'=>time()))->add()){
		    				$sended=1;
		    				if($PreviousUser=M('user')->where(array('email'=>$PreviousTel))->find()){
		    					M('user')->where(array('email'=>$PreviousTel))->save(array('Invite'=>$PreviousUser['invite']+1));
		    				}
		    				//print_r($PreviousUserInfo);
		    			}
			    		else{
			    			$sended=2;
			    			$this->Info=$info="攻城獅正在捕食程序猿！系統稍後開放！<br/>幫助郵箱:<a href='mailto:help@ineedvpn.net'><b>help@ineedvpn.net</b></a>";
			    		}
    				}
    				else
    				{
    					$sended=2;
	    				$this->Info=$info="填的很正確，然而並沒有這個推薦人！<br/>幫助郵箱:<a href='mailto:help@ineedvpn.net'><b>help@ineedvpn.net</b></a>";
    				}
	    		}
	    		else{
		    		$sended=2;
		    		$this->Info=$info="團隊目前只接受中國大陸手機號註冊！<br/>幫助郵箱:<a href='mailto:help@ineedvpn.net'><b>help@ineedvpn.net</b></a>";
	    		}
	    	}
	    	else{
	    		$sended=2;
	    		$this->Info=$info="帥的人已使用該手機號！<br/>幫助郵箱:<a href='mailto:help@ineedvpn.net'><b>help@ineedvpn.net</b></a>";
	    	}
    	}
    	$this->sended=$sended;
		$this->display('./send');
	}
}