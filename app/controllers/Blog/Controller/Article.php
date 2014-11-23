<?php
// app/controllers/Article.php
namespace Blog\Controller;
use View; 
use BaseController;

class Article extends BaseController
{
	/*
	public function showIndex()
	{
		return View::make('index');
	}
	*/

	public function getIndex()
	{
		return View::make('index');
	}
	
	public function postIndex()
	{
		return View::make('index');
	}
}