<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Dasar')
                    ->description('Informasi utama tentang layanan')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Layanan')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
                        
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText('URL-friendly version of the name'),
                        
                        Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'Perpajakan' => 'Perpajakan',
                                'Keuangan' => 'Keuangan',
                                'Perizinan' => 'Perizinan',
                                'Digital' => 'Digital',
                            ])
                            ->required()
                            ->native(false),
                        
                        RichEditor::make('description')
                            ->label('Deskripsi')
                            ->required()
                            ->floatingToolbars([
                                ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
                                ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                                ['blockquote', 'codeBlock', 'bulletList', 'orderedList'],
                                ['table', 'attachFiles'],
                                ['undo', 'redo'],
                            ])
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Harga')
                    ->description('Informasi harga layanan')
                    ->schema([
                        TextInput::make('price')
                            ->label('Harga')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Rp 750.000 atau Hubungi Kami')
                            ->helperText('Format: Rp 750.000 atau "Hubungi Kami"'),
                        
                        TextInput::make('price_note')
                            ->label('Catatan Harga')
                            ->maxLength(255)
                            ->placeholder('Contoh: Mulai dari, Per bulan')
                            ->helperText('Teks tambahan untuk harga (opsional)'),
                    ])
                    ->columns(2),

                Section::make('Icon & Fitur')
                    ->description('Icon SVG dan daftar fitur layanan')
                    ->schema([                     
                        TagsInput::make('features')
                            ->label('Fitur-fitur')
                            ->placeholder('Tambah fitur dan tekan Enter')
                            ->helperText('Tekan Enter setelah setiap fitur')
                            ->columnSpanFull(),
                    ]),

                Section::make('Smart Filter')
                    ->description('Filter untuk rekomendasi layanan')
                    ->schema([
                        Select::make('target_business_types')
                            ->label('Target Jenis Usaha')
                            ->multiple()
                            ->options([
                                'new' => 'Baru Memulai Usaha',
                                'umkm' => 'UMKM / Usaha Kecil',
                                'company' => 'Perusahaan / PT',
                                'personal' => 'Perorangan',
                            ])
                            ->placeholder('Pilih satu atau lebih')
                            ->helperText('Kosongkan untuk semua jenis usaha')
                            ->native(false),
                        
                        Select::make('target_pkp_status')
                            ->label('Target Status PKP')
                            ->multiple()
                            ->options([
                                'yes' => 'Sudah PKP',
                                'no' => 'Belum PKP',
                                'not_sure' => 'Tidak Yakin',
                            ])
                            ->placeholder('Pilih satu atau lebih')
                            ->helperText('Kosongkan untuk semua status PKP')
                            ->native(false),
                        
                        TagsInput::make('search_keywords')
                            ->label('Kata Kunci Pencarian')
                            ->placeholder('Tambah keyword dan tekan Enter')
                            ->helperText('Contoh: SPT, Masa, NIB, EFIN, PKP')
                            ->columnSpanFull(),
                        
                        TextInput::make('recommendation_priority')
                            ->label('Prioritas Rekomendasi')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->maxValue(100)
                            ->helperText('Angka lebih tinggi = muncul lebih dulu (0-100)'),
                    ])
                    ->columns(2)
                    ->collapsed(),

                Section::make('Pengaturan')
                    ->description('Status dan urutan tampilan')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true)
                            ->helperText('Layanan ini akan ditampilkan di website'),
                    
                    ])
                    ->columns(2),
            ]);
    }
}