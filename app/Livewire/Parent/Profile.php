<?php

namespace App\Livewire\Parent;

use App\Models\Parents;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;

/**
 * @description : This is a parent profile component.
 *
 * @author: Abdul Saboor Hamedi
 *
 * @time : 2023-08-24
 *
 * @version : 1.0.0
 *
 * @bugs : None.
 *
 * @license : MIT
 *
 * @copyright: Feel free to use this component in your project.
 */
class Profile extends Component
{
    #[Layout('layouts.app')]
    #[Lazy()]
    public $lastname = '';

    public $phone = '';

    public $profile;

    public $kids = '';

    public function mount()
    {
        $this->profile = $this->fetchProfile();
        $this->kids = $this->fetchTheirKids();
    }

    public function fetchProfile()
    {
        return Parents::with('user')->where('user_id', Auth::id())->first();
    }

    /**
     * Summary of fetchTheirKids
     * fetchTheirKids Basically we are refering to students
     * Every parent has either multiple kids or at least one
     * Parents are able to see their kids on the profile
     * E.g @student_name
     */
    public function fetchTheirKids()
    {
        $parent = Parents::with('students')
            ->where('user_id', Auth::id())
            ->first()->students;
        Log::info($parent);

        return $parent ? $parent : collect();
    }

    public function render()
    {
        return view('livewire.parent.profile');
    }
}
