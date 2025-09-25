<?php

namespace App\Filament\Resources\JobPostings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class JobPostingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Judul Posisi')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                    
                TextColumn::make('division')
                    ->label('Divisi')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('gray'),
                    
                TextColumn::make('location')
                    ->label('Lokasi')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('employment_type')
                    ->label('Tipe Pekerjaan')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'full_time' => 'Waktu Penuh',
                        'part_time' => 'Paruh Waktu',
                        'contract' => 'Kontrak',
                        'internship' => 'Magang',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'full_time' => 'success',
                        'part_time' => 'warning',
                        'contract' => 'info',
                        'internship' => 'gray',
                        default => 'gray',
                    }),
                    
                TextColumn::make('work_type')
                    ->label('Tipe Kerja')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'onsite' => 'Di Kantor',
                        'remote' => 'Remote',
                        'hybrid' => 'Hybrid',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'onsite' => 'primary',
                        'remote' => 'success',
                        'hybrid' => 'warning',
                        default => 'gray',
                    }),
                    
                TextColumn::make('salary_range')
                    ->label('Range Gaji')
                    ->getStateUsing(function ($record) {
                        if ($record->salary_min && $record->salary_max) {
                            return 'Rp ' . number_format($record->salary_min, 0, ',', '.') . ' - Rp ' . number_format($record->salary_max, 0, ',', '.');
                        } elseif ($record->salary_min) {
                            return 'Min Rp ' . number_format($record->salary_min, 0, ',', '.');
                        } elseif ($record->salary_max) {
                            return 'Max Rp ' . number_format($record->salary_max, 0, ',', '.');
                        }
                        return 'Tidak disebutkan';
                    })
                    ->sortable(['salary_min', 'salary_max'])
                    ->toggleable(),
                    
                TextColumn::make('application_deadline')
                    ->label('Batas Lamaran')
                    ->date('d/m/Y')
                    ->sortable()
                    ->color(fn ($state) => $state && $state->isPast() ? 'danger' : 'success')
                    ->formatStateUsing(fn ($state) => $state ? $state->format('d/m/Y') : 'Tidak ada batas'),
                    
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'draft' => 'Draft',
                        'active' => 'Aktif',
                        'closed' => 'Ditutup',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'active' => 'success',
                        'closed' => 'danger',
                        default => 'gray',
                    }),
                    
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([   
                SelectFilter::make('division')
                    ->label('Divisi')
                    ->options([
                        'Engineering' => 'Engineering',
                        'Product' => 'Product',
                        'Design' => 'Design',
                        'Marketing' => 'Marketing',
                        'Sales' => 'Sales',
                        'Finance' => 'Finance',
                        'HR' => 'Human Resources',
                        'Operations' => 'Operations',
                        'Customer Success' => 'Customer Success',
                        'QA' => 'Quality Assurance',
                    ]),
                    
                SelectFilter::make('employment_type')
                    ->label('Tipe Pekerjaan')
                    ->options([
                        'full_time' => 'Waktu Penuh',
                        'part_time' => 'Paruh Waktu',
                        'contract' => 'Kontrak',
                        'internship' => 'Magang',
                    ]),
                    
                SelectFilter::make('work_type')
                    ->label('Tipe Kerja')
                    ->options([
                        'onsite' => 'Di Kantor',
                        'remote' => 'Remote',
                        'hybrid' => 'Hybrid',
                    ]),
                    
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Draft',
                        'active' => 'Aktif',
                        'closed' => 'Ditutup',
                    ]),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Edit'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Hapus'),
                    RestoreBulkAction::make()
                        ->label('Pulihkan'),
                    ForceDeleteBulkAction::make()
                        ->label('Hapus Permanen'),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}