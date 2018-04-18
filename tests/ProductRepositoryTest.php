<?php
use PHPUnit\Framework\TestCase;

final class ProductRepositoryTest extends TestCase
{
  public function testMockProducts() {
    $productRepository = new ProductRepository();
    $this->assertEquals(
        10,
        count($productRepository->getAllMockProducts())
    );
  }

  public function testMockProductName() {
    $items = ['iPhone', 'Macbook', 'Galaxy Note 5', 'iPhone X'];
    $productRepository = new ProductRepository();
    $this->assertContains( $productRepository->getAllMockProducts()[0]->name, $items );
  }

  public function testMockProductId() {
    $productRepository = new ProductRepository();
    $id = $productRepository->getAllMockProducts()[0]->id;
    $this->assertEquals($id > 1000 && $id < 10000 , true);
  }

  public function testMockProductId_1() {
    $productRepository = new ProductRepository();
    $id = $productRepository->getAllMockProducts()[0]->id;
    $this->assertEquals($id > 1000 && $id < 10000 , true);
  }
  
  public function testMockProductId_2() {
    $productRepository = new ProductRepository();
    $id = $productRepository->getAllMockProducts()[0]->id;
    $this->assertEquals($id > 1000 && $id < 10000 , true);
  }

  /*
  public function testCannotGetProductOutRange(): void
  {
    $this->expectException(Exception::class);
    $productRepository = new ProductRepository();
    $product = $productRepository->getAllMockProducts()[10];
  }
  */
}
