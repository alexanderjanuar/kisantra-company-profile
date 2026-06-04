<?php

namespace App\Filament\Resources\RecruitmentBatches\Schemas;

use App\Models\RecruitmentBatch;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class RecruitmentBatchForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Batch')
                    ->description('Sesi / gelombang rekrutmen yang menampung beberapa lowongan')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Batch')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('contoh: Batch Januari 2026')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('Versi URL dari nama'),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(3)
                            ->maxLength(500)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Periode & Status')
                    ->schema([
                        DatePicker::make('start_date')
                            ->label('Tanggal Mulai')
                            ->native(false)
                            ->displayFormat('d M Y'),

                        DatePicker::make('end_date')
                            ->label('Tanggal Selesai')
                            ->native(false)
                            ->displayFormat('d M Y')
                            ->afterOrEqual('start_date'),

                        Select::make('status')
                            ->label('Status')
                            ->options(RecruitmentBatch::STATUSES)
                            ->default('upcoming')
                            ->required()
                            ->native(false),
                    ])
                    ->columns(3),
            ]);
    }
}
