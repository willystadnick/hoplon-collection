<?php

use hoplon\HoplonCollection;
use PHPUnit\Framework\TestCase;

final class HoplonCollectionTest extends TestCase
{
    public function testCanAddNewElement(): void
    {
        $collection = new HoplonCollection();

        $this->assertTrue($collection->Add('foo', 42, 'bar'));

        $list = $collection->Get('foo', 0, -1);

        $this->assertCount(1, $list);
    }

    public function testCannotAddSameElement(): void
    {
        $collection = new HoplonCollection();
        $collection->Add('foo', 42, 'bar');

        $this->assertFalse($collection->Add('foo', 42, 'bar'));

        $list = $collection->Get('foo', 0, -1);

        $this->assertCount(1, $list);
    }

    public function testCanGetElementWithValidKey(): void
    {
        $collection = new HoplonCollection();
        $collection->Add('foo', 42, 'bar');
        $list = $collection->Get('foo', 0, 0);

        $this->assertCount(1, $list);
        $this->assertEquals('bar', $list[0]);
    }

    public function testCannotGetElementWithInvalidKey(): void
    {
        $collection = new HoplonCollection();
        $collection->Add('foo', 42, 'bar');
        $list = $collection->Get('chave', 0, 0);

        $this->assertFalse($list);
    }

    public function testCanRemoveElementWithValidKey(): void
    {
        $collection = new HoplonCollection();
        $collection->Add('foo', 42, 'bar');

        $this->assertTrue($collection->RemoveElement('foo'));

        $list = $collection->Get('foo', 0, 0);

        $this->assertFalse($list);
    }

    public function testCannotRemoveElementWithInvalidKey(): void
    {
        $collection = new HoplonCollection();
        $collection->Add('foo', 42, 'bar');

        $this->assertFalse($collection->RemoveElement('bar'));

        $list = $collection->Get('foo', 0, -1);

        $this->assertCount(1, $list);
    }

    public function testCanRemoveValuesFromSubIndexWithValidKeyAndValidSubIndex(): void
    {
        $collection = new HoplonCollection();
        $collection->Add('foo', 42, 'bar');

        $this->assertTrue($collection->RemoveValuesFromSubIndex('foo', 42));

        $list = $collection->Get('foo', 0, 0);

        $this->assertCount(0, $list);
    }

    public function testCannotRemoveValuesFromSubIndexWithValidKeyAndInvalidSubIndex(): void
    {
        $collection = new HoplonCollection();
        $collection->Add('foo', 42, 'bar');

        $this->assertFalse($collection->RemoveValuesFromSubIndex('foo', 0));

        $list = $collection->Get('foo', 0, 0);

        $this->assertCount(1, $list);
    }

    public function testCannotRemoveValuesFromSubIndexWithInvalidKeyAndValidSubIndex(): void
    {
        $collection = new HoplonCollection();
        $collection->Add('foo', 42, 'bar');

        $this->assertFalse($collection->RemoveValuesFromSubIndex('x', 42));

        $list = $collection->Get('foo', 0, 0);

        $this->assertCount(1, $list);
    }

    public function testCannotRemoveValuesFromSubIndexWithInvalidKeyAndInvalidSubIndex(): void
    {
        $collection = new HoplonCollection();
        $collection->Add('foo', 42, 'bar');

        $this->assertFalse($collection->RemoveValuesFromSubIndex('x', 0));

        $list = $collection->Get('foo', 0, 0);

        $this->assertCount(1, $list);
    }
}
