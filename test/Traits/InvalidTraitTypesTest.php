<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Traits;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Traits\AbsoluteBoundingBoxTrait;
use Turker\FigmaAPI\Traits\AbsoluteRenderBoundsTrait;
use Turker\FigmaAPI\Traits\BackgroundColorTrait;
use Turker\FigmaAPI\Traits\BlendModeTrait;
use Turker\FigmaAPI\Traits\BoundVariablesTrait;
use Turker\FigmaAPI\Traits\BranchesTrait;
use Turker\FigmaAPI\Traits\CharactersTrait;
use Turker\FigmaAPI\Traits\ChildrenTrait;
use Turker\FigmaAPI\Traits\ColorTrait;
use Turker\FigmaAPI\Traits\CommentPinCornerTrait;
use Turker\FigmaAPI\Traits\ComponentSetsTrait;
use Turker\FigmaAPI\Traits\ComponentsTrait;
use Turker\FigmaAPI\Traits\ConstraintsTrait;
use Turker\FigmaAPI\Traits\CornerRadiusTrait;
use Turker\FigmaAPI\Traits\CornerSmoothingTrait;
use Turker\FigmaAPI\Traits\CreatedAtTrait;
use Turker\FigmaAPI\Traits\DescriptionTrait;
use Turker\FigmaAPI\Traits\DestinationIdTrait;
use Turker\FigmaAPI\Traits\DevStatusTrait;
use Turker\FigmaAPI\Traits\DocumentationLinksTrait;
use Turker\FigmaAPI\Traits\DocumentTrait;
use Turker\FigmaAPI\Traits\DurationTrait;
use Turker\FigmaAPI\Traits\EasingTrait;
use Turker\FigmaAPI\Traits\EffectsTrait;
use Turker\FigmaAPI\Traits\FileKeyTrait;
use Turker\FigmaAPI\Traits\IdTrait;
use Turker\FigmaAPI\Traits\IsMaskTrait;
use Turker\FigmaAPI\Traits\KeyTrait;
use Turker\FigmaAPI\Traits\LastModifiedTrait;
use Turker\FigmaAPI\Traits\LayoutAlignTrait;
use Turker\FigmaAPI\Traits\LockedTrait;
use Turker\FigmaAPI\Traits\NameTrait;
use Turker\FigmaAPI\Traits\NodeIdTrait;
use Turker\FigmaAPI\Traits\NodeOffsetTrait;
use Turker\FigmaAPI\Traits\OpacityTrait;
use Turker\FigmaAPI\Traits\PreferredValuesTrait;
use Turker\FigmaAPI\Traits\PreserveRatioTrait;
use Turker\FigmaAPI\Traits\ReactionsTrait;
use Turker\FigmaAPI\Traits\RectangleCornerRadiiTrait;
use Turker\FigmaAPI\Traits\RegionHeightTrait;
use Turker\FigmaAPI\Traits\RegionWidthTrait;
use Turker\FigmaAPI\Traits\RelativeTransformTrait;
use Turker\FigmaAPI\Traits\RemoteTrait;
use Turker\FigmaAPI\Traits\ScrollBehaviorTrait;
use Turker\FigmaAPI\Traits\SizeTrait;
use Turker\FigmaAPI\Traits\StrokeAlignTrait;
use Turker\FigmaAPI\Traits\StrokeCapTrait;
use Turker\FigmaAPI\Traits\StrokeDashesTrait;
use Turker\FigmaAPI\Traits\StrokeJoinTrait;
use Turker\FigmaAPI\Traits\StrokesTrait;
use Turker\FigmaAPI\Traits\StrokeWeightTrait;
use Turker\FigmaAPI\Traits\StylesTrait;
use Turker\FigmaAPI\Traits\StyleTypeTrait;
use Turker\FigmaAPI\Traits\ThumbnailUrlTrait;
use Turker\FigmaAPI\Traits\TransitionDurationTrait;
use Turker\FigmaAPI\Traits\TransitionEasingTrait;
use Turker\FigmaAPI\Traits\TransitionNodeIDTrait;
use Turker\FigmaAPI\Traits\TypeTrait;
use Turker\FigmaAPI\Traits\UpdatedAtTrait;
use Turker\FigmaAPI\Traits\UserTrait;
use Turker\FigmaAPI\Traits\VisibleTrait;
use Turker\FigmaAPI\Traits\XTrait;
use Turker\FigmaAPI\Traits\YTrait;
use TypeError;

