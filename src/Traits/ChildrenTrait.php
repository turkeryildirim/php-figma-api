<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\BooleanOperationNodeType;
use Turker\FigmaAPI\Types\File\CanvasNodeType;
use Turker\FigmaAPI\Types\File\ComponentNodeType;
use Turker\FigmaAPI\Types\File\ComponentSetNodeType;
use Turker\FigmaAPI\Types\File\ConnectorNodeType;
use Turker\FigmaAPI\Types\File\DocumentNodeType;
use Turker\FigmaAPI\Types\File\EllipseNodeType;
use Turker\FigmaAPI\Types\File\FrameNodeType;
use Turker\FigmaAPI\Types\File\GroupNodeType;
use Turker\FigmaAPI\Types\File\InstanceNodeType;
use Turker\FigmaAPI\Types\File\LineNodeType;
use Turker\FigmaAPI\Types\File\RectangleNodeType;
use Turker\FigmaAPI\Types\File\RegularPolygonNodeType;
use Turker\FigmaAPI\Types\File\SectionNodeType;
use Turker\FigmaAPI\Types\File\ShapeNodeType;
use Turker\FigmaAPI\Types\File\SliceNodeType;
use Turker\FigmaAPI\Types\File\StarNodeType;
use Turker\FigmaAPI\Types\File\StickyNodeType;
use Turker\FigmaAPI\Types\File\TableCellNodeType;
use Turker\FigmaAPI\Types\File\TableNodeType;
use Turker\FigmaAPI\Types\File\TextNodeType;
use Turker\FigmaAPI\Types\File\VectorNodeType;
use Turker\FigmaAPI\Types\File\WashiTapeNodeType;

trait ChildrenTrait
{
    /**
     * @var GroupNodeType[]|StarNodeType[]|RectangleNodeType[]|TextNodeType[]|ComponentNodeType[]|ComponentSetNodeType[]|EllipseNodeType[]|DocumentNodeType[]|InstanceNodeType[]|TableNodeType[]|StickyNodeType[]|WashiTapeNodeType[]|LineNodeType[]|ShapeNodeType[]|ConnectorNodeType[]|RegularPolygonNodeType[]|TableCellNodeType[]|FrameNodeType[]|BooleanOperationNodeType[]|SliceNodeType[]|SectionNodeType[]|CanvasNodeType[]|VectorNodeType[]|null
     */
    public readonly ?array $children;
    final protected function __children(array $data): void
    {
        $children = null;
        if (!empty($data['children']) && is_array($data['children'])) {
            foreach ($data['children'] as $value) {
                $children[] = $this->match($value);
            }
        }
        $this->children = $children;
    }

    private function match(array $data): GroupNodeType|
        StarNodeType|
        RectangleNodeType|
        TextNodeType|
        ComponentNodeType|
        ComponentSetNodeType|
        EllipseNodeType|
        DocumentNodeType|
        InstanceNodeType|
        TableNodeType|
        StickyNodeType|
        WashiTapeNodeType|
        LineNodeType|
        ShapeNodeType|
        ConnectorNodeType|
        RegularPolygonNodeType|
        TableCellNodeType|
        FrameNodeType|
        BooleanOperationNodeType|
        SliceNodeType|
        SectionNodeType|
        CanvasNodeType|
        VectorNodeType
    {
        return match ($data['type']) {
            'DOCUMENT' =>  new DocumentNodeType($data),
            'FRAME' => new FrameNodeType($data),
            'SECTION' => new SectionNodeType($data),
            'CANVAS' => new CanvasNodeType($data),
            'VECTOR' => new VectorNodeType($data),
            'BOOLEAN_OPERATION' => new BooleanOperationNodeType($data),
            'GROUP' => new GroupNodeType($data),
            'STAR' => new StarNodeType($data),
            'LINE' => new LineNodeType($data),
            'ELLIPSE' => new EllipseNodeType($data),
            'REGULAR_POLYGON' => new RegularPolygonNodeType($data),
            'RECTANGLE' => new RectangleNodeType($data),
            'TABLE' => new TableNodeType($data),
            'TABLE_CELL' => new TableCellNodeType($data),
            'TEXT' => new TextNodeType($data),
            'SLICE' => new SliceNodeType($data),
            'COMPONENT' => new ComponentNodeType($data),
            'COMPONENT_SET' => new ComponentSetNodeType($data),
            'INSTANCE' => new InstanceNodeType($data),
            'STICKY' => new StickyNodeType($data),
            'SHAPE_WITH_TEXT' => new ShapeNodeType($data),
            'CONNECTOR' => new ConnectorNodeType($data),
            'WASHI_TAPE' => new WashiTapeNodeType($data)
        };
    }
}
