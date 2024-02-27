<div class="sb-block">
  @if(isset($options['rows']))
  <div class="sb-partner-table rounded">

    <div class="sb-partner-table__rows">
      @foreach($options['rows'] as $i => $row)

      @php
      $partner = $row['partner'];
      $logo = wp_get_attachment_image_src( get_post_thumbnail_id( $partner->ID ), 'logo' );
      $rating = get_field('rating', $partner);
      $keyFeatures = get_field('keyFeatures', $partner);
      $minDeposit = get_field('minDeposit', $partner);
      $legalDisclaimer = get_field('legalDisclaimer', $partner);
      $ctaText = get_field('ctaText', $partner);
	    $loopIndex = $loop->index;
      @endphp

      <div class="
        sb-partner-table__grid sb-partner-table__row
        @if ($loop->index%2) bg-grey-lightest @else bg-white @endif
        @if ($loop->index === 0) rounded-t @endif
        @if ($loop->index === count($options['rows']) -1) rounded-b @endif
      ">
        <!-- Logo -->
        <div class="sb-partner-table__gridItem sb-partner-table__itemLogo">
          <div class="p-2">
            <a href="/visit/{{ $partner->post_name }}" rel="noreferer noopener" target="_blank">
              <img src="{{ $logo[0] }}" alt="{{ $partner->post_name }}" class="block w-full rounded h-24 logo">
            </a>
          </div>
        </div>
        <!-- End Logo -->

        <!-- Rating -->
        <div class="sb-partner-table__gridItem sb-partner-table__itemRating rating">
          @php
            $pos1 = 100;
            $pos2 = 83;
            $pos3 = 76;
            $pos4 = 68;
            $pos5 = 61;
            $pos6 = 56;
          @endphp
          @switch($loopIndex)
          @case(0)
            <div class="text-orange text-xl md:text-lg bolder">{{$pos1}}</div>
            <div class="text-orange text-lg">
              @for ($i = 0; $i < $pos1/20; $i++)
                <span class="sb-partner-table__star">&#9733;</span>
              @endfor
            </div>
          @break
          @case(1)
            <div class="text-orange text-xl md:text-lg bolder">{{$pos2}}</div>
            <div class="text-orange text-lg">
              @for ($i = 0; $i < $pos2/20; $i++)
                <span class="sb-partner-table__star">&#9733;</span>
              @endfor
            </div>
          @break
          @case(2)
            <div class="text-orange text-xl md:text-lg bolder">{{$pos3}}</div>
            <div class="text-orange text-lg">
              @for ($i = 0; $i < $pos3/20; $i++)
                <span class="sb-partner-table__star">&#9733;</span>
              @endfor
            </div>
          @break
          @case(3)
            <div class="text-orange text-xl md:text-lg bolder">{{$pos4}}</div>
            <div class="text-orange text-lg">
              @for ($i = 0; $i < $pos4/20; $i++)
                <span class="sb-partner-table__star">&#9733;</span>
              @endfor
            </div>
          @break
          @case(4)
            <div class="text-orange text-xl md:text-lg bolder">{{$pos5}}</div>
            <div class="text-orange text-lg">
              @for ($i = 0; $i < $pos5/20; $i++)
                <span class="sb-partner-table__star">&#9733;</span>
              @endfor
            </div>
          @break
          @default()
            <div class="text-orange text-xl md:text-lg bolder">{{$pos6}}</div>
            <div class="text-orange text-lg">
              @for ($i = 0; $i < $pos6/20; $i++)
                <span class="sb-partner-table__star">&#9733;</span>
              @endfor
            </div>
          @endswitch()
        </div>
        <!-- End Rating -->

        <!-- Min Deposit -->
        <div class="sb-partner-table__gridItem sb-partner-table__itemMinDeposit min_deposit">
          <div class="-mt-2 min_deposit_div text-lg" style="font-size: 16px;">
            {{ $minDeposit }}
          </div>
        </div>
        <!-- End Min Deposit -->

        <!-- Key Features -->
        <div class="sb-partner-table__gridItem sb-partner-table__itemKeyFeatures features">
          <div class="flex flex-wrap flex-col p-2">
            @foreach($keyFeatures as $keyFeature)
            <div class="flex text-sm">
              <span class="text-green mr-1">&#10004;</span>
              <span>{{ $keyFeature['item'] }}</span>
            </div>
            @endforeach
          </div>
        </div>
        <!-- End Key Features -->

        <!-- Cta -->
        <div class="sb-partner-table__gridItem sb-partner-table__itemCta cta">
          <div class="px-2 pb-2 lg:pt-2">
            <a href="/visit/{{ $partner->post_name }}" rel="noreferer noopener" target="_blank"
              class="block bg-green rounded text-center text-white font-semibold px-4 py-2 hover:bg-green-accent">
              {{$ctaText}}
            </a>
          </div>
        </div>
        <!-- End Cta -->

        <!-- Disclaimer -->
        @if ($legalDisclaimer)
        <div class="sb-partner-table__gridItem sb-partner-table__itemDisclaimer">
          <div class="text-xs px-2 pb-2" style="text-align: center; font-style: italic;">
            <div class="bg-grey-lighter rounded p-1">
              {{ $legalDisclaimer }}
            </div>
          </div>
        </div>
        @endif
        <!-- End Disclaimer -->
      </div>

      @endforeach
    </div>
  </div>

  @else
  No rows in table.
  @endif
</div>
