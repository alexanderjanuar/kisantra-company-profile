<?php

namespace App\Livewire\Service;

use App\Models\Service;
use Livewire\Component;

class Index extends Component
{
    public $search = '';
    public $selectedCategory = 'all';
    
    // Quick Filter Form
    public $quickFilter = [
        'businessType' => '',
        'pkpStatus' => '',
        'serviceNeed' => '',
    ];
    
    public $quickFilterApplied = false;
    
    // Modal
    public $showModal = false;
    public $selectedService = null;

    // Category styling configuration
    public function getCategoryStylesProperty()
    {
        return [
            'Perpajakan' => [
                'badge_bg' => 'bg-slate-100',
                'badge_text' => 'text-slate-700',
                'icon_bg' => 'from-[#42B2CD]/10 to-[#42B2CD]/20',
                'border_hover' => 'hover:border-[#42B2CD]/50',
                'button_bg' => 'bg-[#42B2CD]',
                'button_hover' => 'hover:bg-[#3A9FB8]',
                'price_text' => 'text-[#42B2CD]',
                'feature_icon' => 'text-[#42B2CD]',
            ],
            'Keuangan' => [
                'badge_bg' => 'bg-emerald-50',
                'badge_text' => 'text-emerald-700',
                'icon_bg' => 'from-[#42B2CD]/10 to-[#42B2CD]/20',
                'border_hover' => 'hover:border-[#42B2CD]/50',
                'button_bg' => 'bg-[#42B2CD]',
                'button_hover' => 'hover:bg-[#3A9FB8]',
                'price_text' => 'text-[#42B2CD]',
                'feature_icon' => 'text-[#42B2CD]',
            ],
            'Perizinan' => [
                'badge_bg' => 'bg-indigo-50',
                'badge_text' => 'text-indigo-700',
                'icon_bg' => 'from-[#42B2CD]/10 to-[#42B2CD]/20',
                'border_hover' => 'hover:border-[#42B2CD]/50',
                'button_bg' => 'bg-[#42B2CD]',
                'button_hover' => 'hover:bg-[#3A9FB8]',
                'price_text' => 'text-[#42B2CD]',
                'feature_icon' => 'text-[#42B2CD]',
            ],
            'Digital' => [
                'badge_bg' => 'bg-amber-50',
                'badge_text' => 'text-amber-700',
                'icon_bg' => 'from-[#42B2CD]/10 to-[#42B2CD]/20',
                'border_hover' => 'hover:border-[#42B2CD]/50',
                'button_bg' => 'bg-[#42B2CD]',
                'button_hover' => 'hover:bg-[#3A9FB8]',
                'price_text' => 'text-[#42B2CD]',
                'feature_icon' => 'text-[#42B2CD]',
            ],
        ];
    }

    // Watch for changes to sidebar filters and reset quickFilterApplied
    public function updatedSelectedCategory()
    {
        // When sidebar category changes, disable quick filter priority
        $this->quickFilterApplied = false;
    }

    public function updatedSearch()
    {
        // When search changes, disable quick filter priority
        $this->quickFilterApplied = false;
    }

    // Computed property for filtered services from database with smart filtering
    public function getFilteredServicesProperty()
    {
        $query = Service::query()->active();

        // Priority 1: Apply sidebar category filter (unless overridden by quick filter's serviceNeed)
        if ($this->quickFilterApplied && !empty($this->quickFilter['serviceNeed'])) {
            // Quick filter "Layanan yang Dibutuhkan" takes priority
            $query->where('category', $this->quickFilter['serviceNeed']);
        } else {
            // Use sidebar category filter
            $query->byCategory($this->selectedCategory);
        }

        // Priority 2: Apply smart filters if quick filter was used
        if ($this->quickFilterApplied) {
            // Filter by business type
            if (!empty($this->quickFilter['businessType'])) {
                $query->forBusinessType($this->quickFilter['businessType']);
            }
            
            // Filter by PKP status
            if (!empty($this->quickFilter['pkpStatus'])) {
                $query->forPkpStatus($this->quickFilter['pkpStatus']);
            }
            
            // Order by recommendation priority when quick filters are applied
            $query->recommended();
        } else {
            // Normal ordering when using sidebar filters
            $query->ordered();
        }

        // Priority 3: Apply search (always applies)
        if (!empty($this->search)) {
            $query->search($this->search);
        }

        $categoryStyles = $this->categoryStyles;

        return $query->get()->map(function ($service) use ($categoryStyles) {
            $category = $service->category;
            $styles = $categoryStyles[$category] ?? $categoryStyles['Perpajakan']; // Default to Perpajakan styles

            return [
                'id' => $service->id,
                'name' => $service->name,
                'slug' => $service->slug,
                'category' => $service->category,
                'description' => $service->description,
                'price' => $service->price,
                'price_note' => $service->price_note,
                'icon' => $service->icon,
                'features' => $service->features ?? [],
                'styles' => $styles, // Add styling information
            ];
        })->toArray();
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->selectedCategory = 'all';
        $this->quickFilterApplied = false;
        $this->quickFilter = [
            'businessType' => '',
            'pkpStatus' => '',
            'serviceNeed' => '',
        ];
    }

    public function applyQuickFilter()
    {
        // Only set quickFilterApplied to true if at least one quick filter field is filled
        if (!empty($this->quickFilter['businessType']) || 
            !empty($this->quickFilter['pkpStatus']) || 
            !empty($this->quickFilter['serviceNeed'])) {
            $this->quickFilterApplied = true;
            
            // Reset sidebar filters when quick filter is applied
            $this->selectedCategory = 'all';
            $this->search = '';
        }
        
        // Scroll to results using JavaScript
        $this->dispatch('scroll-to-results');
    }

    public function openModal($serviceId)
    {
        $service = Service::find($serviceId);
        
        if ($service) {
            $categoryStyles = $this->categoryStyles;
            $styles = $categoryStyles[$service->category] ?? $categoryStyles['Perpajakan'];
            
            $this->selectedService = [
                'id' => $service->id,
                'name' => $service->name,
                'slug' => $service->slug,
                'category' => $service->category,
                'description' => $service->description,
                'price' => $service->price,
                'price_note' => $service->price_note,
                'icon' => $service->icon,
                'features' => $service->features ?? [],
                'styles' => $styles,
            ];
            
            $this->showModal = true;
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedService = null;
    }

    public function render()
    {
        return view('livewire.service.index')->layout('layouts.app');
    }
}