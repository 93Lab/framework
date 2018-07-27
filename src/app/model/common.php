<?php

namespace src\app\model;
use src\main\model AS Core;

class Common extends Core {

  function auth($username, $password) {
  	$data = $this->get("SELECT * FROM users WHERE username = ?", [$username]);
    if(sizeof($data) == 1) {
      $salt = $data[0]['salt'];
			$db_password = $data[0]['password'];
      $combine = sha1($username.$salt.$password);
      if($db_password == $combine) {
        $_SESSION[APP."_login"] = 1;
        $_SESSION[APP."_user"] = $data[0]['id'];
        $_SESSION[APP."_name"] = $data[0]['name'];
        $_SESSION[APP."_role"] = $data[0]['role'];
        header("Location: ".HOME.""); exit();
      } else {
        header("Location: ".HOME."account/login?message=".urlencode("Invalid Password. Try Again!")); exit();
      }
    } else {
      header("Location: ".HOME."account/login?message=".urlencode("Invalid Account!")); exit();
    }
  }

  function pagination($link, $table, $page, $limit = 30) {
		// Pagination
    $pagination = array();
    $SQL = "SELECT COUNT(*) AS counted FROM ".$table;
    $data = $this->get($SQL);
    $records = $data[0]['counted'];
    $pages = ceil($records / $limit);
    $pagination['pages'] = $pages;
    $pagination['records'] = $records;

		$previous = $page - 1;
		$next = $page + 1;
		if($pagination['pages'] == $page) {
			if($pagination['records'] <= $limit) {
				$html = '<div class="pagination clearfix"><div class="pgn pull-right"><div class="pgn-block">Total Pages: '.$pagination['pages'].'</div></div></div>';
			} else {
				$html = '<div class="pagination clearfix"><div class="pgn pull-right"><div class="pgn-block">Total Pages: '.$pagination['pages'].'</div> <div class="pgn-block">Go To: <select id="goto" data-link="'.HOME.$link.'/">';
				for ($x = 1; $x <= $pagination['pages']; $x++) {
					 if($page == $x) {
						 $html .= '<option value="'.$x.'" selected>'.$x.'</option>';
					 } else {
						 $html .= '<option value="'.$x.'">'.$x.'</option>';
					 }
				}
				$html .= '<select></div> <a class="pgn-block pgn-btn" href="'.HOME.$link.'/'.$previous.'">< Previous</a></div></div>';
			}
		}

		elseif($pagination['pages'] == 0) {
				$html = '<div class="pagination clearfix"><div class="pgn pull-right"><div class="pgn-block">Total Pages: '.$pagination['pages'].'</div></div></div>';
		}

		elseif ($previous == 0) {
			$html = '<div class="pagination clearfix"><div class="pgn pull-right"> <div class="pgn-block">Total Pages: '.$pagination['pages'].'</div> <div class="pgn-block">Go To: <select id="goto" data-link="'.HOME.$link.'/">';
			for ($x = 1; $x <= $pagination['pages']; $x++) {
				 if($page == $x) {
					 $html .= '<option value="'.$x.'" selected>'.$x.'</option>';
				 } else {
					 $html .= '<option value="'.$x.'">'.$x.'</option>';
				 }
			}
			$html .= '<select></div> <a class="pgn-block pgn-btn" href="'.HOME.$link.'/'.$next.'">Next ></a>
			</div></div>';
		}

		else {
			$html = '<div class="pagination clearfix"><div class="pgn pull-right"><div class="pgn-block">Total Pages: '.$pagination['pages'].'</div> <div class="pgn-block">Go To: <select id="goto" data-link="'.HOME.$link.'/">';
			for ($x = 1; $x <= $pagination['pages']; $x++) {
				 if($page == $x) {
					 $html .= '<option value="'.$x.'" selected>'.$x.'</option>';
				 } else {
					 $html .= '<option value="'.$x.'">'.$x.'</option>';
				 }
			}
			$html .= '<select></div> <a class="pgn-block pgn-btn" href="'.HOME.$link.'/'.$previous.'">< Previous</a> <a class="pgn-block pgn-btn" href="'.HOME.$link.'/'.$next.'">Next ></a></div></div>';
		}

		return $html;
	}

}
