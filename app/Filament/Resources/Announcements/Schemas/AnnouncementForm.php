<?php

namespace App\Filament\Resources\Announcements\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class AnnouncementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pengumuman')
                    ->description('Informasi dasar pengumuman')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('Versi URL dari judul'),

                        Textarea::make('excerpt')
                            ->label('Ringkasan')
                            ->rows(3)
                            ->maxLength(500)
                            ->helperText('Ringkasan singkat yang tampil di daftar pengumuman (opsional)')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Gambar Sampul')
                    ->schema([
                        FileUpload::make('featured_image')
                            ->label('Gambar Sampul')
                            ->image()
                            ->disk('public')
                            ->visibility('public')
                            ->directory('announcements/images')
                            ->maxSize(2048)
                            ->imageEditor()
                            ->imageEditorAspectRatios(['16:9', '4:3', '1:1'])
                            ->helperText('Ukuran maksimal 2MB. Rasio 16:9 disarankan.'),
                    ]),

                Section::make('Konten')
                    ->schema([
                        RichEditor::make('content')
                            ->label('Isi Pengumuman')
                            ->required()
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('announcements/content')
                            ->fileAttachmentsVisibility('public')
                            ->fileAttachmentsAcceptedFileTypes(['image/png', 'image/jpeg'])
                            ->floatingToolbars([
                                ['bold', 'italic', 'underline', 'strike', 'link'],
                                ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                                ['blockquote', 'bulletList', 'orderedList'],
                                ['undo', 'redo'],
                            ])
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $state) {
                                if (empty($get('excerpt')) && ! empty($state)) {
                                    $set('excerpt', Str::limit(strip_tags($state), 300));
                                }
                            })
                            ->columnSpanFull(),
                    ]),

                Section::make('Lampiran')
                    ->description('Tambahkan file lampiran (opsional, mis. dokumen PDF)')
                    ->schema([
                        Repeater::make('attachments')
                            ->label('File Lampiran')
                            ->relationship()
                            ->schema([
                                FileUpload::make('file_path')
                                    ->label('File')
                                    ->disk('public')
                                    ->directory('announcements/attachments')
                                    ->visibility('public')
                                    ->maxSize(10240) // 10MB
                                    ->acceptedFileTypes([
                                        'application/pdf',
                                        'application/msword',
                                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                                        'application/vnd.ms-excel',
                                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                                        'image/*',
                                    ])
                                    ->required()
                                    ->downloadable()
                                    ->openable()
                                    ->afterStateUpdated(function (Get $get, Set $set, $state) {
                                        if ($state && empty($get('file_name')) && is_object($state)) {
                                            $set('file_name', $state->getClientOriginalName());
                                        }
                                    })
                                    ->helperText('Maksimal 10MB. Format: PDF, DOC, DOCX, XLS, XLSX, Gambar'),

                                TextInput::make('file_name')
                                    ->label('Nama File')
                                    ->required()
                                    ->maxLength(255)
                                    ->helperText('Nama file yang akan ditampilkan'),

                                Textarea::make('description')
                                    ->label('Deskripsi')
                                    ->rows(2)
                                    ->maxLength(500)
                                    ->columnSpanFull(),
                            ])
                            ->columns(2)
                            ->collapsed()
                            ->itemLabel(fn (array $state): ?string => $state['file_name'] ?? null)
                            ->addActionLabel('Tambah Lampiran')
                            ->reorderable()
                            ->collapsible()
                            ->defaultItems(0)
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Pengaturan Publikasi')
                    ->description('Atur status, waktu publikasi, dan sematan')
                    ->schema([
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Dipublikasikan',
                            ])
                            ->default('draft')
                            ->required()
                            ->native(false),

                        DateTimePicker::make('published_at')
                            ->label('Waktu Publikasi')
                            ->helperText('Kosongkan untuk publikasi segera')
                            ->native(false)
                            ->seconds(false),

                        Toggle::make('is_pinned')
                            ->label('Sematkan (Pin)')
                            ->helperText('Tampilkan paling atas sebagai pengumuman penting')
                            ->inline(false),
                    ])
                    ->columns(2),
            ]);
    }
}
