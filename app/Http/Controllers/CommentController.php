<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index($projectId, Task $task)
    {
    $project = Project::findOrFail($projectId);
    $comments = Comment::where('task_id', $task->id)->get(); // Ambil komentar berdasarkan task_id
    return view('comments.index', compact('project', 'task', 'comments'));
    }
    public function create($projectId, Task $task)
    {
    $project = Project::findOrFail($projectId);
    return view('comments.create', compact('project', 'task'));
    }   

    public function store(Request $request, $projectId, Task $task)
    {
    // Debugging: Lihat data yang diterima
    ($request->all());

    // Validasi data yang diterima
    $request->validate([
        'comment' => 'required|string',
    ]);

    // Buat komentar baru
    Comment::create([
        'task_id' => $task->id,
        'comment' => $request->comment,
    ]);

    return redirect()->route('comments.index', ['project' => $projectId, 'task' => $task->id])->with('success', 'Komentar berhasil ditambahkan.');
    }

    public function destroy($projectId, Task $task, Comment $comment)
    {
        $comment->delete();
        return redirect()->route('tasks.index', ['project' => $projectId])->with('success', 'Komentar berhasil dihapus.');
    }
}