<?php

class Home
{
	function __construct()
	{
		session_start();
	}
	
	function admin()
    {
        if (!$_SESSION["login"] == "admin") {
            header("location:");
        }

        include "view/layouts/header.php";
        include "view/home/data.php";
        include "view/layouts/footer.php";
    }

	function login_post()
	{
		$nama = $_POST['nama'];
		$email = $_POST['email'];

		if ($nama == "Bagus Panji" || $email == "pitungs060@gmail.com") {
			$_SESSION["login"] = "admin";
		}
		header("location:admin");
	}

	function login()
	{
		include "view/layouts/header.php";
		include "view/admin/login.php";
		include "view/layouts/footer.php";
	}

	function index()
	{
		include "view/layouts/header.php";
		include "view/home/view.php";
		include "view/layouts/footer.php";
	}

	function __destruct()
	{
	}
}
