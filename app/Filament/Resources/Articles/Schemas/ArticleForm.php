<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Artikel')
                    ->description('Informasi dasar artikel')
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
                            ->helperText('URL-friendly version of the title'),
                        
                        Textarea::make('excerpt')
                            ->label('Ringkasan')
                            ->rows(3)
                            ->maxLength(500)
                            ->helperText('Ringkasan singkat artikel (opsional)')
                            ->visible(false)
                            ->dehydrated()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Konten')
                    ->schema([
                        RichEditor::make('content')
                            ->label('Konten Artikel')
                            ->required()
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('articles/content')
                            ->fileAttachmentsVisibility('public')
                            ->fileAttachmentsAcceptedFileTypes(['image/png', 'image/jpeg'])
                            ->floatingToolbars([
                                ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
                                ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                                ['blockquote', 'codeBlock', 'bulletList', 'orderedList'],
                                ['undo', 'redo'],
                            ])
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $state) {
                                    // Auto generate excerpt from content
                                    if (!empty($state)) {
                                        $plainText = strip_tags($state);
                                        $excerpt = Str::limit($plainText, 300);
                                        $set('excerpt', $excerpt);
                                    }
                            })
                            ->columnSpanFull(),
                    ]),

                Section::make('Media')
                    ->schema([
                        FileUpload::make('featured_image')
                            ->label('Gambar Unggulan')
                            ->image()
                            ->disk('public')
                            ->visibility('public')
                            ->directory('articles/images')
                            ->maxSize(2048)
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->helperText('Ukuran maksimal 2MB'),
                    ]),

                Section::make('Lampiran')
                    ->description('Tambahkan file lampiran untuk artikel (PDF, DOC, ZIP, dll)')
                    ->schema([
                        Repeater::make('attachments')
                            ->label('File Lampiran')
                            ->relationship()
                            ->schema([
                                FileUpload::make('file_path')
                                    ->label('File')
                                    ->disk('public')
                                    ->directory('articles/attachments')
                                    ->visibility('public')
                                    ->maxSize(10240) // 10MB
                                    ->acceptedFileTypes([
                                        'application/pdf',
                                        'application/msword',
                                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                                        'application/vnd.ms-excel',
                                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                                        'application/zip',
                                        'application/x-rar-compressed',
                                        'text/plain',
                                        'image/*',
                                    ])
                                    ->required()
                                    ->downloadable()
                                    ->openable()
                                    ->afterStateUpdated(function (Get $get, Set $set, $state) {
                                        if ($state) {
                                            // Auto-fill file name if not set
                                            if (empty($get('file_name')) && is_object($state)) {
                                                $set('file_name', $state->getClientOriginalName());
                                            }
                                        }
                                    })
                                    ->helperText('Maksimal 10MB. Format: PDF, DOC, DOCX, XLS, XLSX, ZIP, RAR, TXT, Gambar'),
                                
                                TextInput::make('file_name')
                                    ->label('Nama File')
                                    ->required()
                                    ->maxLength(255)
                                    ->helperText('Nama file yang akan ditampilkan'),
                                
                                Textarea::make('description')
                                    ->label('Deskripsi')
                                    ->rows(2)
                                    ->maxLength(500)
                                    ->helperText('Deskripsi singkat tentang file ini (opsional)')
                                    ->columnSpanFull(),
                            ])
                            ->columns(2)
                            ->collapsed()
                            ->itemLabel(fn (array $state): ?string => $state['file_name'] ?? null)
                            ->addActionLabel('Tambah Lampiran')
                            ->reorderable()
                            ->collapsible()
                            ->cloneable()
                            ->defaultItems(0)
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Section::make('Kategorisasi')
                    ->schema([
                        Select::make('categories')
                            ->label('Kategori')
                            ->relationship('categories', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                                TextInput::make('slug')
                                    ->required(),
                                Textarea::make('description'),
                            ])
                            ->columnSpanFull(),
                    ]),

                Section::make('Pengaturan Publikasi')
                    ->description('Atur status dan waktu publikasi artikel')
                    ->schema([
                        Select::make('author_id')
                            ->label('Penulis')
                            ->relationship('author', 'name')
                            ->required()
                            ->default(fn () => auth()->id())
                            ->searchable()
                            ->preload(),
                        
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Dipublikasikan',
                                'archived' => 'Diarsipkan',
                            ])
                            ->default('draft')
                            ->required()
                            ->native(false),
                        
                        DateTimePicker::make('published_at')
                            ->label('Waktu Publikasi')
                            ->helperText('Kosongkan untuk publikasi segera')
                            ->native(false)
                            ->seconds(false),
                        
                        TextInput::make('views_count')
                            ->label('Jumlah Dilihat')
                            ->numeric()
                            ->default(0)
                            ->disabled()
                            ->dehydrated(false)
                            ->helperText('Otomatis bertambah saat artikel dilihat'),
                    ])
                    ->columns(2),
            ]);
    }
}