final class InvalidTraitTypesTest extends AbstractBaseTestCase
{
    use AbsoluteBoundingBoxTrait;
    use AbsoluteRenderBoundsTrait;
    use BackgroundColorTrait;
    use BlendModeTrait;
    use BoundVariablesTrait;
    use BranchesTrait;
    use CharactersTrait;
    use ChildrenTrait;
    use ColorTrait;
    use CommentPinCornerTrait;
    use ComponentSetsTrait;
    use ComponentsTrait;
    use ConstraintsTrait;
    use CornerRadiusTrait;
    use CornerSmoothingTrait;
    use CreatedAtTrait;
    use DescriptionTrait;
    use DestinationIdTrait;
    use DevStatusTrait;
    use DocumentationLinksTrait;
    use DocumentTrait;
    use DurationTrait;
    use EasingTrait;
    use EffectsTrait;
    use FileKeyTrait;
    use IdTrait;
    use IsMaskTrait;
    use KeyTrait;
    use LastModifiedTrait;
    use LayoutAlignTrait;
    use LockedTrait;
    use NameTrait;
    use NodeIdTrait;
    use NodeOffsetTrait;
    use OpacityTrait;
    use PreferredValuesTrait;
    use PreserveRatioTrait;
    use ReactionsTrait;
    use RectangleCornerRadiiTrait;
    use RegionHeightTrait;
    use RegionWidthTrait;
    use RelativeTransformTrait;
    use RemoteTrait;
    use ScrollBehaviorTrait;
    use SizeTrait;
    use StrokeAlignTrait;
    use StrokeCapTrait;
    use StrokeDashesTrait;
    use StrokeJoinTrait;
    use StrokesTrait;
    use StrokeWeightTrait;
    use StylesTrait;
    use StyleTypeTrait;
    use ThumbnailUrlTrait;
    use TransitionDurationTrait;
    use TransitionEasingTrait;
    use TransitionNodeIDTrait;
    use TypeTrait;
    use UpdatedAtTrait;
    use UserTrait;
    use VisibleTrait;
    use XTrait;
    use YTrait;

