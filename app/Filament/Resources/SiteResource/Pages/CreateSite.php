<?php

namespace App\Filament\Resources\SiteResource\Pages;

use App\Filament\Resources\SiteResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateSite extends CreateRecord
{
    protected static string $resource = SiteResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        $data['api_key'] = Str::uuid()->toString();
        if(!empty($data['url'])) {
            $host = parse_url($data['url'], PHP_URL_HOST);
            $data['url'] = $host ?: $data['url'];
        }

        return $data;
    }
}
