<?php

namespace App\Filament\Resources\SiteResource\Pages;

use App\Filament\Resources\SiteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSite extends EditRecord
{
    protected static string $resource = SiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if(!empty($data['url'])) {
            $host = parse_url($data['url'], PHP_URL_HOST);
            $data['url'] = $host ?: $data['url'];
        }

        return $data;
    }
}
