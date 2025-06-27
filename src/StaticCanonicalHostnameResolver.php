<?php
declare(strict_types=1);

namespace Plaisio\CanonicalHostnameResolver;

/**
 * A CanonicalHostnameResolver with static hostname.
 */
class StaticCanonicalHostnameResolver implements CanonicalHostnameResolver
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * The canonical hostname.
   *
   * @var string
   */
  public string $canonicalHostname;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Object constructor.
   *
   * @param string $hostname The canonical hostname.
   *
   * @api
   * @since 1.0.0
   */
  public function __construct(string $hostname)
  {
    // Remove port number, if any.
    $p = strpos($hostname, ':');
    if ($p!==false)
    {
      $hostname = substr($hostname, 0, $p);
    }

    $this->canonicalHostname = strtolower(trim($hostname));
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
