<?php

class CommentsController extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->model = new CommentModel();
	}

	function index()
	{
		if (!empty($_POST['save']))
			$this->model->editComment( $_POST['commentId'], $_SESSION['USER_ID'], $_POST['created'], $_POST['comment']);
		unset($_SESSION['COMMENTS_EDIT']);
		exit(header('location: '.$_SERVER['HTTP_REFERER']));
	}

	function edit()
	{
		if (!empty($this->params['id']))
			$_SESSION['COMMENTS_EDIT'] = $this->params['id'];
		exit(header('Location: '.$_SERVER['HTTP_REFERER']));
	}

	function delete()
	{
		if (!empty($this->params['id']))
			$this->model->deleteComment( $this->params['id'], $_SESSION['USER_ID']);
		exit(header('location: '.$_SERVER['HTTP_REFERER']));
	}
}
?>