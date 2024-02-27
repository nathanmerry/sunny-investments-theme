<?php

namespace StockBrokersTheme\Blocks;

class ComparisonTable extends AbstractBlock
{
  protected $blockName = 'sb-comparison-table';

  public function register(): AbstractBlock
  {
    acf_register_block_type([
      'name' => $this->blockName,
      'title' => 'SB - Comparison Table',
      'description' => 'A comparison table block.',
      'category' => 'sb-blocks',
      'icon' => 'list-view',
      'render_callback' => [$this, 'render'],
      'supports' => ['align' => false],
    ]);

    return $this;
  }

  public function registerFields(): AbstractBlock
  {
    acf_add_local_field_group([
      'key' => 'sb_block_field_group_comparison_table',
      'title' => 'Comparison Table Options',
      'fields' => [
        [
          'key' => 'sb_block_field_comparison_table_rows',
          'name' => 'rows',
          'label' => 'Rows',
          'type' => 'repeater',
          'layout' => 'block',
          'sub_fields' => [
            [
              'key' => 'sb_block_field_comparison_table_rows_partner',
              'name' => 'partner',
              'label' => 'Partner',
              'type' => 'post_object',
              'post_type' => 'sb-partner'
            ],
            [
              'key' => 'sb_partner_field_key_features_new',
              'name' => 'keyFeatures',
              'label' => 'Key Features',
              'type' => 'repeater',
              'required' => true,
              'button_label' => 'Add Key Feature',
              'sub_fields' => [
                [
                  'key' => 'sb_partner_field_key_features_item',
                  'name' => 'item',
                  'label' => 'Item',
                  'type' => 'text'
                ],
              ]
            ],
            [
              'key' => 'sb_partner_field_min_deposit',
              'name' => 'minDeposit',
              'label' => 'Min. Deposit',
              'type' => 'text',
              'required' => true,
              'instructions' => 'Include the currency symbol.'
            ],
            [
              'key' => 'sb_partner_field_min_deposit_text',
              'name' => 'minDepositText',
              'label' => 'Min. Deposit Text',
              'type' => 'text',
              'instructions' => 'Without value and the currency symbol.'
            ],
            [
              'key' => 'sb_partner_field_min_deposit_value',
              'name' => 'minDepositValue',
              'label' => 'Min. Deposit Value',
              'type' => 'number',
              'instructions' => 'Just a number'
            ],
            [
              'key' => 'sb_partner_field_legal_disclaimer',
              'name' => 'legalDisclaimer',
              'label' => 'Legal Disclaimer',
              'type' => 'textarea',
              'required' => true
            ],
            [
              'key' => 'sb_partner_field_cta_text',
              'name' => 'ctaText',
              'label' => 'CTA Text',
              'type' => 'text',
              'required' => true
            ],
          ]
        ],
        [
          'key' => 'sb_block_field_comparison_table_design',
          'name' => 'isCompetitorDesign',
          'label' => 'Use Competitor Design?',
          'type' => 'true_false',
          'ui' => 1
        ],
        [
          'key' => 'sb_block_field_comparison_table_featured',
          'name' => 'isFeatured',
          'label' => 'Featured Table Row',
          'type' => 'true_false',
          'instructions' => 'All rows in that table will contain a star instead of a number of the row.',
          'ui' => 1,
          'conditional_logic' => [
            [
              [
                'field' => 'sb_block_field_comparison_table_design',
                'operator' => '==',
                'value' => 1
              ],
            ],
          ]
        ]
      ],
      'location' => [
        [
          [
            'param' => 'block',
            'operator' => '==',
            'value' => 'acf/' . $this->blockName,
          ],
        ],
      ],
    ]);

    return $this;
  }

  public function render($block, $content = '', $isPreview = false, $postId = 0)
  {
    global $GLOBALS;

    $options = get_fields();
    $options['isBlock'] = true;
    $isCompetitorDesign = $options['isCompetitorDesign'] ?? false;

    if ($isCompetitorDesign) {
      echo $GLOBALS['blade']->run('blocks.comparison-table-v2', [
        'options' => $options,
      ]);
    } else {
      echo $GLOBALS['blade']->run('blocks.comparison-table', [
        'options' => $options,
      ]);
    }
  }
}