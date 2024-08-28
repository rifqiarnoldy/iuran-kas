<?php

namespace App\Filament\Resources\KasMasukResource\Pages;

use App\Filament\Resources\KasMasukResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKasMasuk extends CreateRecord
{
    protected static string $resource = KasMasukResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
