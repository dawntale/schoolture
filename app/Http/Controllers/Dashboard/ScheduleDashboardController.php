<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Dashboard\ClassDashboardController;

class ScheduleDashboardController extends ClassDashboardController
{
    public function scheduleIndex()
    {
        $departments = $this->department->where('status', 1)->get();

        $grades = $this->grade->all();

        return view('dashboard.schedule.index')
            ->withDepartments($departments)
            ->withGrades($grades);
    }

    public function scheduleCreate($class)
    {
        $class = $this->classroom->where('code', $class)->firstOrFail();

        $sessionBlocks = $this->sessionBlock->where('grade_id', $class->grade_id)->get();

        $lessons = $this->lesson->where('grade_id', $class->grade->id)->where('status', 1)->get();

        $days = [
            '0' => 'Sunday',
            '1' => 'Monday',
            '2' => 'Tuesday',
            '3' => 'Wednesday',
            '4' => 'Thursday',
            '5' => 'Friday',
            '6' => 'Saturday'
        ];

        return view('dashboard.schedule.create')
            ->withClass($class)
            ->withSessionBlocks($sessionBlocks)
            ->withDays($days)
            ->withLessons($lessons);
    }

    public function scheduleStore(Request $request, $class)
    {
        $request['class_id'] = $class;

        $this->validate($request, [
            'class_id' => 'required|integer',
            'day' => 'required|integer',
            'session_block_id' => 'required|integer',
            'lesson_id' => 'required|integer'
        ]);
        
        $input = $request->all();
        
        $this->schedule->create($input);
        
        return redirect()->back()->with('success', 'New schedule has been created!');
    }

    public function sessionIndex()
    {
        $departments = $this->department->where('status', 1)->get();

        return view ('dashboard.schedule.session-index')->withDepartments($departments);
    }

    public function sessionCreate($code)
    {
        $grade = $this->grade->where('code', $code)->firstOrFail();

        $sessionBlocks = $this->sessionBlock->where('grade_id', $grade->id)->orderBy('start_time', 'asc')->get();

        return view('dashboard.schedule.session-create')
            ->withGrade($grade)
            ->withSessionBlocks($sessionBlocks);
    }

    public function sessionStore(Request $request, $id)
    {
        $request['grade_id'] = $id;

        $this->validate($request, [
            'name' => 'required|max:50',
            'grade_id' => 'required|integer',
            'start_time' => 'required|min:4',
            'end_time' => 'required|min:4',
            'isBreak' => 'in:0,1',
        ]);
        
        $input = $request->all();
        
        $this->sessionBlock->create($input);
        
        return redirect()->back()->with('success', 'New session block has been created!');
    }
}
