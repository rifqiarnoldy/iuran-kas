<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\KasMasuk;
use App\Models\Penduduk;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KasMasukResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KasMasukResource\RelationManagers;

class KasMasukResource extends Resource
{
    protected static ?string $model = KasMasuk::class;

    protected static ?string $navigationGroup = 'Aliran Kas';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Kas Masuk';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nominal')
                    ->required()
                    ->prefix('Rp. ')
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')
                    ->minValue(1)
                    ->numeric()
                    ->inputMode('decimal'),
                Forms\Components\DatePicker::make('tanggal_masuk')
                    ->native(false)
                    ->displayFormat('d-m-Y')
                    ->locale('id')
                    ->required(),
                Forms\Components\Select::make('penduduk_id')
                    ->required()
                    ->relationship(name: 'penduduk', titleAttribute: 'virtual_name')
                    ->searchable()
                    ->preload()
                    ->noSearchResultsMessage('Penduduk tidak ditemukan.')
                    ->createOptionForm([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('nama')
                                    ->required(),
                                Forms\Components\TextInput::make('nik')
                                    ->unique(table: Penduduk::class, column: 'nik')
                                    ->minLength(16)
                                    ->required(),
                                Forms\Components\Select::make('jenis_kelamin')
                                    ->options([
                                        'Laki-laki' => 'Laki - laki',
                                        'Perempuan' => 'Perempuan'
                                    ])
                                    ->required(),
                                Forms\Components\TextInput::make('tempat_lahir')
                                    ->required(),
                                Forms\Components\DatePicker::make('tanggal_lahir')
                                    ->native(false)
                                    ->displayFormat('d-m-Y')
                                    ->locale('id')
                                    ->required(),
                                Forms\Components\TextInput::make('agama')
                                    ->required(),
                                Forms\Components\TextInput::make('pekerjaan')
                                    ->required(),
                            ])
                    ]),
                Forms\Components\Textarea::make('keterangan')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nominal')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_masuk')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('keterangan'),
                Tables\Columns\TextColumn::make('penduduk.nama')
                    ->label('Penduduk')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pengguna')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListKasMasuks::route('/'),
            'create' => Pages\CreateKasMasuk::route('/create'),
            'edit' => Pages\EditKasMasuk::route('/{record}/edit'),
        ];
    }
}
