<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class FeedController extends Controller
{

        public function feedList() {
        $feedList = DB::table('feeds')
            ->join('users', 'feeds.user_id', '=', 'users.id')
            ->join('departments', 'feeds.department_id', '=', 'departments.id')
            ->join('branches', 'feeds.branch_id', '=', 'branches.id')
            ->select('feeds.id', 'feeds.user_id', 'feeds.static', 'feeds.notification', 'feeds.title', 'feeds.description', 'feeds.image', 'feeds.created_at')
            ->addSelect('users.name as user_name', 'users.profile_image as user_profile_image')
            ->addSelect('departments.title as user_department_title')
            ->addSelect('branches.title as user_branch_title')
            ->addSelect(DB::raw('(SELECT COUNT(id) FROM likes WHERE likes.feed_id = feeds.id) as likeCount'))
            ->addSelect(DB::raw('(SELECT COUNT(id) FROM comments WHERE comments.feed_id = feeds.id) as commentCount'))
            ->where(['feeds.status' => 1])
            ->limit(20)
            ->orderByDesc('feeds.id')
            ->get();
        return response()->json($feedList, 200);
    }

    public function feedDetail($id=0) {
        $whereClause = ['feeds.status' => 1];
        if ($id>0) {
            $whereClause = array_merge($whereClause,['feeds.id' => $id]);
        }
        $feedList['detail'] = DB::table('feeds')
            ->join('users', 'feeds.user_id', '=', 'users.id')
            ->join('departments', 'feeds.department_id', '=', 'departments.id')
            ->join('branches', 'feeds.branch_id', '=', 'branches.id')
            ->select('feeds.id', 'feeds.user_id', 'feeds.static', 'feeds.notification', 'feeds.title', 'feeds.description', 'feeds.image', 'feeds.created_at')
            ->addSelect('users.name as user_name', 'users.profile_image as user_profile_image')
            ->addSelect('departments.title as user_department_title')
            ->addSelect('branches.title as user_branch_title')
            ->addSelect(DB::raw('(SELECT COUNT(id) FROM likes WHERE likes.feed_id = feeds.id) as likeCount'))
            ->addSelect(DB::raw('(SELECT COUNT(id) FROM comments WHERE comments.feed_id = feeds.id) as commentCount'))
            ->where($whereClause)
            ->limit(20)
            ->orderByDesc('feeds.id')
            ->get();

        $feedList['comments'] = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.user_id', 'comments.feed_id', 'comments.comment', 'comments.created_at', 'comments.updated_at')
            ->addSelect('users.name', 'users.id', 'users.profile_image')
            ->where(['feed_id' => $id])
            ->orderByDesc('comments.id')
            ->get();

        return response()->json($feedList, 200);
    }




}
