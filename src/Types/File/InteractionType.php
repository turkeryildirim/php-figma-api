<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class InteractionType extends AbstractType
{
    public readonly ?TriggerType $trigger;
    /**
     * @var BackActionType[]|CloseActionType[]|NodeActionType[]|OpenUrlActionType[]|UpdateMediaRuntimeActionType[]|null
     */
    public readonly ?array $actions;

    public function __construct(array $data)
    {
        $this->trigger = Helper::makeObject($data['trigger'], TriggerType::class);

        $actions = null;
        if (!empty($data['actions']) && is_array($data['actions'])) {
            foreach ($data['actions'] as $action) {
                $actions[] = $this->match($action);
            }
        }
        $this->actions = $actions;
    }

    private function match(array $action): BackActionType|CloseActionType|NodeActionType|OpenUrlActionType|UpdateMediaRuntimeActionType
    {
        return match ($action['type']) {
            'BACK' => new BackActionType($action),
            'CLOSE' => new CloseActionType($action),
            'URL' => new OpenUrlActionType($action),
            'UPDATE_MEDIA_RUNTIME' => new UpdateMediaRuntimeActionType($action),
            'NODE' => new NodeActionType($action)
        };
    }
}
