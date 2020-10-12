<?php

namespace App\Mail;

use App\Models\Curso;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OwnerNewSale extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var User
     */
    public User $owner;

    /**
     * @var User
     */
    public User $estudiante;

    /**
     * @var Curso
     */
    public Curso $curso;

    /**
     * Create a new message instance.
     *
     * @param User $owner
     * @param User $estudiante
     * @param Curso $curso
     */
    public function __construct(User $owner, User $estudiante, Curso $curso)
    {
        $this->owner = $owner;
        $this->estudiante = $estudiante;
        $this->curso = $curso;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject("¡Curso vendido! - " . config("app.name"))
            ->markdown('emails.owner.new_sale');
    }
}
