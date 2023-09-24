<?php

namespace App\Livewire\Stocks;

use App\Enums\AssetMovementType;
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

    public string $searchAssets = '';

    public array $assetsList = [];

    protected array $rules = [
        'assetMovement.user_id' => ['required', 'exists:users,id'],
        'assetMovement.quantity' => ['required', 'numeric'],
        'assetMovement.price' => ['required', 'numeric'],

        'assetMomementToggle' => ['bool'],
        'selectedAsset' => ['required']
    ];

    protected function validationAttributes () {
        return [
            'selectedAsset' => trans('fields.asset')
        ];
    }

    public function updatedAssetMovementToggle(): void
    {
        if (!$this->assetMomementToggle) {
            $this->assetMovement = null;
        }
    }

    public function updatedSearchAssets(): void
    {
        $this->setAssetsList();
    }

    public function toggleModal(): void
    {
        $this->assetMomementToggle = !$this->assetMomementToggle;

        $this->assetMovement = new AssetMovement([
            'user_id' => auth()->user()->id,
            'type' => AssetMovementType::BUY->value
        ]);
    }

    public function setAssetsList(): void
    {
        $this->assetsList = collect(Stocks::searchTicker($this->searchAssets))
            ->toArray();
    }

    public function selectAsset(int $assetIndex): void
    {
        $this->selectedAsset = $this->assetsList[$assetIndex];
    }

    public function removeAsset(): void
    {
        $this->selectedAsset = null;
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
            )->id;
    }

    public function save() 
    {
        $this->validate();

        $this->setAssetId();

        $this->assetMovement->save();

        $this->toggleModal();
    }

    public function render(): View
    {
        return view('livewire.stocks.save', [
            'assetMovementTypes' => AssetMovementType::selectCases()
        ]);
    }
}
