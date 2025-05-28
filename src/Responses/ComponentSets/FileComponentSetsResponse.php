<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\ComponentSets;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\ComponentSet\ComponentSetType;

final class FileComponentSetsResponse extends BaseResponse
{
    public readonly int $status;
    public readonly bool $error;
    /**
     * @var array{componentSets: ComponentSetType[]}|null $meta
     */
    public readonly ?array $meta;

    public function __construct(array $data)
    {
        $this->status = intval($data['status']);
        $this->error = boolval($data['error']);
        $meta = null;
        if (!empty($data['meta'])) {
            if (!empty($data['meta']['component_sets'])) {
                $meta['componentSets'] = [];
                foreach ($data['meta']['component_sets'] as $set) {
                    $meta['componentSets'][] = new ComponentSetType($set);
                }
            }
        }

        $this->meta = $meta;
        return $this;
    }
}
