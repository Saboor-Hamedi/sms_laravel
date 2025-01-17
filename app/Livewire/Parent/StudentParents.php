<?php

namespace App\Livewire\Parent;

use App\Models\Parents;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Lazy;
use Exception;

class StudentParents extends Component
{
    use WithPagination;
    #[Lazy]

    const PER_PAGE = 10;
    const CACHE_KEY = "parent_reports_user_";
    const CACHE_EXPIRY = 600;

    public function ensureUserIsAuthenticated($userId)
    {
        if (!$userId) {
            throw new Exception('User is not authenticated.');
        }
    }

    public function fetchParentReport($userId)
    {
        $data = Parents::with(['students.grades.teacher', 'user'])
            ->where('user_id', $userId)
            ->paginate(self::PER_PAGE);
        // Check if the parent has any students assigned to them
        if ($data->isEmpty()) {
            throw new ModelNotFoundException('No parent data found for the authenticated user.');
        }
        return $data;
    }
    public function render()
    {
        try {

            $userId = Auth::id();
            $this->ensureUserIsAuthenticated(Auth::id());

            $studentsProfile = Cache::remember(self::CACHE_KEY . $userId, self::CACHE_EXPIRY, function () use ($userId) {
                return $this->fetchParentReport($userId);
            });

            return view('livewire.parent.student-parents', ['studentsProfile' => $studentsProfile]);
        } catch (ModelNotFoundException $e) {
            session()->flash('parent_message', "You have not yet fill your profile. Please fill your profile.");
            return view('livewire.parent.student-parents', ['studentsProfile' => collect()]);
        } catch (Exception $e) {
            session()->flash('student_message', 'Your kid/s have not yet assigned to you, please contact admin or the homeroom teacher');
            return view('livewire.parent.student-parents', ['studentsProfile' => collect()]);
        }
    }
}
