<?php // app/Events/UserWasPegistered.php
 
namespace Ontheroadjp\LaravelUser\Events;
 
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
 
use App\User;
 
class UserWasRegistered extends Event {
    use SerializesModels;
 
    public $user;
 
    public function __construct(User $user)
    {
        $this->user = $user;
    }
 
    public function broadcastOn()
    {
        return [];
    }
}
?>