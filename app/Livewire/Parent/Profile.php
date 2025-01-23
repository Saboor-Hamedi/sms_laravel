<?php

namespace App\Livewire\Parent;

use App\Models\Parents;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;

/**
 * 
 * @description : This is a parent profile component.
 * @author: Abdul Saboor Hamedi
 * @time : 2023-08-24
 * @version : 1.0.0
 * @bugs : None.
 * @license : MIT
 * @copyright: Feel free to use this component in your project.
 */
class Profile extends Component
{
    #[Layout('layouts.app')]
    #[Lazy()]
    public $lastname = '';
    public $phone = '';

    public $profile;

    public function mount()
    {
        $this->profile = $this->fetchProfile();
    }

    public function fetchProfile()
    {
        return Parents::with('user')->where('user_id', Auth::id())->first();
    }


    public function render()
    {
        return view('livewire.parent.profile');
    }
}
