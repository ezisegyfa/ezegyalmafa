<?php

namespace App\Console\Commands;

use App\Models\ProductType;
use Illuminate\Console\Command;

class UpdateProductTypeCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update-product-types';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Executes the console command.
     *
     * @return void
     */
    public function handle()
    {
        ProductType::chunkById(100, function ($productTypes) {
            foreach ($productTypes as $productType) {
                $findedCodes = [];
                preg_match('/[0-9][0-9][0-9][0-9]/', $productType->name, $findedCodes);
                if (count($findedCodes) > 1)
                    throw new \Exception('Too many product code. Product type name: ' . $productType->name . 
                        ' id: ' . $productType->id, 1);
                else if (count($findedCodes) == 1) {
                    $findedCode = $findedCodes[0];
                    $this->removeCodeFromProductName($productType, $findedCode);
                    $productType->code = $findedCode;
                    $productType->save();
                }
            }
        });
    }

    protected function removeCodeFromProductName(ProductType $prodtuctTypeToChange, string $code)
    {
        $prodtuctTypeToChange->name = str_replace($code, '', $prodtuctTypeToChange->name);
        while ($prodtuctTypeToChange->name[0] == ' ')
            $prodtuctTypeToChange->name = substr($prodtuctTypeToChange->name, 1);
    }
}