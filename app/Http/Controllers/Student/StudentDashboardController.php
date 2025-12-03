<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $studentUser = Auth::guard('student')->user();
        $student = $studentUser->student;

        // Get current academic year
        $currentYear = \App\Models\AcademicYear::where('is_current', true)->first();

        // Get current enrollments
        $currentEnrollments = $student->enrollments()
            ->with(['subject', 'academicYear'])
            ->whereIn('status', ['Enrolled', 'Completed'])
            ->when($currentYear, function ($query) use ($currentYear) {
                return $query->where('academic_year_id', $currentYear->id);
            })
            ->get();

        // Get all enrollments grouped by academic year
        $allEnrollments = $student->enrollments()
            ->with(['subject', 'academicYear'])
            ->whereIn('status', ['Enrolled', 'Completed', 'Failed'])
            ->orderBy('academic_year_id', 'desc')
            ->get();

        // Group by semester
        $enrollmentsBySemester = $allEnrollments->groupBy(function ($enrollment) {
            if ($enrollment->academicYear) {
                return $enrollment->academicYear->year_code . ' - ' . $enrollment->academicYear->semester;
            }
            return 'No Academic Year';
        });

        // Get all completed enrollments
        $completedCourses = $student->enrollments()
            ->with('subject')
            ->where('status', 'Completed')
            ->get();

        // Calculate overall GPA/GWA
        $overallGwa = $this->calculateGWA($completedCourses);
        $overallGpa = $this->calculateGPA($completedCourses);

        // Calculate current semester GPA
        $currentSemesterEnrollments = $currentEnrollments->where('status', 'Completed');
        $currentSemesterGwa = $this->calculateGWA($currentSemesterEnrollments);
        $currentSemesterGpa = $this->calculateGPA($currentSemesterEnrollments);

        // Get quick stats
        $totalUnits = $currentEnrollments->sum('subject.units');
        $enrollmentCount = $currentEnrollments->count();
        $completedUnits = $completedCourses->sum('subject.units');
        $enrollmentsWithGrades = $currentEnrollments->whereNotNull('grade')->count();
        $enrollmentsWithoutGrades = $currentEnrollments->whereNull('grade')->count();

        // Grade statistics
        $gradeStats = [
            'excellent' => $completedCourses->filter(fn($e) => $e->grade && $e->grade <= 1.75)->count(),
            'good' => $completedCourses->filter(fn($e) => $e->grade && $e->grade > 1.75 && $e->grade <= 2.5)->count(),
            'fair' => $completedCourses->filter(fn($e) => $e->grade && $e->grade > 2.5 && $e->grade < 4.0)->count(),
            'failed' => $completedCourses->filter(fn($e) => $e->grade && $e->grade >= 4.0)->count(),
        ];

        return view('student.dashboard', compact(
            'student',
            'currentEnrollments',
            'completedCourses',
            'enrollmentsBySemester',
            'overallGwa',
            'overallGpa',
            'currentSemesterGwa',
            'currentSemesterGpa',
            'totalUnits',
            'completedUnits',
            'enrollmentCount',
            'enrollmentsWithGrades',
            'enrollmentsWithoutGrades',
            'gradeStats',
            'currentYear'
        ));
    }

    private function calculateGWA($enrollments)
    {
        if ($enrollments->isEmpty()) {
            return null;
        }

        $totalWeightedGrade = 0;
        $totalUnits = 0;

        foreach ($enrollments as $enrollment) {
            if ($enrollment->grade && is_numeric($enrollment->grade) && $enrollment->subject) {
                $units = $enrollment->subject->units ?? 0;
                $totalWeightedGrade += $enrollment->grade * $units;
                $totalUnits += $units;
            }
        }

        if ($totalUnits == 0) {
            return null;
        }

        return round($totalWeightedGrade / $totalUnits, 2);
    }

    private function calculateGPA($enrollments)
    {
        if ($enrollments->isEmpty()) {
            return null;
        }

        $gradePoints = [
            '1.0' => 4.0,
            '1.00' => 4.0,
            '1.25' => 3.75,
            '1.5' => 3.5,
            '1.50' => 3.5,
            '1.75' => 3.25,
            '2.0' => 3.0,
            '2.00' => 3.0,
            '2.25' => 2.75,
            '2.5' => 2.5,
            '2.50' => 2.5,
            '2.75' => 2.25,
            '3.0' => 2.0,
            '3.00' => 2.0,
            '4.0' => 0.0,
            '4.00' => 0.0,
            '5.0' => 0.0,
            '5.00' => 0.0,
        ];

        $totalPoints = 0;
        $totalUnits = 0;

        foreach ($enrollments as $enrollment) {
            if ($enrollment->grade && isset($gradePoints[(string)$enrollment->grade]) && $enrollment->subject) {
                $points = $gradePoints[(string)$enrollment->grade];
                $units = $enrollment->subject->units ?? 0;
                $totalPoints += $points * $units;
                $totalUnits += $units;
            }
        }

        if ($totalUnits == 0) {
            return null;
        }

        return round($totalPoints / $totalUnits, 2);
    }
}
