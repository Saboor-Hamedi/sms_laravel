<?php

namespace App\Livewire\Parent;

use App\Models\Parents;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Lazy;

class StudentParents extends Component
{
    use WithPagination;
    #[Lazy]
    public function render()
    {
        try {
            // Get the authenticated user's ID
            $userId = Auth::id();

            // Check if the user is authenticated
            if (!$userId) {
                throw new \Exception('User is not authenticated.');
            }
            // Define cache key
            $cacheKey = "parent_reports_user_{$userId}";
            // Fetch the parent's data along with their students from cache
            $reports = Cache::remember($cacheKey, 600, function () use ($userId) {
                // Fetch the data if not cached
                $data = Parents::with('students')
                    ->where('user_id', $userId)
                    ->paginate(10);
                // Check if any reports are found
                if ($data->isEmpty()) {
                    throw new ModelNotFoundException('No parent data found for the authenticated user.');
                }
                return $data;
            });

            return view('livewire.parent.student-parents', ['reports' => $reports]);
        } catch (ModelNotFoundException $e) {
            session()->flash('parent_message', "You have not yet fill your profile. Please fill your profile.");
            return view('livewire.parent.student-parents', ['reports' => collect()]);
        } catch (\Exception $e) {
            session()->flash('student_message', 'Your kid/s have not yet assigned to you, please contact admin or the homeroom teacher');
            return view('livewire.parent.student-parents', ['reports' => collect()]);
        }
    }
}
