<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\News;
use App\NewsCategory;
use App\User;
use App\Video;
use App\VideoAlbum;
use App\Photo;
use App\PhotoAlbum;
use App\Slider;
use App\SliderAlbum;

class DashboardController extends AdminController {

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $title = "Dashboard";

        $news = News::count();
        $newscategory = NewsCategory::count();
        $users = User::count();
        $photo = Photo::count();
        $photoalbum = PhotoAlbum::count();
        $video = Video::count();
        $videoalbum = VideoAlbum::count();
		return view('admin.dashboard.index',  compact('title','news','newscategory','video','videoalbum','photo',
            'photoalbum','users'));
	}
}