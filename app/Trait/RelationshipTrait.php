<?php

namespace App\Trait;

use App\Models\ContactGroup;
use App\Models\User;
use Illuminate\Support\Facades\DB;

trait RelationshipTrait
{

    protected static function bootTraitUuid()
    {

        $user = User::find(1);

        $contactgroup = ContactGroup::find('1f83a7b9-43bb-470a-8363-d5d3214141cf');

        $id = $contactgroup->id;
        // dd($contactgroup);

        // $user1 = $user->contactgroups()->save($id);

        // $user = User::find(1);

        $contactgroup = new ContactGroup;

        $contactgroup->contactgroup = $contactgroup;

        // $user->contactgroups()->save($id);

        // $post = Post::find(1);

        // $comment = new Comment;
        // $comment->comment = "Hi ItSolutionStuff.com";

        // $post = $post->comments()->save($comment);
    }
}
