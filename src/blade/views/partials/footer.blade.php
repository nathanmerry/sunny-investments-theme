{!! wp_footer() !!}

<footer class="bg-black text-grey-lighter py-4 mt-6 color-blue">
  <div class="container">
    {!!
    wp_nav_menu([
    'theme_location' => 'footer',
    'container_class' => 'sb-footer-menu',
    'items_wrap' => '<ul id="%1$s" class="mb-3 %2$s">%3$s</ul>'
    ])
    !!}
    <div class="text-grey text-sm">
      {{ get_field('legalContent', 'option') }}
    </div>
  </div>
</footer>
