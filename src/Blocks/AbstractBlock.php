<?php

namespace StockBrokersTheme\Blocks;

abstract class AbstractBlock
{
  protected $blockName = null;

  abstract public function register(): AbstractBlock;
  abstract public function registerFields(): AbstractBlock;
  abstract public function render($block, $content = '', $isPreview = false, $postId = 0);
}
