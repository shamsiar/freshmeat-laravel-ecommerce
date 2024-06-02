@extends('frontend.default.layouts.master')

@section('title')
  {{ localize('My Wishlist') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
  <section class="my-account pt-6 pb-120">
    <div class="container">

      @include('frontend.default.pages.users.partials.customerHero')

      <div class="row g-4">
        <div class="col-xl-3">
          @include('frontend.default.pages.users.partials.customerSidebar')
        </div>

        <div class="col-xl-9">
          <div class="recent-orders bg-white rounded py-5 shadow">
            <h6 class="mb-4 px-4">{{ localize('My Wishlist') }}</h6>
            {{-- @php
              $recentOrders = \App\Models\Order::where('user_id', auth()->user()->id)
                  ->latest()
                  ->take(5)
                  ->get();
            @endphp --}}
            <div class="table-responsive">
              <table class="wishlist-table w-100 bg-white">
                <thead>
                  <th>{{ localize('Image') }}</th>
                  <th>{{ localize('Product Name') }}</th>
                  <th>{{ localize('U. Price') }}</th>
                  <th>{{ localize('Action') }}</th>
                </thead>
                <tbody class="text-center">
                  <!--wishlist listing-->
                  @forelse ($wishlist as $item)
                    <tr>
                      <td class="h-100px">
                        <img src="{{ uploadedAsset($item->product->thumbnail_image) }}"
                          alt="{{ $item->product->collectLocalization('name') }}" class="img-fluid" width="100">
                      </td>
                      <td class="product-title">
                        <h6 class="mb-0">{{ $item->product->collectLocalization('name') }}
                        </h6>
                      </td>
                      <td>
                        <span class="text-dark fw-bold me-2 d-lg-none">{{ localize('Unit Price') }}:</span>
                        <span class="text-dark fw-bold">
                          @include('frontend.default.pages.partials.products.pricing', [
                              'product' => $item->product,
                              'br' => true,
                          ])
                        </span>
                      </td>

                      <td>
                        <a href="javascript:void(0);" class="btn btn-secondary btn-sm ms-5 rounded-1"
                          onclick="showProductDetailsModal({{ $item->product->id }})">{{ localize('Add to Cart') }}</a>
                        <a href="{{ route('customers.wishlist.delete', $item->id) }}" class="close-btn ms-3"><i
                            class="fas fa-close"></i></a>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="4" class="py-4">{{ localize('No data found') }}</td>
                    </tr>
                  @endforelse
                  <!--wishlist listing-->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--wishlist section start-->
  <section class="wishlist-section ptb-120">
    <div class="container">
      <div class="rounded-2 overflow-hidden">
        <table class="wishlist-table w-100 bg-white">
          <thead>
            <th>{{ localize('Image') }}</th>
            <th>{{ localize('Product Name') }}</th>
            <th>{{ localize('U. Price') }}</th>
            <th>{{ localize('Action') }}</th>
          </thead>
          <tbody class="text-center">
            <!--wishlist listing-->
            @forelse ($wishlist as $item)
              <tr>
                <td class="h-100px">
                  <img src="{{ uploadedAsset($item->product->thumbnail_image) }}"
                    alt="{{ $item->product->collectLocalization('name') }}" class="img-fluid" width="100">
                </td>
                <td class="product-title">
                  <h6 class="mb-0">{{ $item->product->collectLocalization('name') }}
                  </h6>
                </td>
                <td>
                  <span class="text-dark fw-bold me-2 d-lg-none">{{ localize('Unit Price') }}:</span>
                  <span class="text-dark fw-bold">
                    @include('frontend.default.pages.partials.products.pricing', [
                        'product' => $item->product,
                        'br' => true,
                    ])
                  </span>
                </td>

                <td>
                  <a href="javascript:void(0);" class="btn btn-secondary btn-sm ms-5 rounded-1"
                    onclick="showProductDetailsModal({{ $item->product->id }})">{{ localize('Add to Cart') }}</a>
                  <a href="{{ route('customers.wishlist.delete', $item->id) }}" class="close-btn ms-3"><i
                      class="fas fa-close"></i></a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="4" class="py-4">{{ localize('No data found') }}</td>
              </tr>
            @endforelse
            <!--wishlist listing-->
          </tbody>
        </table>
      </div>
    </div>
  </section>
  <!--wishlist section end-->
@endsection
