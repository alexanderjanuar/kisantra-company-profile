<?php

namespace App\Filament\Resources\JobPostings\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class JobPostingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Posisi')
                    ->description('Informasi dasar tentang posisi pekerjaan')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Posisi')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('contoh: Backend Developer Senior'),
                        
                        Select::make('division')
                            ->label('Divisi/Departemen')
                            ->options([
                                'Digital Marketing' => 'Digital Marketing',
                                'Sistem Digital' => 'Sistem Digital',
                                'Administrasi Pajak' => 'Administrasi Pajak',
                                'HR' => 'HR',
                            ])
                            ->searchable()
                            ->placeholder('Pilih divisi')
                            ->required(),

                        TextInput::make('location')
                            ->label('Lokasi')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('contoh: Jakarta, Surabaya'),
                        
                        Select::make('work_type')
                            ->label('Tipe Kerja')
                            ->options([
                                'onsite' => 'Onsite',
                                'remote' => 'Remote',
                                'hybrid' => 'Hybrid'
                            ])
                            ->default('onsite')
                            ->required(),

                        RichEditor::make('description')
                            ->label('Deskripsi Pekerjaan')
                            ->required()
                            ->placeholder('Jelaskan tanggung jawab, tugas, dan ekspektasi untuk posisi ini...')
                            ->toolbarButtons([
                                'bold',
                                'bulletList',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ]),
                    ]),

                Section::make('Detail Pekerjaan')
                    ->description('Informasi tambahan tentang pekerjaan')
                    ->columnSpanFull()
                    ->schema([
                        Select::make('employment_type')
                            ->label('Tipe Pekerjaan')
                            ->options([
                                'full_time' => 'Waktu Penuh',
                                'part_time' => 'Paruh Waktu',
                                'contract' => 'Kontrak',
                                'internship' => 'Magang',
                            ])
                            ->default('full_time')
                            ->required(),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'draft' => 'Draft',
                                'active' => 'Aktif',
                                'closed' => 'Ditutup'
                            ])
                            ->default('draft')
                            ->required(),

                        TextInput::make('salary_min')
                            ->label('Gaji Minimum')
                            ->numeric()
                            ->prefix('Rp')
                            ->placeholder('5000000')
                            ->formatStateUsing(fn ($state) => $state ? number_format($state, 0, ',', '.') : null),

                        TextInput::make('salary_max')
                            ->label('Gaji Maksimum')
                            ->numeric()
                            ->prefix('Rp')
                            ->placeholder('8000000')
                            ->formatStateUsing(fn ($state) => $state ? number_format($state, 0, ',', '.') : null),

                        DateTimePicker::make('application_deadline')
                            ->label('Batas Waktu Lamaran')
                            ->placeholder('Pilih tanggal dan waktu')
                            ->native(false)
                            ->displayFormat('d/m/Y H:i')
                            ->helperText('Kosongkan jika tidak ada batas waktu khusus'),

                        RichEditor::make('requirements')
                            ->label('Persyaratan')
                            ->placeholder('Tuliskan persyaratan dan kualifikasi yang dibutuhkan untuk posisi ini...')
                            ->toolbarButtons([
                                'bold',
                                'bulletList',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ]),
                    ]),
            ]);
    }
}