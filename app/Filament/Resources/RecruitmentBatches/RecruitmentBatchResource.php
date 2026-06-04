<?php

namespace App\Filament\Resources\RecruitmentBatches;

use App\Filament\Resources\RecruitmentBatches\Pages\CreateRecruitmentBatch;
use App\Filament\Resources\RecruitmentBatches\Pages\EditRecruitmentBatch;
use App\Filament\Resources\RecruitmentBatches\Pages\ListRecruitmentBatches;
use App\Filament\Resources\RecruitmentBatches\Schemas\RecruitmentBatchForm;
use App\Filament\Resources\RecruitmentBatches\Tables\RecruitmentBatchesTable;
use App\Models\RecruitmentBatch;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class RecruitmentBatchResource extends Resource
{
    protected static ?string $model = RecruitmentBatch::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationLabel = 'Batch Rekrutmen';

    protected static ?string $modelLabel = 'Batch Rekrutmen';

    protected static ?string $pluralModelLabel = 'Batch Rekrutmen';

    public static function form(Schema $schema): Schema
    {
        return RecruitmentBatchForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RecruitmentBatchesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRecruitmentBatches::route('/'),
            'create' => CreateRecruitmentBatch::route('/create'),
            'edit' => EditRecruitmentBatch::route('/{record}/edit'),
        ];
    }
}
