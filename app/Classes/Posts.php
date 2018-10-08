<?php

namespace App\Classes;

use Illuminate\Http\Request;


use Auth;
use App\Models\MPost;
use App\Models\MPostCategory;

use App\Classes\StringClass;
use App\Classes\Posts;
use App\Classes\PostCategory;

use DB;
use Carbon;

class Posts {

	public function getId($post_alias) {
		return MPost::where('post_alias', $post_alias)->get();
	}

	public function getById($post_id) {
		return MPost::where('post_id', $post_id)->get();
	}

	public function getByAlias($post_alias) {
		return MPost::where('post_alias', $post_alias)->get();
	}

	public function getAll($params) {
		$res = MPost::where('post_status', 1);
		if(isset($params['limit'])) {
		    $res->limit($params['limit']);
		}
		if(isset($params['category'])) {
			if(is_array($params['category'])) {
		    $res->whereIn('post_category', $params['category']);
			} else {
				$res->where('post_category', $params['category']);
			}
		}
		if(isset($params['query'])) {
		    $res->where('post_title', 'LIKE', '%'.$params['query'].'%')->orWhere('post_text', 'LIKE', '%'.$params['query'].'%');
		}
		if(isset($params['lastday'])) {
				$date = \Carbon\Carbon::today()->subDays($params['lastday']);
				$res->where('created_at', '>=', $date);
		}
		if(isset($params['month'])) {
				$res->whereMonth('created_at', $params['month']);
		}
		if(isset($params['year'])) {
				$res->whereYear('created_at', $params['year']);
		}
		if(isset($params['sortby'])) {
			if($params['sortby'] == "hits") {
	    	$res->orderBy('post_hits', 'DESC');
			} elseif($params['sortby'] == "rand") {
	    	$res->inRandomOrder();
			} else {
	    	$res->orderBy('post_id', 'DESC');
			}
		} else {
    	$res->orderBy('id', 'DESC');
		}

		// return
		if(isset($params['paginate'])) {
	    	return $res->paginate($params['paginate']);
		} else {
	    	return $res->get();
		}
	}

	public function getAlias($post_id) {
		return MPost::where('post_id', $post_id)->get()->post_alias;
	}

	public function addHits($id) {
		return MPost::whereId($id)->increment('post_hits');
	}

