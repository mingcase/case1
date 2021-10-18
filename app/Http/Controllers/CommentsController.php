<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    public function commentDetail($id=0) {
        $commentList = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.user_id', 'comments.feed_id', 'comments.comment', 'comments.created_at', 'comments.updated_at')
            ->addSelect('users.name', 'users.id', 'users.profile_image')
            ->where(['feed_id' => $id])
            ->orderByDesc('comments.id')
            ->get();
        return response()->json($commentList, 200);
    }

    public function commentAdd(request $request) {
        $user = Auth::user();

        $islem = Comments::create([
            'user_id' => $user->id,
            'feed_id' => $request->post('feed_id'),
            'comment' => $request->post('comment')
        ]);

        $islem->save();

        return response()->json(['success' => true, 'comment_id' => $islem->id], 200);

    }


}
