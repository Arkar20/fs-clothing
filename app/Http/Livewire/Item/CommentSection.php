<?php

namespace App\Http\Livewire\Item;

use App\Models\Item;
use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Traits\ToastTrait;

class CommentSection extends Component
{
    use WithPagination,ToastTrait;
    public $item;

    protected $listeners = ['confirmed', 'cancelled'];

    // public $comments=false;
    public $commenttxt;
    public $commentCount;

    // commenttodelete 
    public $commentToDelete;
    public function mount(Item $item)
    {
        // dd($item->comments);
        // $this->comments=collect();
        $this->commentCount=$item->comments_count;
        $this->item=$item;
        // $this->comments=array();
    }
    // public function fetchAllComments()
    // {
    //     $this->comments=;
    //     // dd($this->comments);
    //     // $this->commentCount=$this->item->comment_counts;
    // }
    public function addComment()
    {
    $data=   $this->item->comments()->create([
            'desc'=>$this->commenttxt,
            'customer_id'=>1,
            'is_favourite' =>false,
            
    ]);
    $this->commenttxt='';
    $this->commentCount+=1;
    // $this->fetchAllComments();
    }
    public function deleteComment(Comment $comment)
    {
        // dd($comment);
        // $comment->delete();

        // dd($comment);
       $this->confirmDialog();
       $this->commentToDelete=$comment;
    }
    public function confirmed()
    {
        $this->commentToDelete->delete();
    $this->commentCount-=1;

    }

    public function render()
    {
        return view('livewire.item.comment-section',['comments'=>
                $this->item->comments()->latest()->simplePaginate(5)]
            );
    }
}
