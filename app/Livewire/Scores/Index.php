<?php

namespace App\Livewire\Scores;

use App\Models\Scores;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    use AuthorizesRequests;
    public function delete($id)
    {
        $score = Scores::findOrFail($id);
        // $this->authorize('delete', $score);
        if ($score->user_id !== Auth::id()) {
            session()->flash('success', 'You are not authorized to delete this score.');
            return;
        }

        $score->delete();
        session()->flash('success', 'Score deleted successfully.');
    }
    public function render()
    {
        // create role for admin
        // $admin = User::where('email', 'admin@gmail.com')->first();
        // $adminRole = Role::firstOrCreate(['name' => 'admin']);
        // $permissions = Permission::all();
        // $adminRole->syncPermissions($permissions);
        // $admin->assignRole($adminRole);
        // dd($admin->hasRole('teacher'));


        // $scores = Scores::with(['user', 'academic'])->latest()->where('user_id', Auth::id())->paginate(3);
        $scores = Scores::with(['academic'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(24);


        return view('livewire.scores.index', ['scores' => $scores])->layout('layouts.app');
    }
}
