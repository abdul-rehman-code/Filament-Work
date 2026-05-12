<?php

namespace App\Filament\Resources\Blogs;

use App\Filament\Resources\Blogs\Pages;
use App\Filament\Resources\Blogs\Schemas\BlogForm;
use App\Filament\Resources\Blogs\Tables\BlogsTable;
use App\Models\Post;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BlogResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static string|\UnitEnum|null $navigationGroup = 'Pages';

    protected static ?string $navigationLabel = 'Blogs';

    protected static ?int $navigationSort = 4;

    protected static ?string $slug = 'blogs';

    public static function form(Schema $schema): Schema
    {
        return BlogForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BlogsTable::configure($table);
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