    public function testInvalidKey(): void
    {
        $this->expectException(TypeError::class);
        $this->__key(['key' => 10]);
    }
    public function testInvalidY(): void
    {
        $this->expectException(TypeError::class);
        $this->__y(['y' => 'a']);
    }
    public function testInvalidX(): void
    {
        $this->expectException(TypeError::class);
        $this->__x(['x' => 'a']);
    }
    public function testInvalidVisible(): void
    {
        $this->__visible(['visible' => 10]);
        $this->assertTrue($this->visible);
    }
    public function testInvalidUser(): void
    {
        $this->expectException(TypeError::class);
        $this->__user(['user' => 10]);
    }
    public function testInvalidUpdatedAt(): void
    {
        $this->expectException(TypeError::class);
        $this->__updatedAt(['updated_at' => 10]);
    }
    public function testInvalidType(): void
    {
        $this->expectException(TypeError::class);
        $this->__type(['type' => 10]);
    }
    public function testInvalidTransitionNodeID(): void
    {
        $this->expectException(TypeError::class);
        $this->__transitionNodeID(['transitionNodeID' => 10]);
    }
    public function testInvalidTransitionEasing(): void
    {
        $this->expectException(TypeError::class);
        $this->__transitionEasing(['transitionEasing' => 'a']);
    }
    public function testInvalidTransitionDuration(): void
    {
        $this->__transitionDuration(['transitionDuration' => 'a']);
        $this->assertNull($this->transitionDuration);
    }
    public function testInvalidThumbnailUrl(): void
    {
        $this->expectException(TypeError::class);
        $this->__thumbnailUrl(['thumbnailUrl' => 10]);
    }
    public function testInvalidStyleType(): void
    {
        $this->__styleType(['style_type' => 'a']);
        $this->assertNull($this->styleType);
    }
    public function testInvalidStyles2(): void
    {
        $this->expectException(TypeError::class);
        $this->__styles(['styles' => ['a']]);
    }
    public function testInvalidStyles(): void
    {
        $this->__styles(['styles' => 'a']);
        $this->assertNull($this->styles);
    }
    public function testInvalidStrokeWeight(): void
    {
        $this->__strokeWeight(['strokeWeight' => 'a']);
        $this->assertNull($this->strokeWeight);
    }
    public function testInvalidStrokes2(): void
    {
        $this->expectException(TypeError::class);
        $this->__strokes(['strokes' => ['a']]);
    }
    public function testInvalidStrokes(): void
    {
        $this->__strokes(['strokes' => 'a']);
        $this->assertNull($this->strokes);
    }
    public function testInvalidStrokeJoin(): void
    {
        $this->__strokeJoin(['strokeJoin' => 'a']);
        $this->assertNull($this->strokeJoin);
    }
    public function testInvalidStrokeDashes(): void
    {
        $this->expectException(TypeError::class);
        $this->__strokeDashes(['strokeDashes' => 10]);
    }
    public function testInvalidStrokeCap(): void
    {
        $this->__strokeCap(['strokeCap' => 'a']);
        $this->assertNull($this->strokeCap);
    }
    public function testInvalidStrokeAlign(): void
    {
        $this->__strokeAlign(['strokeAlign' => 'a']);
        $this->assertNull($this->strokeAlign);
    }
    public function testInvalidSize(): void
    {
        $this->expectException(TypeError::class);
        $this->__size(['size' => 10]);
    }
    public function testInvalidScrollBehavior(): void
    {
        $this->expectException(TypeError::class);
        $this->__scrollBehavior(['scrollBehavior' => 10]);
    }
    public function testInvalidRemote(): void
    {
        $this->__remote(['remote' => 'a']);
        $this->assertFalse($this->remote);
    }
    public function testInvalidRelativeTransform(): void
    {
        $this->__relativeTransform(['relativeTransform' => 'a']);
        $this->assertNull($this->relativeTransform);
    }
    public function testInvalidRegionWidth(): void
    {
        $this->expectException(TypeError::class);
        $this->__regionWidth(['region_width' => 'a']);
    }
    public function testInvalidRegionHeight(): void
    {
        $this->expectException(TypeError::class);
        $this->__regionHeight(['region_height' => 'a']);
    }
    public function testInvalidRectangleCornerRadii(): void
    {
        $this->__rectangleCornerRadii(['rectangleCornerRadii' => 'a']);
        $this->assertNull($this->rectangleCornerRadii);
    }
    public function testInvalidReactions(): void
    {
        $this->expectException(TypeError::class);
        $this->__reactions(['reactions' => ['a']]);
    }
    public function testInvalidReactions2(): void
    {
        $this->__reactions(['reactions' => 'a']);
        $this->assertNull($this->reactions);
    }
    public function testInvalidPreserveRatio(): void
    {
        $this->__preserveRatio(['preserveRatio' => 'a']);
        $this->assertNull($this->preserveRatio);
    }
    public function testInvalidPreferredValues2(): void
    {
        $this->__preferredValues(['preferredValues' => 'a']);
        $this->assertNull($this->preferredValues);
    }
    public function testInvalidPreferredValues(): void
    {
        $this->expectException(TypeError::class);
        $this->__preferredValues(['preferredValues' => ['a']]);
    }
    public function testInvalidOpacity(): void
    {
        $this->__opacity(['opacity' => 'a']);
        $this->assertEquals('1', $this->opacity);
    }
    public function testInvalidNodeOffset(): void
    {
        $this->expectException(TypeError::class);
        $this->__nodeOffset(['node_offset' => 10]);
    }
    public function testInvalidNodeId(): void
    {
        $this->expectException(TypeError::class);
        $this->__nodeId(['nodeId' => 10]);
    }
    public function testInvalidName(): void
    {
        $this->expectException(TypeError::class);
        $this->__name(['name' => 10]);
    }
    public function testInvalidLocked(): void
    {
        $this->__locked(['locked' => 10]);
        $this->assertFalse($this->locked);
    }
    public function testInvalidLayoutAlign(): void
    {
        $this->__layoutAlign(['layoutAlign' => 10]);
        $this->assertNull($this->layoutAlign);
    }
    public function testInvalidLastModified(): void
    {
        $this->expectException(TypeError::class);
        $this->__lastModified(['lastModified' => 10]);
    }
    public function testInvalidIsMask(): void
    {
        $this->__isMask(['isMask' => 10]);
        $this->assertFalse($this->isMask);
    }
    public function testInvalidId(): void
    {
        $this->expectException(TypeError::class);
        $this->__id(['id' => 10]);
    }
    public function testInvalidFilekey(): void
    {
        $this->expectException(TypeError::class);
        $this->__filekey(['filekey' => 10]);
    }
    public function testInvalidEffects2(): void
    {
        $this->__effects(['effects' => 'a']);
        $this->assertNull($this->effects);
    }
    public function testInvalidEffects(): void
    {
        $this->expectException(TypeError::class);
        $this->__effects(['effects' => ['a']]);
    }
    public function testInvalidEasing2(): void
    {
        $this->expectException(TypeError::class);
        $this->__easing(['easing' => 'easing']);
    }
    public function testInvalidEasing(): void
    {
        $this->expectException(TypeError::class);
        $this->__easing(['easing' => ['a']]);
    }
    public function testInvalidDuration(): void
    {
        $this->__duration(['duration' => 'duration']);
        $this->assertNull($this->duration);
    }
    public function testInvalidDocumentationLinks2(): void
    {
        $this->expectException(TypeError::class);
        $this->__documentationLinks(['documentationLinks' => ['a']]);
    }
    public function testInvalidDocumentationLinks(): void
    {
        $this->__documentationLinks(['documentationLinks' => 10]);
        $this->assertNull($this->documentationLinks);
    }
    public function testInvalidDevStatus(): void
    {
        $this->expectException(TypeError::class);
        $this->__devStatus(['devStatus' => 10]);
    }
    public function testInvalidDestinationId(): void
    {
        $this->expectException(TypeError::class);
        $this->__destinationId(['destinationId' => 10]);
    }
    public function testInvalidDescription(): void
    {
        $this->expectException(TypeError::class);
        $this->__description(['description' => 10]);
    }
    public function testInvalidCreatedAt(): void
    {
        $this->expectException(TypeError::class);
        $this->__createdAt(['createdAt' => 10]);
    }
    public function testInvalidCornerSmoothing(): void
    {
        $this->__cornerSmoothing(['cornerSmoothing' => 'a']);
        $this->assertEquals('0', $this->cornerSmoothing);
    }
    public function testInvalidCornerRadius(): void
    {
        $this->__cornerRadius(['cornerRadius' => 'a']);
        $this->assertNull($this->cornerRadius);
    }
    public function testInvalidConstraints(): void
    {
        $this->expectException(TypeError::class);
        $this->__constraints(['constraints' => 'a']);
    }
    public function testInvalidAbsoluteBoundingBox(): void
    {
        $this->expectException(TypeError::class);
        $this->__absoluteBoundingBox(['absoluteBoundingBox' => 'a']);
    }
    public function testInvalidAbsoluteRenderBounds(): void
    {
        $this->expectException(TypeError::class);
        $this->__absoluteRenderBounds(['absoluteRenderBounds' => 'a']);
    }
    public function testInvalidBackgroundColor(): void
    {
        $this->expectException(TypeError::class);
        $this->__backgroundColor(['backgroundColor' => 'a']);
    }
    public function testInvalidBlendMode(): void
    {
        $this->__blendMode(['blendMode' => 'a']);
        $this->assertNull($this->blendMode);
    }
    public function testInvalidBoundVariables(): void
    {
        $this->expectException(TypeError::class);
        $this->__boundVariables(['boundVariables' => ['a']]);
    }
    public function testInvalidBoundVariables2(): void
    {
        $this->__boundVariables(['boundVariables' => 'a']);
        $this->assertNull($this->boundVariables);
    }
    public function testInvalidBranches(): void
    {
        $this->expectException(TypeError::class);
        $this->__branches(['branches' => ['a']]);
    }
    public function testInvalidBranches2(): void
    {
        $this->__branches(['branches' => 'a']);
        $this->assertNull($this->branches);
    }
    public function testInvalidCharacters(): void
    {
        $this->expectException(TypeError::class);
        $this->__characters(['characters' => ['a']]);
    }
    public function testInvalidChildren(): void
    {
        $this->expectException(TypeError::class);
        $this->__children(['children' => ['a']]);
    }
    public function testInvalidChildren2(): void
    {
        $this->__children(['children' => 'a']);
        $this->assertNull($this->children);
    }
    public function testInvalidColor(): void
    {
        $this->expectException(TypeError::class);
        $this->__color(['color' => 'a']);
    }
    public function testInvalidCommentPinCorner(): void
    {
        $this->__commentPinCorner(['commentPinCorner' => 'a']);
        $this->assertNull($this->commentPinCorner);
    }
    public function testInvalidComponents(): void
    {
        $this->__components(['components' => 'a']);
        $this->assertNull($this->components);
    }
    public function testInvalidComponentSets(): void
    {
        $this->__componentSets(['componentSets' => 'a']);
        $this->assertNull($this->componentSets);
    }
    public function testInvalidDocument(): void
    {
        $this->expectException(TypeError::class);
        $this->__document(['document' => ['a']]);
    }
}
