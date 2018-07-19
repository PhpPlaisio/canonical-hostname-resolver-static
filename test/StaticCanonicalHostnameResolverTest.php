<?php
declare(strict_types=1);

namespace SetBased\Abc\CanonicalHostnameResolver\Test;

use PHPUnit\Framework\TestCase;
use SetBased\Abc\CanonicalHostnameResolver\StaticCanonicalHostnameResolver;

/**
 * Test cases for class StaticCanonicalHostnameResolver.
 */
class StaticCanonicalHostnameResolverTest extends TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test method getCanonicalHostname without port number.
   */
  public function testGetDomain1a()
  {
    $resolver = new StaticCanonicalHostnameResolver('www.example.com');

    $this->assertSame('www.example.com', $resolver->getCanonicalHostname());
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test method getCanonicalHostname without port number anf host name in upper case.
   */
  public function testGetDomain1b()
  {
    $resolver = new StaticCanonicalHostnameResolver('www.EXAMPLE.COM');

    $this->assertSame('www.example.com', $resolver->getCanonicalHostname());
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test method getCanonicalHostname with trailing and leading whitespace.
   */
  public function testGetDomain1c()
  {
    $resolver = new StaticCanonicalHostnameResolver(" www.example.com\t\n\r");

    $this->assertSame('www.example.com', $resolver->getCanonicalHostname());
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test method getCanonicalHostname with port number
   */
  public function testGetDomain2()
  {
    $resolver = new StaticCanonicalHostnameResolver('www.example.com:8080');

    $this->assertSame('www.example.com', $resolver->getCanonicalHostname());
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
