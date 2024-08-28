<?php

namespace App\Filament\Resources\KasKeluarResource\Pages;

use App\Filament\Resources\KasKeluarResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKasKeluar extends CreateRecord
{
    protected static string $resource = KasKeluarResource::class;

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
