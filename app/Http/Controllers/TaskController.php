<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Models\Comment; // Pastikan model Comment sudah dibuat
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index($projectId)
    {
        $project = Project::findOrFail($projectId);
        $tasks = $project->tasks; // Ambil tugas untuk proyek
        return view('tasks.index', compact('project', 'tasks'));
    }

    public function create($projectId)
    {
        $project = Project::findOrFail($projectId);
        return view('tasks.create', compact('project'));
    }
    
    public function store(Request $request, $projectId)
{
    // Validasi data yang diterima
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'nullable|string',
        'deadline' => 'nullable|date',
    ]);

    // Temukan proyek berdasarkan ID
    $project = Project::findOrFail($projectId);

    // Buat tugas baru
    $task = new Task();
    $task->name = $request->name;
    $task->description = $request->description; // Menyimpan deskripsi
    $task->deadline = $request->deadline; // Menyimpan batas waktu
    $task->project_id = $project->id; // Mengaitkan tugas dengan proyek
    $task->save();

    // Arahkan kembali ke halaman tugas untuk proyek yang sesuai
    return redirect()->route('tasks.index', $project->id)->with('success', 'Tugas berhasil ditambahkan.');
}

    public function edit($projectId, Task $task)
    {
        $project = Project::findOrFail($projectId); // Ambil proyek berdasarkan ID
        return view('tasks.edit', compact('project', 'task'));
    }

    public function update(Request $request, $projectId, Task $task)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date',
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index', ['project' => $projectId])->with('success', 'Tugas berhasil diperbarui.');
    }

    public function destroy($projectId, Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index', ['project' => $projectId])->with('success', 'Tugas berhasil dihapus.');
    }

    public function show($projectId, Task $task)
    {
        // Pastikan proyek ada
        $project = Project::findOrFail($projectId);
    
        // $task sudah otomatis berisi task yang sesuai dengan ID yang diberikan
        // Tampilkan view dengan detail tugas
        return view('tasks.show', compact('project', 'task'));
    }
    
    public function updateProgress(Request $request, Task $task)
    {
    // Validate the progress value (ensure it's between 0 and 100)
    $request->validate([
        'progress' => 'required|integer|between:0,100',
    ]);

    // Update the task's progress
    $task->progress = $request->progress;
    $task->save();

    // Return success response
    return response()->json(['success' => true]);
    }

}