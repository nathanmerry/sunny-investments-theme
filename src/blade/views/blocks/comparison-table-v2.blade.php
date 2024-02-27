@php
  $pageFields = get_fields(get_the_id());
@endphp
<div class="sb-block">
  @if (isset($options['rows']))
    <div class="bg-white">
      <div class="sb-partner-table__rows">
        @php
          $currencySymbol = getCurrencySymbol();
        @endphp
        @foreach ($options['rows'] as $i => $row)
          @php
            $partner = $row['partner'];
            $logo = wp_get_attachment_image_src(get_post_thumbnail_id($partner->ID), 'logo');

            // $rating = get_field('rating', $partner);
            // $keyFeatures = get_field('keyFeatures', $partner);
            // $minDeposit = get_field('minDeposit', $partner);
            // $minDepositText = get_field('minDepositText', $partner);
            // $minDepositValue = get_field('minDepositValue', $partner);
            // $legalDisclaimer = get_field('legalDisclaimer', $partner);
            // $ctaText = get_field('ctaText', $partner);

            $slug = get_field('partnerSlug', $partner);
            $keyFeatures = $row['keyFeatures'] ?? [] ? $row['keyFeatures'] : get_field('keyFeatures', $partner);
            $minDeposit = $row['minDeposit'] ? $row['minDeposit'] : get_field('minDeposit', $partner);
            $minDepositText = $row['minDepositText'] ? $row['minDepositText'] : get_field('minDepositText', $partner);
            $minDepositValue = $row['minDepositValue'] ? $row['minDepositValue'] : get_field('minDepositValue', $partner);
            $legalDisclaimer = $row['legalDisclaimer'] ? $row['legalDisclaimer'] : get_field('legalDisclaimer', $partner);
            $ctaText = $row['ctaText'] ? $row['ctaText'] : get_field('ctaText', $partner);

			if ($pageFields['trackingBaseUrl'] ?? null && $slug) {
                $queryString = http_build_query([
                    'gclid' => do_shortcode('[gclid]'),
                    'funnel' => $slug,
                ]);
                $visitLink = $pageFields['trackingBaseUrl'] . '?' . $queryString;
            } else {
                $queryString = http_build_query([
					'gclid' => do_shortcode('[gclid]')
                ]);
 				$visitLink = '/visit/' . $partner->post_name . '?' . $queryString;
            }

            $loopIndex = $loop->index;
          @endphp

          <div class="flex flex-wrap"
            style="border: 1px solid #e7e5e4; padding: 1rem 0.5rem; background-color: @if ($loop->index % 2 === 0) #fff; @else #f5f5f4; @endif">
            <!-- Number -->
            <div class="items-center justify-center font-bold comp-table-v2-number"
              style="color: @if ($loop->index === 0) #d97706; @else #57534e; @endif">
              @if (isset($options['isFeatured']) && $options['isFeatured'])
                <span class="sb-partner-table__star">&#9733;</span>
              @else
                <span>{{ $loop->index + 1 }}</span>
              @endif
            </div>
            <!-- Logo -->
            <div class="flex items-center comp-table-v2-logo">
              <div class="p-2 bg-white" style="border: 1px solid #e7e5e4;">
                <a href="{{ $visitLink }}" rel="noreferer noopener" target="_blank">
                  <img src="{{ $logo[0] }}" alt="{{ $partner->post_name }}" class="block w-full">
                </a>
              </div>
            </div>
            <!-- End Logo -->

            <!-- Min Deposit -->
            <div class="comp-table-v2-deposit" class="flex items-center">
              <div class="flex flex-col items-center w-1/2 leading-6"
                style="width: 50%; flex-direction: column; line-height: 1.5rem; justify-content: center;">
                <div style="font-size: 14px;">{{ $minDepositText }}</div>
                <div style="line-height: 2.25rem; font-size: 1.5rem; font-weight: bold;">
                  @if ($currencySymbol !== '€')
                    {{ $currencySymbol }}&nbsp;
                  @endif{{ $minDepositValue }}
                  @if ($currencySymbol === '€')
                    &nbsp;{{ $currencySymbol }}
                  @endif
                </div>
              </div>
              <div class="flex flex-col items-center w-1/2 leading-6"
                style="width: 50%; flex-direction: column; line-height: 1.5rem; justify-content: center;">
                <!-- Rating -->
                <div style="padding: 5px 0; font-size: 20px;">
                  <div style="font-size: 14px; text-align: center;">User Rating</div>
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
                      <div
                        style="color: #2563eb; font-weight: bold; font-size: 1.875rem; line-height: 2.25rem; text-align: center;">
                        {{ $pos1 / 10 }}</div>
                      <div class="text-lg text-orange">
                        @for ($i = 0; $i < $pos1 / 20; $i++)
                          <span class="sb-partner-table__star">&#9733;</span>
                        @endfor
                      </div>
                    @break

                    @case(1)
                      <div
                        style="color: #2563eb; font-weight: bold; font-size: 1.875rem; line-height: 2.25rem; text-align: center;">
                        {{ $pos2 / 10 }}</div>
                      <div class="text-lg text-orange">
                        @for ($i = 0; $i < $pos2 / 20; $i++)
                          <span class="sb-partner-table__star">&#9733;</span>
                        @endfor
                      </div>
                    @break

                    @case(2)
                      <div
                        style="color: #2563eb; font-weight: bold; font-size: 1.875rem; line-height: 2.25rem; text-align: center;">
                        {{ $pos3 / 10 }}</div>
                      <div class="text-lg text-orange">
                        @for ($i = 0; $i < $pos3 / 20; $i++)
                          <span class="sb-partner-table__star">&#9733;</span>
                        @endfor
                      </div>
                    @break

                    @case(3)
                      <div
                        style="color: #2563eb; font-weight: bold; font-size: 1.875rem; line-height: 2.25rem; text-align: center;">
                        {{ $pos4 }}</div>
                      <div class="text-lg text-orange">
                        @for ($i = 0; $i < $pos4 / 20; $i++)
                          <span class="sb-partner-table__star">&#9733;</span>
                        @endfor
                      </div>
                    @break

                    @case(4)
                      <div
                        style="color: #2563eb; font-weight: bold; font-size: 1.875rem; line-height: 2.25rem; text-align: center;">
                        {{ $pos5 }}</div>
                      <div class="text-lg text-orange">
                        @for ($i = 0; $i < $pos5 / 20; $i++)
                          <span class="sb-partner-table__star">&#9733;</span>
                        @endfor
                      </div>
                    @break

                    @default()
                    <div
                      style="color: #2563eb; font-weight: bold; font-size: 1.875rem; line-height: 2.25rem; text-align: center;">
                      {{ $pos6 }}</div>
                    <div class="text-lg text-orange">
                      @for ($i = 0; $i < $pos6 / 20; $i++)
                        <span class="sb-partner-table__star">&#9733;</span>
                      @endfor
                    </div>
                  @endswitch()
                </div>
                <!-- End Rating -->
              </div>
            </div>
            <!-- End Min Deposit -->

            <!-- Key Features -->
            <div class="comp-table-v2-key-features">
              <div>
                @if ($keyFeatures && count($keyFeatures))
                  @foreach ($keyFeatures ?? [] as $index => $keyFeature)
                    <div class="flex items-center text-sm" style="padding: 2px 0;">
                      @php
                        $color = '';
                        $icon = '';
                        switch ($index) {
                            case 0:
                                $color = '#DD9933';
                                $icon = 'cash';
                                break;
                            case 1:
                                $color = '#002C7A';
                                $icon = 'lightbulb';
                                break;
                            case 2:
                                $color = '#A32222';
                                $icon = 'growth';
                                break;
                            case 3:
                                $color = '#3F37B2';
                                $icon = 'stats';
                                break;
                        }
                      @endphp
                      <svg width="0" height="0" style="display: none;">
                        <symbol version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512"
                          viewBox="0 0 512 512" id="lightbulb">
                          <g>
                            <g>
                              <path
                                d="m256,92.3c-74.2,0-127.8,55.3-136.3,114.7-5.3,39.6 7.5,78.2 34.1,107.4 23.4,25 36.2,58.4 36.2,92.8l-.1,54.2c0,21.9 18.1,39.6 40.5,39.6h52.2c22.4,0 40.5-17.7 40.5-39.6l.1-54.2c0-35.4 11.7-67.8 34.1-90.7 24.5-25 37.3-57.3 37.3-90.7-0.1-74.1-63-133.5-138.6-133.5zm46.8,369.1c0,10.4-8.5,18.8-19.2,18.8h-52.2c-10.7,0-19.2-8.3-19.2-18.8v-24h90.5v24zm39.6-159.5c-26.6,27.1-40.5,64.6-40.5,105.3v9.4h-90.5v-9.4c0-38.6-16-77.1-42.6-106.3-23.4-25-33-57.3-28.8-90.7 7.5-50 54-97 116.1-97 65,0 117.2,51.1 117.2,112.6 0,28.1-10.7,55.2-30.9,76.1z">
                              </path>
                              <rect width="21.3" x="245.3" y="11" height="50"></rect>
                              <polygon points="385.1,107.4 400,122.3 436.5,87.2 421.5,72.3   "></polygon>
                              <rect width="52.2" x="448.8" y="236.2" height="20.9"></rect>
                              <rect width="52.2" x="11" y="236.2" height="20.9"></rect>
                              <polygon points="90.1,72.2 75.1,87.1 111.6,122.2 126.5,107.3   "></polygon>
                            </g>
                          </g>
                        </symbol>
                        <symbol version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512"
                          viewBox="0 0 512 512" id="gift">
                          <g>
                            <path
                              d="m393.2,105.9c9.3-10 15.1-23.6 15.1-38.6 0-31.3-25-56.3-55.3-56.3-23,0-76,34.4-97.2,65.3-21.9-30.9-74.7-64.3-96.8-64.3-30.2,0-55.3,25-55.3,56.3 0,14.5 5.4,27.6 14.1,37.5h-106.8v134.5h29.2v260.7h153.3 125.1 153.3v-260.6h29.1v-134.5h-107.8zm-40.2-74c18.8-7.10543e-15 34.4,15.6 34.4,36.5 0,17.6-12.3,32.7-28.2,35.9h-84.6c-5.4-1.6-7.1-3.5-7.1-4.6 0-17.8 62.5-67.8 85.5-67.8zm-194-0c21.9,0 85.5,50 85.5,67.8 0,1.6-3.7,3.4-6.4,4.6h-85.2c-15.9-3.2-28.2-18.3-28.2-35.9-0.1-19.9 15.6-36.5 34.3-36.5zm34.4,448.2h-132.4v-239.7h132.4v239.7zm0-259.5h-161.5v-93.8h161.6v93.8zm104.2,259.5h-83.4v-353.4h83.4v353.4zm153.3,0h-132.4v-239.7h132.4v239.7zm29.1-259.5h-161.5v-93.8h161.6v93.8z">
                            </path>
                          </g>
                        </symbol>
                        <symbol version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512"
                          viewBox="0 0 512 512" id="cash">
                          <g>
                            <g>
                              <path
                                d="M371.9,144L475,171.1L501,68l-19.8-5.2l-16.9,64.3C421.1,57.4,344,11,256,11C120.7,11,11,120.7,11,256    c0,135.3,109.7,245,245,245c90.3,0,169.1-48.8,211.6-121.5l-17.7-9.6c-39.1,66.4-111.3,111-193.9,111    C131.8,480.9,31.1,380.2,31.1,256S131.8,31.1,256,31.1c83.3,0,156.1,45.3,194.9,112.7l-73.8-19.6L371.9,144z">
                              </path>
                              <path
                                d="m266.8,364.7v-18.7c17.7-1 31.2-6.2 41.6-15.6s15.6-21.9 15.6-36.4c0-15.6-4.2-27.1-13.5-34.4-9.4-8.3-22.9-14.6-42.7-18.7h-1v-47.9c13.5,2.1 25,6.2 36.4,14.6l16.7-22.9c-16.7-11.5-34.4-17.7-53.1-18.7v-12.5h-15.6v12.5c-15.6,1-29.2,6.2-39.6,15.6-10.4,9.4-15.6,21.9-15.6,36.4s4.2,26 13.5,33.3c8.3,7.3 22.9,13.5 41.6,17.7v48.9c-14.6-2.1-29.2-9.4-43.7-21.9l-18.7,21.9c18.7,16.7 39.6,26 62.5,28.1v18.7h15.6zm1-90.6c10.4,3.1 16.7,6.2 20.8,9.4 3.1,4.2 5.2,8.3 5.2,14.6s-2.1,10.4-7.3,14.6c-5.2,4.2-11.5,6.2-18.7,7.3v-45.9zm-36.4-44.7c-3.1-3.1-5.2-8.3-5.2-13.5 0-6.2 2.1-10.4 6.2-14.6 5.2-4.2 10.4-6.2 18.7-7.3v44.8c-10.4-3.2-16.6-6.3-19.7-9.4z">
                              </path>
                            </g>
                          </g>
                        </symbol>
                        <symbol version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512"
                          viewBox="0 0 512 512" id="growth">
                          <g>
                            <g>
                              <path
                                d="m266.1,237.1h-82.2c-6.2,0-10.4,5.2-10.4,10.4v243c0,6.3 5.2,10.4 10.4,10.4h82.2c5.2,0 10.4-4.2 10.4-10.4v-243c0-6.2-5.2-10.4-10.4-10.4zm-10.4,243h-61.4v-222.1h61.4v222.1z">
                              </path>
                              <path
                                d="M103.7,272.6H21.5c-6.2,0-10.4,5.2-10.4,10.4v207.6c0,6.3,5.2,10.4,10.4,10.4h82.2c5.2,0,10.4-4.2,10.4-10.4V283    C114.1,276.7,108.9,272.6,103.7,272.6z M93.3,480.1H31.9V293.4h61.4V480.1z">
                              </path>
                              <path
                                d="m499.2,157.8l-103-142.9c-4.2-5.2-12.5-5.2-16.6,0l-103,142.9c-4.2,5.9-2.6,15.6 8.3,15.6h51v317.1c0,6.3 5.2,10.4 10.4,10.4h82.2c5.2,0 10.4-4.2 11.4-10.4v-317h51c10.2,0 12.4-10.4 8.3-15.7zm-70.8-5.2c-6.2,0-10.4,5.2-10.4,10.4v317.1h-61.4-1v-317.1c0-6.3-5.2-10.4-10.4-10.4h-41.6l83.2-114.7 83.2,114.7h-41.6z">
                              </path>
                            </g>
                          </g>
                        </symbol>
                        <symbol version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512"
                          viewBox="0 0 512 512" id="creditcard">
                          <g>
                            <path
                              d="M499.8,108c0-16.7-13.5-30.2-30.2-30.2H41.3c-16.7,0-30.2,13.5-30.2,30.2V404c0,16.7,13.5,30.2,30.2,30.2h429.3   c16.7,0,30.2-13.5,29.2-31.3V108z M480,210.2H32v-30.2H480V210.2z M30.9,109.1c0-6.3,5.2-10.4,10.4-10.4v-1h428.3   c6.3,0,10.4,5.2,10.4,10.4v52.1H30.9V109.1z M480,404c0,6.3-5.2,10.4-10.4,10.4H41.3c-6.3,0-10.4-5.2-10.4-10.4V231H480V404z">
                            </path>
                          </g>
                        </symbol>
                        <symbol version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512"
                          viewBox="0 0 512 512" id="tag">
                          <g>
                            <g>
                              <path
                                d="m121.5,64.2c-31.7,0-57.3,25.7-57.3,57.3 0,31.7 25.7,57.3 57.3,57.3 31.7,0 57.3-25.7 57.3-57.3 0.1-31.7-25.6-57.3-57.3-57.3zm0,94.3c-20.4,0-37-16.6-37-37s16.6-37 37-37c20.4,0 37,16.6 37,37s-16.5,37-37,37z">
                              </path>
                              <path
                                d="m244.5,29.8c-10.4-11.5-25-17.7-40.7-17.7l-107.3-1.1c-22.9,0-44.8,8.3-60.5,25-16.7,15.7-25,37.6-25,60.5l1,107.4c1,14.6 6.3,29.2 17.7,40.7l256.5,256.4 214.8-214.8-256.5-256.4zm40.7,442l-241.9-241.9c-7.3-7.3-11.5-16.7-11.5-27.1l-1-106.3c0-16.7 7.3-33.4 18.8-45.9 12.5-12.5 29.2-19.8 46.9-19.8l106.3,1c10.4,0 19.8,4.2 27.1,11.5l241.9,241.9-186.6,186.6z">
                              </path>
                            </g>
                          </g>
                        </symbol>
                        <symbol version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512"
                          viewBox="0 0 512 512" id="stats">
                          <g>
                            <g>
                              <polygon
                                points="166.3,286.2 251.8,372.8 412.2,214.3 411.3,314.4 432.2,314.4 433.2,177.8 297.7,176.8 297.7,197.6 398.9,198.5     252.9,343.6 166.3,257 30.8,395.7 45.4,410.3   ">
                              </polygon>
                              <polygon points="480.1,11 480.1,480.1 11,480.1 11,501 501,501 501,11   ">
                              </polygon>
                            </g>
                          </g>
                        </symbol>
                        <symbol version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512"
                          viewBox="0 0 512 512" id="money-bag">
                          <g>
                            <g>
                              <path
                                d="m294.7,129.7c19.2-23.1 32.1-74.5 37.7-99.9l4.2-18.8-70.1,30.2c-6.3,2.1-12.5,1-17.8-2.1-11.5-7.3-25.1-8.3-37.6-3.1l-37.6,16.7c-8.4,4.2-14.6,11.5-16.7,20.9-1,9.4 1,18.8 7.3,26.1 11.7,12.9 30.4,25.8 44.1,34.5-66.4,35.1-112.2,136.8-112.2,207.3 0,87.6 72.2,159.5 160,159.5 88.9,0 160-71.9 160-159.5 0-73.8-50.2-181.6-121.3-211.8zm-115-42.6c-2.1-2.1-3.1-5.2-2.1-8.3 0-2.1 2.1-5.2 5.2-6.3l37.6-16.7c5.2-3.1 12.5-2.1 17.8,1 10.5,7.3 24.1,8.3 36.6,3.1l33.5-14.6c-10.5,40.7-25.1,75.1-33.5,76.1v1.9c-6.2-1.3-12.4-1.9-18.8-1.9-8.6,0-17.1,1.2-25.3,3.5-11.2-6.3-37.2-22.3-51-37.8zm76.3,394.1c-77.4-5.68434e-14-140.1-62.6-140.1-139.7 0-77.1 63.8-200.2 140.1-200.2s140.1,123 140.1,200.2c0,77.1-62.7,139.7-140.1,139.7z">
                              </path>
                              <path
                                d="m299.9,312.3c-6.3-6.3-17.8-11.5-33.5-14.6h-1v-38.6c9.4,1 19.9,5.2 28.2,11.5l12.5-18.8c-13.6-8.3-27.2-13.6-41.8-14.6v-10.4h-12.5v10.4c-12.5,1-23,5.2-31.4,12.5-8.4,7.3-12.5,16.7-12.5,28.1s3.1,19.8 10.5,26.1c7.3,6.3 18.8,11.5 33.5,14.6v39.6c-11.5-2.1-23-8.3-34.5-17.7l-14.6,17.7c14.6,12.5 30.3,19.8 49.2,21.9v14.6h13.6v-14.6c13.6-1 24.1-5.2 32.4-12.5s12.5-16.7 12.5-28.1c-0.1-12.5-3.3-20.8-10.6-27.1zm-47-17.7c-8.4-2.1-12.5-4.2-15.7-7.3-3.1-2.1-4.2-6.3-4.2-10.4 0-5.2 2.1-8.3 5.2-11.5 3.1-3.1 7.3-5.2 14.6-5.2v34.4zm27.3,58.4c-4.2,3.1-8.4,5.2-15.7,6.3v-36.5c8.4,2.1 13.6,4.2 16.7,7.3 3.1,3.1 4.2,7.3 4.2,11.5 0,4.1-1.1,8.2-5.2,11.4z">
                              </path>
                            </g>
                          </g>
                        </symbol>
                        <symbol version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 490.615 490.615"
                          viewBox="0 0 490.615 490.615" id="percentage">
                          <g>
                            <path d="M0,475.876L475.525,0.351l14.425,14.425L14.425,490.301L0,475.876z">
                            </path>
                            <path
                              d="m106.915,212.908c58.7,0 106.3-47.6 106.3-106.3s-47.6-106.3-106.3-106.3-106.3,47.6-106.3,106.3 47.6,106.3 106.3,106.3zm0-192.5c47.6,1.42109e-14 86.2,38.6 86.2,86.2s-38.6,86.2-86.2,86.2-86.2-38.6-86.2-86.2 38.6-86.2 86.2-86.2z">
                            </path>
                            <path
                              d="m384.315,277.708c-58.7,0-106.3,47.6-106.3,106.3s47.6,106.3 106.3,106.3 106.3-47.6 106.3-106.3-47.6-106.3-106.3-106.3zm0,192.5c-47.6,0-86.2-38.6-86.2-86.2s38.6-86.2 86.2-86.2 86.2,38.6 86.2,86.2-38.6,86.2-86.2,86.2z">
                            </path>
                          </g>
                        </symbol>
                        <symbol version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512"
                          viewBox="0 0 512 512" id="diamond">
                          <g>
                            <path
                              d="m421.4,11.9h-330.8l-77,113.4 242.4,375.6 242.4-375.6-77-113.4zm-98.5,122.8l-66.9,301.7-67.9-301.7h134.8zm-125.7-19.8l59.2-76.2 59.2,76.2h-118.4zm138.9-7.3l-58.9-75.9h117.8l-58.9,75.9zm-159.2,1.1l-59.7-77h119.4l-59.7,77zm-21.4,6.2h-110.9l51.7-76.3 59.2,76.3zm12.9,19.8l66.5,297-191.3-297h124.8zm174.2,0h125.9l-193,299.4 67.1-299.4zm124.8-19.8h-110.8l59.2-76.2 51.6,76.2z">
                            </path>
                          </g>
                        </symbol>
                        <symbol version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512"
                          viewBox="0 0 512 512" id="balance">
                          <g>
                            <path
                              d="m266.4,401.1v-336.4h129.9c0,1.42109e-14-70.5,192.5-69.2,195.3 4.1,42.1 40.7,74.4 84.2,74.4 43.4,0 78.9-32.2 84-74.2 1.4-2.9-69.1-195.5-69.1-195.5h12.1v-21.5h-172v-32.2h-20.9v32.2h-172v21.5h12.2c0,0-69.6,189.1-69.6,191.3 2.1,44.1 39.6,78.4 84.4,78.4s82.4-34.4 85.5-78.4c0-1.3-70.5-191.3-70.5-191.3h129.9v336.3h-234.3v100h490v-99.9h-234.6zm144.9-88.1c-30.2,0-55.3-20.4-62.6-47.3h125.1c-7.2,26.8-32.2,47.3-62.5,47.3zm-60.4-67.7l60.5-161.2 59.4,161.2h-119.9zm-250.2,67.7c-30.2,0-55.3-20.4-62.6-47.3h125.1c-7.3,26.8-32.3,47.3-62.5,47.3zm-59.5-67.7l60.5-161.2 59.4,161.2h-119.9zm440,235.3h-449.3v-58h449.3v58z">
                            </path>
                          </g>
                        </symbol>
                        <symbol version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512"
                          viewBox="0 0 512 512" id="clock">
                          <g>
                            <g>
                              <g>
                                <g>
                                  <path
                                    d="M256,501C120.5,501,11,391.5,11,256S120.5,11,256,11s245,109.5,245,245S391.5,501,256,501z M256,31.9      C131.9,31.9,31.9,131.9,31.9,256S133,480.1,256,480.1c124.1,0,224.1-101.1,224.1-224.1C480.1,131.9,380.1,31.9,256,31.9z">
                                  </path>
                                </g>
                                <g>
                                  <polygon
                                    points="266.4,266.4 133,266.4 133,245.6 245.6,245.6 245.6,65.2 266.4,65.2     ">
                                  </polygon>
                                </g>
                              </g>
                            </g>
                          </g>
                        </symbol>
                        <symbol version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512"
                          viewBox="0 0 512 512" id="shield">
                          <g>
                            <path
                              d="m421.4,81.2c-85.3,0-165.4-69.7-165.4-69.7s-80.1,68.7-165.4,68.7c-27.7,0-46.8-5.2-46.8-5.2v136.3c0,54.1 16.6,107.2 48.9,152.9 32.3,44.7 85.3,105.1 159.2,135.2l4.2,1 4.2-2.1c72.8-29.1 126.9-89.5 159.2-135.2 32.3-44.7 48.9-97.8 48.9-152.9v-134.2c-0.2,0-23.5,5.2-47,5.2zm2.1,20.8c9.4,0 17.7-1 26-2.1v110.3c0,12.3-0.9,24.4-2.7,36.4h-181.4v-201.7c27.2,19.9 88.5,57.1 158.1,57.1zm-358.9-2.1c8.3,1 16.6,1 26,2.1 67.9,0 126.6-34.5 155-54.8v199.4h-178.3c-1.8-12-2.7-24.1-2.7-36.4v-110.3zm45.8,251.8c-18.9-26-32-54.9-39.3-85.3h174.5v207c-60.9-29.4-106.8-81.5-135.2-121.7zm293.3,0c-28.9,40.9-75.9,94.1-138.4,123.2v-208.5h177.7c-7.2,30.4-20.4,59.3-39.3,85.3z">
                            </path>
                          </g>
                        </symbol>
                        <symbol version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512"
                          viewBox="0 0 512 512" id="dartboard">
                          <g>
                            <path
                              d="m497.9,422.3l-57.2-57.5c-2.1-2.1-5.2-3.1-8.3-3.1l-43.9,5c33-37.9 53.2-87.3 53.2-141 0-118.2-96.7-214.5-215.3-214.5s-215.4,97.3-215.4,215.5 96.7,214.5 215.3,214.5c53.2,0 102.3-19.9 140.2-52.7l-5,43.3c0,3.1 1,6.3 3.1,8.4l57.2,57.5c6,6.5 16.7,4 17.7-7.3l5.2-46 46.8-5.2c8.3-0.9 13-10.4 6.4-16.9zm-466.1-195.6c-1.06581e-14-107.8 87.4-194.6 194.5-194.6s194.5,86.8 194.5,194.6c0,49.6-18.5,94.7-48.9,129l-34.8-34.8c21.7-25.5 34.9-58.7 34.9-95.2 0-80.6-65.5-146.5-145.6-146.5s-145.7,65.9-145.7,146.5c-1.42109e-14,80.6 65.5,146.5 145.6,146.5 36.8,0 70.6-13.7 96.3-36.5l34.8,34.8c-34.6,31.6-80.7,50.8-131.1,50.8-107.1,0-194.5-86.8-194.5-194.6zm257.7,46.6c9.9-13.1 15.9-29.2 15.9-46.6 0-42.9-35.4-78.5-79.1-78.5-43.7,0-79.1,35.6-79.1,78.5s35.4,78.5 79.1,78.5c18.1,0 35.1-6.5 48.7-17.1l33.6,33.6c-22,19-50.8,30.6-82.3,30.6-69.7,0-125.9-56.5-125.9-125.5 0-69 56.2-125.5 125.9-125.5 68.7,0 124.8,56.5 125.9,125.5 0,30.4-10.9,58.4-29.1,80.2l-33.6-33.7zm-41.3-41.4c-4.2-4.2-10.4-4.2-14.6,0-4.2,4.2-4.2,10.5 0,14.6l27.3,27.3c-9.7,7.2-21.6,11.4-34.6,11.4-32.2,0-58.3-26.2-58.3-58.6 0-32.4 26-58.6 58.3-58.6s58.3,26.2 58.3,58.6c0,11.9-3.5,22.9-9.5,32.1l-26.9-26.8zm134.2,196.7l3-30.2 39.3,39.3-2.8,29.6-39.5-38.7zm57.7-4.7l-38.6-38.6 26.7-2.7 39.5,38.7-27.6,2.6z">
                            </path>
                          </g>
                        </symbol>
                        <symbol version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512"
                          viewBox="0 0 512 512" id="cogwheel">
                          <g>
                            <line fill="none" y1="501" x1="303.1" y2="501" x2="302.1">
                            </line>
                            <g>
                              <path
                                d="m501,300.8v-91.7h-45.3c-5.3-22.4-14.3-43.3-26.4-62.1l32.9-32.7-64.9-64.6-33.4,33.3c-18.8-11.5-39.6-19.9-61.8-24.8v-47.2h-92.1v48.3c-22,5.4-42.6,14.4-61.1,26.4l-34.2-34-64.9,64.6 35.3,35.2c-2.8,4.6-5.3,9.2-7.7,14-7.5,14.3-13.2,30-17.1,45.7h-49.3v91.7h50.3c1.5,6 3.3,11.9 5.3,17.8 0.1,0.4 0.3,0.8 0.4,1.2 0,0.1 0.1,0.2 0.1,0.4 4.9,14.2 11.3,27.7 19.1,40.2l-35.5,35.3 64.9,64.6 35.1-34.9c18.3,11.5 38.6,20.2 60.2,25.4v48.1h91.1v-47.1c22.7-5 44-13.7 63.1-25.6l32.2,32 64.9-64.6-32.1-31.9c12-19.1 20.9-40.3 26-62.9h44.9zm-94.8,64l29.9,29.8-36.6,36.5-29.5-29.4c-24.7,18.9-54.4,31.7-86.7,36v42.4h-51.3v-42.7c-31.5-4.6-60.4-17.2-84.6-35.7l-31.6,31.5-36.6-36.5 32.4-31.3c-17.9-24-30-52.4-34.4-83.4h-45.3v-51.1h44l1.5-3.6c4.7-29.7 16.5-57.1 33.6-80.3l-32-31.9 36.6-36.5 31,31.9c24-18.5 52.8-31.2 84.1-36v-42.7h51.3v42.3c32,4.1 61.3,16.4 86,34.8l30.3-30.1 35.6,36.5-29.6,29.5c18.2,23.8 30.7,52.2 35.5,83.1h45.4v51.1h-44.7c-3.9,31.8-16.1,61.1-34.3,85.8z">
                              </path>
                              <path
                                d="m257,143.4c-61.8,0-113.1,50-113.1,112.6s51.4,112.6 113.1,112.6 113.1-51.1 113.1-112.6-51.3-112.6-113.1-112.6zm0,204.3c-51.3,0-92.1-40.7-92.1-91.7 0-51.1 41.9-91.7 92.1-91.7s92.1,40.7 92.1,91.7c0.1,51.1-41.8,91.7-92.1,91.7z">
                              </path>
                            </g>
                          </g>
                        </symbol>
                        <symbol version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512"
                          viewBox="0 0 512 512" id="umbrella">
                          <g>
                            <path
                              d="m264.3,27.1v-16.1h-20.9v16.2c-129.6,5.6-232.4,97-232.4,207.5v2.1l16.7-1.1c0-21.3 21.9-38.4 48-38.4 27.1,0 49,18.1 49,39.4h20.9c0-22.4 21.9-39.4 49-39.4s49,18.1 49,39.4v203.4c0,34.1 26.1,60.7 58.4,60.7s58.4-26.6 58.4-60.7h-20.9c0,21.3-16.7,39.4-37.5,39.4s-37.5-18.1-37.5-39.4v-203.6c0.2-22.2 22-39.1 49-39.1 27.1,0 49,18.1 49,39.4h20.9c0-22.4 21.9-39.4 49-39.4 26.1,0 48,17 48,38.4h20.6v-1.1c0-111.7-105-203.9-236.7-207.6zm166.8,149c-24,0-45.9,11.7-58.4,28.8-11.5-17-33.4-28.8-58.4-28.8-24,0-45.9,11.7-59.4,29.8-11.5-17-33.4-28.8-58.4-28.8-24,0-45.9,11.7-58.4,28.8-11.5-17-33.4-28.8-58.4-28.8-15.6,0-30.2,4.3-41.7,11.7 25-81 113.6-140.6 217.9-140.6s192.9,59.7 216.9,139.6c-11.4-7.4-26-11.7-41.7-11.7z">
                            </path>
                          </g>
                        </symbol>
                        <symbol version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512"
                          viewBox="0 0 512 512" id="time">
                          <g>
                            <g>
                              <path
                                d="M371.9,143.9L475,171l26-103.1l-19.8-5.2l-17,64.9C421.1,57.7,343.9,11.2,255.8,11.2C120.6,11.2,11,120.9,11,256.2    s109.6,245,244.8,245c90.2,0,169-48.8,211.5-121.5l-19.3-9.3c-39,65.5-110.4,109.4-192.1,109.4c-123.4,0-223.5-100.1-223.5-223.6    S132.4,32.5,255.8,32.5c82.2,0,154.1,44.4,192.9,110.6l-71.6-19L371.9,143.9z">
                              </path>
                              <polygon points="223,89.7 223,275.2 342.8,333.5 352.1,314.8 243.9,262.7 243.9,89.7   ">
                              </polygon>
                            </g>
                          </g>
                        </symbol>
                        <symbol version="1.1" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512"
                          viewBox="0 0 512 512" id="calendar">
                          <g>
                            <g>
                              <path
                                d="M422.8,82.4V11H402v71.4H110V11H89.2v71.4H11v134.2V501h490V216.6V82.4H422.8z M31.9,102.6h449.3v93.7H31.9V102.6z     M481.2,480.8H31.9V216.6h449.3V480.8z">
                              </path>
                              <rect width="43.8" x="99.6" y="285.8" height="21.3"></rect>
                              <rect width="43.8" x="234.1" y="285.8" height="21.3"></rect>
                              <rect width="43.8" x="368.6" y="285.8" height="21.3"></rect>
                              <rect width="43.8" x="99.6" y="386" height="21.3"></rect>
                              <rect width="43.8" x="234.1" y="386" height="21.3"></rect>
                              <rect width="43.8" x="368.6" y="386" height="21.3"></rect>
                            </g>
                          </g>
                        </symbol>
                      </svg>
                      @if ($icon && $color)
                        <svg aria-hidden="true" role="presentation" focusable="false"
                          style="width: 1.25rem; height: 1rem; margin-right: 0.5rem; stroke-width: 10px; fill: {{ $color }}; stroke: {{ $color }};">
                          <use xlink:href="#{{ $icon }}"></use>
                        </svg>
                      @endif
                      <span>{{ $keyFeature['item'] }}</span>
                    </div>
                  @endforeach
                @endif
              </div>
            </div>
            <!-- End Key Features -->

            <!-- Cta -->
            <div class="comp-table-v2-cta">
              <div style="padding: 0.5rem;">
                <style>
                  .comp-table-v2-number {
                    display: none;
                    width: 8.33%;
                    font-size: 30px;
                    justify-content: center;
                  }

                  .comp-table-v2-logo {
                    width: 100%;
                  }

                  .comp-table-v2-deposit {
                    width: 100%;
                    display: flex;
                    align-items: center;
                  }

                  .comp-table-v2-key-features {
                    width: 33.33%;
                    padding: 0 0.5rem;
                    display: none;
                    align-items: center;
                  }

                  .comp-table-v2-cta {
                    width: 100%;
                    display: flex;
                    align-items: center;
                  }

                  .comp-table-v2-cta>div {
                    width: 100%;
                  }

                  .comp-table-v2-cta-button {
                    background-color: #fcd34d;
                    padding: 0.75rem;
                    justify-content: center;
                    position: relative;
                  }

                  .comp-table-v2-cta-button:hover {
                    background-color: #fbc025;
                  }

                  @media (min-width: 768px) {
                    .comp-table-v2-number {
                      display: flex;
                    }

                    .comp-table-v2-deposit {
                      width: 41.67%;
                    }

                    .comp-table-v2-logo {
                      width: 25%;
                    }

                    .comp-table-v2-cta {
                      width: 25%;
                    }
                  }

                  @media (min-width: 1024px) {
                    .comp-table-v2-number {
                      width: 4.17%;
                    }

                    .comp-table-v2-key-features {
                      display: flex;
                    }

                    .comp-table-v2-cta {
                      width: 16.67%;
                    }

                    .comp-table-v2-logo {
                      width: 16.67%;
                    }

                    .comp-table-v2-deposit {
                      width: 29.16%
                    }
                  }
                </style>
                <a href="{{ $visitLink }}" rel="noreferer noopener" target="_blank"
                  class="flex items-center justify-center rounded text-centerfont-semibold comp-table-v2-cta-button">
                  <span
                    style="color: #3f3f46; font-size: 1.125rem; line-height: 1.75rem; font-weight: 600; margin-right: 0.25rem; position: relative; z-index: 2;">{{ $ctaText }}</span>
                  <div style="width: 0.75rem; height: 0.75rem;position: relative; z-index: 2;">
                    <svg aria-hidden="true" data-prefix="far" data-icon="long-arrow-right"
                      xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                      src="@/assets/image/icon/arrow-right.svg" svg-inline="" role="presentation" focusable="false"
                      class="w-3 h-3 pointer-events-none">
                      <path data-v-307b79ee="" fill="currentColor"
                        d="M295.515 115.716l-19.626 19.626c-4.753 4.753-4.675 12.484.173 17.14L356.78 230H12c-6.627 0-12 5.373-12 12v28c0 6.627 5.373 12 12 12h344.78l-80.717 77.518c-4.849 4.656-4.927 12.387-.173 17.14l19.626 19.626c4.686 4.686 12.284 4.686 16.971 0l131.799-131.799c4.686-4.686 4.686-12.284 0-16.971L312.485 115.716c-4.686-4.686-12.284-4.686-16.97 0z">
                      </path>
                    </svg>
                  </div>
                  <div
                    style="position: absolute; background-color: #fbc025; bottom: 0; height: 50%; width: 100%; z-index: 1; border-bottom-right-radius: 4px;
                            border-bottom-left-radius: 4px;">
                  </div>
                </a>
              </div>
            </div>
            <!-- End Cta -->
          </div>
          <!-- Disclaimer -->
          <div style="background-color: @if ($loop->index % 2 === 0) #fff; @else #f5f5f4; @endif">
            <div class="p-2 text-xs"
              style="text-align: center; font-style: italic; border-left: 1px solid #e7e5e4; border-right: 1px solid #e7e5e4;@if ($loop->index === count($options['rows']) - 1) border-bottom: 1px solid #e7e5e4; @endif">
              <div class="flex items-center" style="justify-content: center;">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                  src="@/assets/image/icon/info.svg" svg-inline="" role="presentation" focusable="false"
                  style="display: inline-block; width: 1rem; height: 1rem; margin-right: 0.25rem;">
                  <path fill="currentColor"
                    d="M256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm-36 344h12V232h-12c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h48c6.627 0 12 5.373 12 12v140h12c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12h-72c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12zm36-240c-17.673 0-32 14.327-32 32s14.327 32 32 32 32-14.327 32-32-14.327-32-32-32z">
                  </path>
                </svg>
                <span style="line-height: 1rem;">{{ $legalDisclaimer }}</span>
              </div>
            </div>
          </div>
          <!-- End Disclaimer -->
        @endforeach
      </div>
    </div>
  @else
    No rows in table.
  @endif
</div>