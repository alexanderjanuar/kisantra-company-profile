<?php

namespace App\Livewire;

use App\Models\JobPosting;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class Career extends Component
{
    use WithPagination;

    public $selectedLocation = 'worldwide';

    public function updatingSelectedLocation()
    {
        $this->resetPage();
    }

    public function getJobsProperty()
    {
        $jobs = JobPosting::query()
            ->when($this->selectedLocation !== 'worldwide', function ($query) {
                $query->where('location', 'like', '%' . $this->selectedLocation . '%');
            })
            ->where('status', 'active')
            ->latest('created_at')
            ->get();

        // Add formatted attributes to each job
        return $jobs->map(function ($job) {
            $job->formatted_employment_type = $this->formatEmploymentType($job->employment_type);
            $job->formatted_work_type = $this->formatWorkType($job->work_type);
            $job->formatted_salary = $this->formatSalary($job->salary_min, $job->salary_max);
            $job->formatted_deadline = $this->formatDate($job->application_deadline);
            $job->time_ago = $this->formatTimeAgo($job->created_at);
            return $job;
        });
    }

    public function getLocationsProperty()
    {
        return [
            'worldwide' => 'Worldwide',
            'jakarta' => 'Jakarta',
            'bandung' => 'Bandung',
            'surabaya' => 'Surabaya',
            'yogyakarta' => 'Yogyakarta',
            'bali' => 'Bali',
        ];
    }

    private function formatEmploymentType($type)
    {
        $types = [
            'full_time' => 'Full time',
            'part_time' => 'Part time',
            'contract' => 'Contract',
            'internship' => 'Internship'
        ];
        return $types[$type] ?? $type;
    }

    private function formatWorkType($type)
    {
        $types = [
            'onsite' => 'Onsite',
            'remote' => 'Remote',
            'hybrid' => 'Hybrid'
        ];
        return $types[$type] ?? $type;
    }

    private function formatSalary($min, $max)
    {
        if ($min && $max) {
            return 'Rp. ' . number_format($min, 0, ',', '.') . ' - Rp. ' . number_format($max, 0, ',', '.');
        }
        return 'Competitive';
    }

    private function formatDate($dateString)
    {
        if (!$dateString) return 'Open';
        return Carbon::parse($dateString)->format('F j, Y');
    }

    private function formatTimeAgo($dateString)
    {
        if (!$dateString) return 'recently';
        return Carbon::parse($dateString)->diffForHumans();
    }

    public function render()
    {
        return view('livewire.career')
            ->layout('layouts.app');
    }
}