	public function InsertPost(Request $request)
	{
		$alertimg	= $request->validate([
			'post_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);


		$strings                = new StringClass();
        $title_post             = $strings->str2alias($request->post_title);

        $now = \Carbon\Carbon::now();
		$year = date('Y', strtotime($now));
		$month = date('m', strtotime($now));
        $days = date('d', strtotime($now));

        $bs                     = $request->file('post_img')->getClientOriginalExtension();
        $nombreCarpeta = preg_replace('/\s+/', '.', $year . "/" . $month . "/" . $days);
        $fileimg                = $title_post . '.' .$bs;
        $post_imgs               = 'image/posts/'.$nombreCarpeta .'/' .$fileimg;
        $path = base_path() .'/public/image/posts/'.$nombreCarpeta;

        $s = new MPost;
        $s->post_title 			= $request->post_title;
        $s->post_alias 			= $title_post;
		if($request->post_lead_in === NULL){
			$s->post_lead_in        = 'NULL';
		}else{
			$s->post_lead_in        = $request->post_lead_in;
		}
        $s->post_type           = $request->post_type;
        $s->post_category       = $request->post_category;
        $s->post_img            = $post_imgs;
        $s->post_img_caption    = $request->post_img_caption;
        $s->post_text           = $request->post_text;
        $s->post_file           = 0;
        $s->post_status         = 1;
        $s->post_author         = $request->id_user;
        $s->post_hits           = 0;
        $s->post_tags           = $request->post_tags;
        $s->post_lang           = 'id';
        $s->brand_related       = 0;
        $s->start_publishing    = $request->start_publishing;
		if($request->finish_publishing === NULL){
			$s->finish_publishing   = '0000-00-00 00:00:00';
		}else{
			$s->finish_publishing   = $request->finish_publishing;
		}
        $s->post_last_modified   = $request->start_publishing;
        $s->post_date_added   	= $now;
        $s->comment_status      = 1;
        $s->save();
        $imageName = $strings->str2alias($s->post_title);
        $nmImg      = strtolower($imageName) . '.' .
        $request->file('post_img')->getClientOriginalExtension();



        $request->file('post_img')->move($path, $nmImg);
		return $s;
	}
	public function UpdatePost(Request $request, $id)
	{
		$strings                = new StringClass();
        $title_post             = $strings->str2alias($request->post_title);

        $post_title             = strtolower($title_post);

        if($request->hasFile('post_img')) {
        $strings                = new StringClass();
        $title_post             = $strings->str2alias($request->post_title);

        $post_title             = strtolower($title_post);


        $now = \Carbon\Carbon::now();
		$year = date('Y', strtotime($now));
		$month = date('m', strtotime($now));
        $days = date('d', strtotime($now));

        $bs                     = $request->file('post_img')->getClientOriginalExtension();
        $nombreCarpeta          = preg_replace('/\s+/', '.', $year . "/" . $month . "/" . $days);
        $fileimg                = $post_title . '.' .$bs;
        $post_img               = 'img/posts/'.$nombreCarpeta .'/' .$fileimg;
        $path = base_path() .'/public/img/posts/'.$nombreCarpeta;
        }else{
            $post_img               = $request->post_img;
        }
        $post                       = MPost::find($id);

        $post->post_title           = $request->post_title;
        $post->post_alias 		    = $post_title;
        $post->post_lead_in         = $request->post_lead_in;
        $post->post_type            = $request->post_type;
        $post->post_category        = $request->post_category;
        $post->post_img             = $post_img;
        $post->post_img_caption     = $request->post_img_caption;
        $post->post_text            = $request->post_text;
        $post->post_file            = 0;
        $post->post_status          = 1;
        $post->post_author          = $request->post_author;
        $post->post_hits            = $request->post_hits;
        $post->post_tags            = $request->post_tags;
        $post->post_lang            = 'id';
        $post->brand_related        = $request->brand_related;
        $post->start_publishing     = $request->start_publishing;
        $post->finish_publishing    = $request->finish_publishing;
        $post->comment_status       = 1;


        if($request->hasFile('post_img')) {
            $imageName = $strings->str2alias($post->post_title);
            $nmImg      = strtolower($imageName) . '.' .
            $request->file('post_img')->getClientOriginalExtension();
            $request->file('post_img')->move($path, $nmImg);
        }
        $post->save();
		return $post;
	}
	public function DeletePosts(Request $request, $post_id)
	{
		$post                   = MPost::FindOrFail($post_id);
        $gettitle               = MPost::where('post_id', $post_id)->first()->post_title;
        $getlinkimg             = MPost::where('post_id', $post_id)->first()->post_img;
        $post->delete();
        unlink(public_path($getlinkimg));
		return $post;
	}
	public function PostsByuser()
	{
		return MPost::where('post_author', \Auth::user()->id)->where('is_deleted', null)->orWhere('is_deleted', 0)->orderBy('id', 'desc')->paginate(10);
	}
	public function searchPostByuser(Request $request)
	{
		$query 			= $request->get('keyword','');
		return MPost::where('post_author', \Auth::user()->id)->where('is_deleted', null)->where('post_title','LIKE','%'.$query.'%')->orWhere('is_deleted', 0)
					->paginate(5);
	}
	public function findPosts($post_id)
	{
		return MPost::find($post_id);
	}
	public function getCategorypost($post_id)
	{
		return MPost::where('post_id', $post_id)->first()->post_category;
	}
	public function pluckCategory()
	{
		return MPostCategory::pluck('category_name','category_id');
	}
	public function startPublishByid($post_id)
	{
		return MPost::where('post_id', $post_id)->first()->start_publishing;
	}
	public function SearchPostBydate(Request $request)
	{
		$mulai			= $request->start;
		$akhir			= $request->end;
		$report			= MPost::where('post_author', \Auth::user()->id)
						->whereBetween('created_at', array($mulai, $akhir))
						->paginate(10);
		return $report;
	}
	public function getBrandiD($post_id)
	{
		return MPost::where('post_id', $post_id)->first()->brand_related;
	}
	
	public function PostHitsBrandId($brand_id)
	{
		return MPost::where('brand_related', $brand_id)->get();
	}
	public function PostByBrand($brand_id)
	{
		return MPost::where('brand_related', $brand_id)->orderBy('post_date_added', 'DESC')->paginate(10);
	}
	public function GetPostByDateBrand($brand_id, $start, $end)
	{
		return MPost::where('brand_related', $brand_id)->whereBetween('post_date_added', [$start,$end])->paginate(10);
	}
	public function FKnowladge()
	{
		$postcat		= array('6', '28', '29', '31', '32');
		return MPost::whereIn('post_category', $postcat)->orderBy('post_date_added', 'DESC')->take(10)->get();
	}
	public function PostByBrandRelatedAll($brand_related)
	{
		return MPost::where('brand_related', $brand_related)->get();
	}
}
