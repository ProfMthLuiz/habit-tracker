<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\HabitRequest;
use App\Models\Habit;
use App\Models\HabitLog;
use Carbon\Carbon;

class HabitController extends Controller
{

    public function index(): View
    {
        $habits = Auth::user()->habits()->with('habitLogs')->get();
        return view('dashboard', compact('habits'));
    }

    public function create(): View
    {
        return view('habits.create');
    }

    public function store(HabitRequest $request)
    {
        $validated = $request->validated();

        Auth::user()->habits()->create($validated);

        return redirect()->route('habits.index')->with('success', 'Hábito criado com sucesso.');
    }

    // public function show(Habit $habit) {}

    public function edit(Habit $habit): View
    {
        return view('habits.edit', compact('habit'));
    }

    public function update(HabitRequest $request, Habit $habit)
    {
        if ($habit->user_id !== Auth::user()->id) {
            abort(code: 403, message: 'Esse hábito não pertence a você.');
        }

        $habit->update($request->all());

        return redirect()->route('habits.index')->with('success', 'Hábito atualizado com sucesso.');
    }

    public function destroy(Habit $habit)
    {
        if ($habit->user_id !== Auth::user()->id) {
            abort(code: 403, message: 'Esse hábito não pertence a você.');
        }

        $habit->delete();

        return redirect()->route('habits.index')->with('success', 'Hábito removido com sucesso.');
    }

    public function settings(): View
    {
        $habits = Auth::user()->habits;

        return view('habits.settings', compact('habits'));
    }

    public function toggle(Habit $habit)
    {
        if ($habit->user_id !== Auth::user()->id) {
            abort(code: 403, message: 'Esse hábito não pertence a você.');
        }

        $today = Carbon::today()->toDateString();
        $log = HabitLog::query()->where('habit_id', $habit->id)->where('completed_at', $today)->first();

        if ($log) {
            $log->delete();
            $message = 'Hábito desmarcado.';
        } else {
            HabitLog::create([
                'user_id' => Auth::user()->id,
                'habit_id' => $habit->id,
                'completed_at' => $today
            ]);
            $message = "Hábito concluído.";
        }

        return redirect()->route(('habits.index'))->with('success', $message);
    }
}
