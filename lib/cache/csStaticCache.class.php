<?php

/**
 * Keeps the added keys statically
 * 
 * @author Martinescu Petrica
 */
class csStaticCache extends sfCache {
  
  static $cache = array();
  
  /**
   * @see sfCache
   */
  public function get($key, $default = null)
  {
    if ($this->has($key)) return self::$cache[$key];
    
    return $default;
  }

  /**
   * @see sfCache
   */
  public function has($key)
  {
    return isset(self::$cache[$key]);
  }

  /**
   * @see sfCache
   */
  public function set($key, $data, $lifetime = null)
  {
    self::$cache[$key] = $data;
  }

  /**
   * @see sfCache
   */
  public function remove($key)
  {
    unset(self::$cache[$key]);
  }

  /**
   * @see sfCache
   */
  public function removePattern($pattern)
  {
    return true;
  }

  /**
   * @see sfCache
   */
  public function clean($mode = self::ALL)
  {
    self::$cache = array();
  }

  /**
   * @see sfCache
   */
  public function getLastModified($key)
  {
    return 0;
  }

  /**
   * @see sfCache
   */
  public function getTimeout($key)
  {
    return 0;
  }
  
}