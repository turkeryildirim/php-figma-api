<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\ComponentSets;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\Common\CursorType;
use Turker\FigmaAPI\Types\ComponentSet\ComponentSetType;
use Turker\FigmaAPI\Util\Helper;

final class TeamComponentSetsResponse extends BaseResponse
{
    public readonly int|float|null $status;
    public readonly ?bool $error;
    /**
     * @var array{cursor: CursorType, componentSets: ComponentSetType[]}|null $meta
     */
    public readonly ?array $meta;

    public function __construct(array $data)
    {
        $this->status = Helper::makeInteger($data['status']);
        $this->error  = Helper::makeBoolean($data['error']);

        $meta = null;
        if (!empty($data['meta'])) {
            $meta['cursor'] = null;
            if (!empty($data['meta']['cursor'])) {
                $meta['cursor'] = new CursorType($data['meta']['cursor']);
            }
            $meta['componentSets'] = Helper::makeArrayOfObjects($data['meta']['component_sets'], ComponentSetType::class);
        }

        $this->meta = $meta;
    }
}
