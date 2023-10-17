<?php

namespace App\Services;

use App\Models\Support\Ticket;
use App\Repository\Ticket\ReplayRepo;
use App\Repository\Ticket\TicketRepo;
use App\Services\Media\Files;
use Illuminate\Http\UploadedFile;

class ReplayService
{
    static  function store(Ticket $ticket , $replay , $files)
    {
        $repo = new ReplayRepo();
        $ticketRepo = new TicketRepo();
        if( !is_null($files) && ( $files instanceof UploadedFile))
        {
            dd($files);
            $files = (new Files())->handleUploadFileTicket($files);
        }
        $reply = $repo->store($ticket->id , $replay , $files);
        if($reply->user_id != $ticket->user_id)
        {
            $ticketRepo->setStatus($ticket->id , Ticket::STATUS_REPLY);
        }else{
            $ticketRepo->setStatus($ticket->id , Ticket::STATUS_OPEN);
        }

        return $reply ;
    }
}
