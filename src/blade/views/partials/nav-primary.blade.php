<nav class="bg-white shadow">
  <div class="container w-full flex items-center">
    <div class="font-bold py-2">
      @php
      $custom_logo_id = get_theme_mod('custom_logo');
      $logo = wp_get_attachment_image_src($custom_logo_id , 'full');
      @endphp
      @if(has_custom_logo())
      <img src="{{ esc_url($logo[0]) }}" alt="{{ esc_attr(get_bloginfo('name')) }}" height="40" style="height: 40px;">
      {{-- <img src="/wp-content/uploads/logo.png" alt="logo" height="40" style="height: 40px"> --}}
      @else
        <span>{{ get_bloginfo('name') }}</span>
      @endif
    </div>
    <style>
      .flex-grow {
        flex-grow: 1;
      }

      .justify-end {
        justify-content: flex-end;
      }

      .items-center {
        align-items: center;
      }

      .text-700 {
        font-weight: 700;
      }

      #nav-main a {
        padding: 0.25rem 1rem;
      }

      .px-1 {
        padding-left: 0.25rem;
        padding-right: 0.25rem;
      }

      .hidden {
        display: none;
      }

      @media (min-width: 768px) {
        .md\:flex {
          display: flex;
        }
      }

      .hamb-menu__box {
        display: inline-block;
        height: 24px;
        position: relative;
        width: 30px;
      }

      .hamb-menu {
        background-color: transparent;
        border: 0;
        cursor: pointer;
        overflow: visible;
        transition-duration: .15s;
        transition-property: all;
        transition-timing-function: linear;
      }

      .hamb-menu__inner,
      .hamb-menu__inner:after,
      .hamb-menu__inner:before {
        background-color: #fff;
        border-radius: 4px;
        height: 3px;
        left: 0;
        position: absolute;
        transition-duration: .15s;
        transition-property: transform;
        transition-timing-function: ease;
        width: 30px;
        content: '';
      }

      .hamb-menu__inner:before {
        content: "";
        display: block;
        top: -10px;
        transition: top .12s cubic-bezier(.33333, .66667, .66667, 1) .2s, transform .13s cubic-bezier(.55, .055, .675, .19);
      }

      .hamb-menu__inner:after {
        bottom: -10px;
        content: "";
        display: block;
        top: -20px;
        transition: top .2s cubic-bezier(.33333, .66667, .66667, 1) .2s, opacity .1s linear;
      }

      .hamb-menu__inner {
        bottom: 0;
        top: auto;
        transition-delay: .13s;
        transition-duration: .13s;
        transition-timing-function: cubic-bezier(.55, .055, .675, .19);
      }

      @media (min-width: 768px) {
        .md\:hidden {
          display: none;
        }
      }
    </style>
    @if (get_field('showTopMenu'))
    <div class="flex md:hidden flex-grow justify-end px-4">
      <button type="button" class="p-2 hamb-menu" @click="menuOpen = !menuOpen">
        <span class="hamb-menu__box">
          <span class="hamb-menu__inner"></span>
        </span>
      </button>
    </div>
    <nav id="nav-main" class="hidden md:flex flex-grow justify-end px-4" role="navigation">
      {!!
      wp_nav_menu([
      'container' => 'ul',
      'menu_class' => 'flex text-700 text-white',
      'theme_location' => 'primary'
      ])
      !!}
    </nav>
    @endif
  </div>
</nav>