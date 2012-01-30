<?

	/*
	 * var id = $('#id').val();
	var password = $('#password').val(); 
	var passwordCheck = $('#passwordCheck').val();
	var socialNumber = $('#socialNumber').val();
	var name = $('#name').val();
	var telNumber = $('#telNumber').val();
	var emailId = $('#emailId').val();
	var emailDomain = $('#emailDomain').val();
	 */
	class Member{
		var $password;
		//var $passwordCheck;
		var $socialNumber;
		var $name;
		var $telNumber;
		var $emailId;
		var $emailDomain;
		
	}
	
	class Board{
		var $seq;
		var $categoryId;
		var $writerId;
		var $title;
		var $content;
		var $regDate;
		var $visitCount;	
	}
	
	function setMember($row){
		$member = new Member;
		$member->id = $row["id"];
		$member->password = $row["password"];
		$member->socialNumber = $row["social_number"];
		$member->name = $row["name"];
		$member->telNumber = $row["tel_number"];
		$member->emailId = $row["email_id"];
		$member->emailDomain = $row["email_domain"];
		return $member;
	}
	
	function setBoard($row){
		$board = new Board;
		$board->seq = $row["seq"];
		$board->categoryId = $row["category_id"];
		$board->writerId = $row["writer_id"];
		$board->title = $row["title"];
		$board->content = $row["content"];
		$board->regDate = $row["reg_date"];
		$board->visitCount = $row["visit_count"];
		return $board;
	}
	
	
?>