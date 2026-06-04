<?php

namespace App\Filament\Resources\RecruitmentBatches\Pages;

use App\Filament\Resources\RecruitmentBatches\RecruitmentBatchResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRecruitmentBatch extends EditRecord
{
    protected static string $resource = RecruitmentBatchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
