<?php

use hoplon\HoplonCollection;
use PHPUnit\Framework\TestCase;

final class ExemploUsoTest extends TestCase
{
    public function testExemplo1(): void
    {
        $collection = new HoplonCollection();

        $collection->Add('ano.nascimento', 1980, 'pedro');
        $collection->Add('ano.nascimento', 1980, 'maria');
        $collection->Add('ano.nascimento', 1980, 'joao');
        $collection->Add('ano.nascimento', 1975, 'rodrigo');

        $nascimentos = $collection->Get('ano.nascimento', 0, -1);

        $this->assertCount(4, $nascimentos);
        $this->assertEquals('rodrigo', $nascimentos[0]);
        $this->assertEquals('joao', $nascimentos[1]);
        $this->assertEquals('maria', $nascimentos[2]);
        $this->assertEquals('pedro', $nascimentos[3]);
    }

    public function testExemplo2(): void
    {
        $collection = new HoplonCollection();

        $collection->Add('chave', 1, 'c');
        $collection->Add('chave', 1, 'b');
        $collection->Add('chave', 1, 'a');

        $list = $collection->Get('chave', 0, 0);

        $this->assertCount(1, $list);
        $this->assertEquals('a', $list[0]);

        $list = $collection->Get('chave', 0, -2);

        $this->assertCount(2, $list);
        $this->assertEquals('a', $list[0]);
        $this->assertEquals('b', $list[1]);

        $collection->Add('chave', 0, 'x');

        $list = $collection->Get('chave', 0, 0);

        $this->assertCount(1, $list);
        $this->assertEquals('x', $list[0]);
    }
}
