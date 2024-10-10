<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Panel\Comment;
use App\repository\commentRepo;

class CommentController extends Controller
{
    public function __construct(public commentRepo $repo){}
    public function index()
    {
        $comments = $this->repo->searchMail(request("email"))
            ->searchName(request("name"))
            ->searchStatus(request("status"))
            ->paginateParents();
        return view('admin.comments.index'  , compact('comments')) ;
    }

    public function store(StoreCommentRequest $request)
    {
        $comment = $this->repo->store($request->all());
        return back();
    }

    public function approved($id)
    {
        $id =  $this->repo->getFindId($id);
        $this->repo->changeStatus($id , Comment::STATUS_APPROVED);
        return back();
    }

    public function reject($id)
    {
        $id =  $this->repo->getFindId($id);
        $this->repo->changeStatus($id , Comment::STATUS_REJECT);
        return back();
    }


    public function show(Comment $comment)
    {
        //
    }


    public function edit(Comment $comment)
    {
        //
    }


    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }


    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
