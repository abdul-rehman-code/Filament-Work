<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use App\Filament\Forms\Components\SummernoteEditor;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Blog Management')
                    ->tabs([

                        // Tab 1: Blog Content
                        Tab::make('Blog Content')
                            ->icon('heroicon-o-pencil-square')
                            ->schema([
                                Section::make('Blog Content')
                                    ->description('Manage the main content of your blog post.')
                                    ->schema([
                                        TextInput::make('title')
                                            ->required()
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                                        TextInput::make('slug')
                                            ->required()
                                            ->unique(ignoreRecord: true),

                                        TextInput::make('author')
                                            ->default('M. Ali Khan'),

                                        FileUpload::make('thumbnail')

                                                ->label('Post Image')
                                                ->image()
                                                ->disk('public')
                                                ->directory('blog-images')
                                                ->visibility('public')
                                                ->columnSpanFull()
                                                ->preserveFilenames()
                                                ->imageEditor()
                                                ->deletable(true)
                                                ->columnSpanFull(),

                                            SummernoteEditor::make('content')
                                                    ->label('Page Content')
                                                    ->required()
                                                    ->helperText('You can use manually HTML tags (h2, p, strong).')
                                                    ->columnSpanFull()
                                ])->columns(2),
                            ]),

                        // Tab 2: SEO Meta
                        Tab::make('SEO Meta Tags')
                            ->icon('heroicon-o-magnifying-glass')
                            ->schema([
                                Section::make('SEO Meta Tags')
                                    ->description('Manage the SEO settings for this blog post.')
                                    ->schema([
                                        TextInput::make('meta_title')
                                            ->label('Meta Title')
                                            ->placeholder('Defaults to Blog Title')
                                            ->columnSpanFull(),

                                        Textarea::make('meta_description')
                                            ->label('Meta Description')
                                            ->rows(3)
                                            ->columnSpanFull(),

                                        TextInput::make('meta_keywords')
                                            ->label('Meta Keywords')
                                            ->placeholder('e.g. tax, blog, savings')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // Tab 3: Ads
                        Tab::make('Ads Manager')
                            ->icon('heroicon-o-megaphone')
                            ->schema([
                                Section::make('Ad Placements')
                                    ->description('Manage advertisements for this blog post.')
                                    ->schema([
                                        Textarea::make('ad_top')
                                            ->label('Top Banner Ad')
                                            ->placeholder('Paste script or HTML here...')
                                            ->rows(3),

                                        Textarea::make('ad_middle')
                                            ->label('Middle Content Ad')
                                            ->placeholder('Paste script or HTML here...')
                                            ->rows(3),

                                        Textarea::make('ad_sidebar')
                                            ->label('Sidebar Ad')
                                            ->placeholder('Paste script or HTML here...')
                                            ->rows(3),
                                    ])->columns(3),
                            ]),

                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString(),
            ]);
    }
}
