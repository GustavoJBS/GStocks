<?php

namespace App\Livewire\Stocks;

use App\Facades\Services\Stocks;
use App\Models\Asset;
use App\Models\AssetMovement;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Save extends Component
{
    public ?AssetMovement $assetMovement = null;

    public bool $assetMomementToggle = false;

    public ?array $selectedAsset = null;

    protected function rules(): array
    {
        return [
            'assetMovement.user_id' => ['required', 'exists:users,id'],
            'assetMomementToggle' => ['bool'],
            'selectedAsset' => ['array']
        ];
    }

    public function updatedAssetMovementToggle(): void
    {
        if (!$this->assetMomementToggle) {
            $this->assetMovement = null;
        }
    }

    public function toggleModal(): void
    {
        $this->assetMomementToggle = !$this->assetMomementToggle;

        $this->assetMovement = new AssetMovement([
            'user_id' => auth()->user()->id
        ]);
    }

    public function search(): array
    {
        $searchParameter = request('search', '');

        $apiSearch = collect(Stocks::searchTicker($searchParameter))
            ->map(fn (array $asset) => [
                'label' => $asset['code'],
                'value' => $asset
            ])->toArray();

        return $apiSearch;
    }

    public function setAssetId(): void
    {
        $this->assetMovement->asset_id = Asset::query()
            ->createOrFirst(
                ['ticker' => $this->selectedAsset['code']],
                [
                    'name' => $this->selectedAsset['nameFormated'],
                    'type' => $this->selectedAsset['type']
                ]
            );
    }

    public function save() 
    {
        $this->validate();
    }

    public function render(): View
    {
        return view('livewire.stocks.save');
    }
}
