<?php

class user{


	private $userID, $userName, $userEmail, $userPass;

    public function getUserID(){
    	return $this->userID;
    }
    public function setUserID($userID){
    	 $this->userID=$userID;
    }
        public function getUserName(){
    	return $this->userName;
    }
    public function setUserName($userName){
    	 $this->userName=$userName;
    }
        public function getUserEmail(){
    	return $this->userEmail;
    }
    public function setUserEmail($userEmail){
    	 $this->userEmail=$userEmail;
    }
        public function getUserPass(){
    	return $this->userPass;
    }
    public function setUserPass($userPass){
    	 $this->userPass=$userPass;
    }
    public function insertUser(){
    	include "conn.php";
    	$req=$bdd->prepare("INSERT INTO users(userName, userEmail, userPass) VALUES(:userName,:userEmail,:userPass)");
        $req->execute(array(
        	'userName'=>$this->getUserName(), 
        	'userEmail'=>$this->getUserEmail(), 
        	'userPass'=>$this->getUserPass()

        ));

    }
    public function Userlogin(){
    	include "conn.php";
    	$req=$bdd->prepare("SELECT * FROM users WHERE userEmail=:userEmail AND userPass=:userPass");
        $req->execute(array(
        	'userEmail'=>$this->getUserEmail(), 
        	'userPass'=>$this->getUserPass()
    
        ));
    
         if($req->rowCount()==0){
         header("Location:index.php?error=1");
         return false;
    }
else{
	while($data=$req->fetch()){
		$this->setUserID($data['userID']);
		$this->setUserName($data['userName']);
		$this->setUserEmail($data['userEmail']);
		$this->setUserPass($data['userPass']);
		header("Location:home.php");

    return true;

	}
}


}
}
class chat{
private $chatID, $chatUserID, $chatText;

    public function getchatID(){
    	return $this->chatID;
    }
    public function setchatID($chatID){
    	 $this->chatID=$chatID;
    }
        public function getchatUserID(){
    	return $this->chatUserID;
    }
    public function setchatUserID($chatUserID){
    	 $this->chatUserID=$chatUserID;
    }
        public function getchatText(){
    	return $this->chatText;
    }
    public function setchatText($chatText){
    	 $this->chatText=$chatText;
    }
        
    public function insertMessage(){
    	include "conn.php";
    	$req=$bdd->prepare("INSERT INTO chats(chatUserID, chatText) VALUES(:chatUserID,:chatText)");
        $req->execute(array(
        	'chatUserID'=>$this->getchatUserID(), 
        	'chatText'=>$this->getchatText()

        ));
    }
         public function displayMessage(){
    	include "conn.php";
    	$Chatreq=$bdd->prepare("SELECT * FROM chats ORDER BY chatID");
        $Chatreq->execute();

while($dataChat=$Chatreq->fetch()){
    	$userReq=$bdd->prepare("SELECT * FROM users WHERE userID=:userID");
        $userReq->execute(array(
        	'userID'=>$dataChat['chatUserID']
        ));
        $dataUser = $userReq->fetch();
        ?>
        <span class="userNames" style="color: aqua;"><?php echo $dataUser['userName']; ?></span><strong style="color: teal;"> :</strong><br>
        <span class="UserMessages" style="color: teal; background-color: #f1f1f1; border-radius: 5px; padding: 1.5px; margin: 10px; border: 2px solid #dedede;"><?php echo htmlspecialchars($dataChat["chatText"]); ?></span><br><br>
        <?php



        	}
        }
  	}
	?>