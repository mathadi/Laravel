<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Inertia\Inertia;

use Illuminate\Http\Request;
use App\Events\CreatedTaskEvent;
use App\Events\DeletedTaskEvent;
use App\Events\UpdatedTaskEvent;

class TaskController extends Controller
{
    // Affiche la liste des tâches
    public function index()
    {
        $tasks = Task::orderBy('due_date', 'asc')->orderBy('created_at', 'desc')->get();
        return Inertia::render('Dashboard', [
            'tasks' => $tasks
        ]);
    }

    // Affiche le formulaire de création d'une tâche
    public function showForm()
    {
        return Inertia::render('Tasks/Create');
    }

    // Crée une nouvelle tâche
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:tasks,title',
            'description' => 'nullable|string|max:1000',
            'due_date' => 'nullable|date',
            'status' => 'required|in:todo,in_progress,completed',

        ]);
        // ajoute l'utilisateur
        $validated['user_id'] = auth()->id();
        $newTask = Task::create($validated);

        event(new CreatedTaskEvent($newTask));
        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès.');
    }

    // Affiche le detail d'une tâche

    public function getTask($id)
    {
        $currentTask = Task::find($id);
        return Inertia::render('Tasks/Show', [
            'task' => $currentTask
        ]);
    }

    // Affiche le formulaire d'édition d'une tâche

    public function editForm($id)
    {
        $currentTask = Task::find($id);
        return Inertia::render('Tasks/Edit', [
            'task' => $currentTask
        ]);
    }

    // Mettre à jour une tâche

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|in:todo,in_progress,completed',
        ]);

        $currentTask = Task::find($id);

        $tasks = Task::where('title', $validated['title'])->where('id', '!=', $id)->exists();

        if ($tasks) {
            return redirect()->back()->withError(['error', 'Une tâche avec ce titre existe déjà.']);
        }

        $currentTask->update($validated);
        event(new UpdatedTaskEvent($currentTask));


        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès.');
    }

    // Supprime une tâche
    public function destroy($id)
    {
        $currentTask = Task::find($id);
        $currentTask->delete();
        event(new DeletedTaskEvent($currentTask));
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée avec succès.');
    }
}

