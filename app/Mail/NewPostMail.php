<?php
namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPostMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $post;
    protected $isEdited;

    public function __construct(Post $post, $isEdited = false)
    {
        $this->post = $post;
        $this->isEdited = $isEdited;
    }

    public function build()
    {
        $subject = $this->isEdited ? 'Proyecto Editado - ' .$this->post->user->name  : 'Nuevo Proyecto Creado - ' .$this->post->user->name;

        return $this->subject($subject)
                    ->view('emails.new_post', ['post' => $this->post]);
    }

}
