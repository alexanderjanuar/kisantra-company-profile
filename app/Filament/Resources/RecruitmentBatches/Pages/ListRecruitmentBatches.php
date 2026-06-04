<?php

namespace App\Filament\Resources\RecruitmentBatches\Pages;

use App\Filament\Resources\RecruitmentBatches\RecruitmentBatchResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRecruitmentBatches extends ListRecords
{
    protected static string $resource = RecruitmentBatchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
