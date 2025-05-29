<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Styles;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\Common\CursorType;
use Turker\FigmaAPI\Types\Style\StyleType;
use Turker\FigmaAPI\Util\Helper;

final class TeamStylesResponse extends BaseResponse
{
    public readonly int $status;
    public readonly bool $error;
    /**
     * @var array{cursor: CursorType, styles: StyleType[]}|null $meta
     */
    public readonly ?array $meta;

    public function __construct(array $data)
    {
        $this->status = Helper::makeInteger($data['status']);
        $this->error  = boolval($data['error']);

        $meta = null;
        if (!empty($data['meta'])) {
            $meta           = [];
            $meta['cursor'] = null;
            $meta['styles'] = null;
            if (!empty($data['meta']['cursor'])) {
                $meta['cursor'] = new CursorType($data['meta']['cursor']);
            }
            if (!empty($data['meta']['styles'])) {
                $meta['styles'] = [];
                foreach ($data['meta']['styles'] as $style) {
                    $meta['styles'][] = new StyleType($style);
                }
            }
        }
        $this->meta = $meta;

        return $this;
    }
}
