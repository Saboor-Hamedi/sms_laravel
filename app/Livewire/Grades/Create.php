<?php

namespace App\Livewire\Grades;

use Livewire\Attributes\Layout;
use Livewire\Component;

/*
 * @author  <Saboor-Hamedi> 
 * @package App\Livewire\Grades
 * @version 1.0.0
 * @since   December 16, 2024
 * @link    https://github.com/Saboor-Hamedi/sms_laravel.git (fetch)
 TODO: 
    - This class for create new grade/class, 
    - At the moment, this class is accessible only by the admin.
    - this class will be used in the future for the admin to create new grade/class.
    - By no means this class is complete, it is just a starting point.
    - This class will be updated as the project progresses.
 */

class Create extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.grades.create');
    }
}
