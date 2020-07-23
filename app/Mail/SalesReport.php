<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SalesReport extends Mailable
{
  use Queueable, SerializesModels;

  protected User $user;

  /**
   * Create a new message instance.
   *
   * @param User $user
   */
  public function __construct(User $user)
  {
    $this->user = $user;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this
        ->from('marlon.raphaael@hotmail.com')
        ->subject('Relatório diário de vendas')
        ->view('mails.sales-report')
        ->with(['user' => $this->user]);
  }
}
