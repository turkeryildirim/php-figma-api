<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\ComponentSets;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\ComponentSet\ComponentSetType;
use Turker\FigmaAPI\Util\Helper;

final class FileComponentSetsResponse extends BaseResponse
{
    public readonly int|float|null $status;
    public readonly ?bool $error;
    /**
     * @var array{componentSets: ComponentSetType[]}|null $meta
     */
    public readonly ?array $meta;

    public function __construct(array $data)
    {
        $this->status = Helper::makeInteger($data['status']);
        $this->error  = Helper::makeBoolean($data['error']);

        $meta = null;
        if (!empty($data['meta'])) {
            $meta['componentSets'] = Helper::makeArrayOfObjects($data['meta']['component_sets'], ComponentSetType::class);
        }

        $this->meta = $meta;
    }
}
