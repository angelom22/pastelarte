<?php

namespace App\Jobs;

use App\Mail\OwnerNewSale;
use App\Models\Curso;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendOwnerSalesEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public int $tries = 5;

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
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Mail::to($this->owner->email)->send(
                new OwnerNewSale(
                    $this->owner,
                    $this->estudiante,
                    $this->curso
                )
            );
        } catch (\Exception $exception) {
            \Log::info($exception->getMessage());
        }
    }
}
