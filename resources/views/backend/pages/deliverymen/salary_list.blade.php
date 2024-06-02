@extends('backend.layouts.master')

@section('title')
    {{ localize('Payroll List') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('All Payroll') }}</h2>
                            </div>
                            <div class="tt-action">
                                @can('deliveryman_payroll_create')
                                    <a href="{{ route('admin.deliveryman.payroll') }}" class="btn btn-primary"><i
                                            data-feather="plus"></i> {{ localize('Create Payroll') }}</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <div class="card mb-4" id="section-1">
                        <form class="app-search" action="{{ Request::fullUrl() }}" method="GET">
                            <div class="card-header border-bottom-0">
                                <div class="row justify-content-between g-3">
                                    <div class="col-auto flex-grow-1">
                                        <div class="tt-search-box">
                                            <div class="input-group">
                                                <span class="position-absolute top-50 start-0 translate-middle-y ms-2"> <i
                                                        data-feather="search"></i></span>
                                                <input class="form-control rounded-start w-100" type="text"
                                                    id="search" name="search" placeholder="{{ localize('Search') }}"
                                                    @isset($searchKey)
                                                    value="{{ $searchKey }}"
                                                @endisset>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-secondary">
                                            <i data-feather="search" width="18"></i>
                                            {{ localize('Search') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <table class="table tt-footable border-top" data-use-parent-width="true">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ localize('S/L') }}</th>
                                    <th>{{ localize('Deliveryman') }}</th>
                                    <th data-breakpoints="xs sm">{{ localize('Month') }}</th>
                                    <th data-breakpoints="xs sm">{{ localize('Total Allownce') }}</th>
                                    <th data-breakpoints="xs sm">{{ localize('Total Deduction') }}</th>
                                    <th data-breakpoints="xs sm">{{ localize('Total Salary') }}</th>
                                    <th data-breakpoints="xs sm">{{ localize('Status') }}</th>
                                    <th data-breakpoints="xs sm" class="text-end">{{ localize('Action') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payrolls as $key => $payroll)
                                    <tr>
                                        <td class="text-center">
                                            {{ $key + 1 + ($payrolls->currentPage() - 1) * $payrolls->perPage() }}
                                        </td>
                                        <td>
                                            <span class="fw-semibold">
                                                {{ $payroll->user->name }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill bg-secondary">
                                                {{ $payroll->month }}
                                            </span>

                                        </td>
                                        <td>
                                            {{ $payroll->total_allownce }}
                                        </td>
                                        <td>
                                            {{ $payroll->total_deduction }}
                                        </td>

                                        <td>
                                            {{ $payroll->total_salary }}
                                        </td>

                                        <td>
                                            <div class="form-check form-switch">
                                                <input type="checkbox" onchange="updatePayrollStatus(this)"
                                                    class="form-check-input"
                                                    @if ($payroll->status) checked @endif
                                                    value="{{ $payroll->id }}">
                                            </div>
                                        </td>


                                        <td class="text-end">

                                            @can('edit_deliveryman')
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.deliveryman.payroll.edit', $payroll->id) }}">
                                                    <i data-feather="edit-3" class="me-2"></i>{{ localize('Edit') }}
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--pagination start-->
                        <div class="d-flex align-items-center justify-content-between px-4 pb-4">
                            {{-- <span>{{ localize('Showing') }}
                            {{ $deliverymen->firstItem() }}-{{ $deliverymen->lastItem() }} {{ localize('of') }}
                            {{ $deliverymen->total() }} {{ localize('results') }}</span>
                        <nav>
                            {{ $deliverymen->appends(request()->input())->links() }}
                        </nav> --}}
                        </div>
                        <!--pagination end-->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        "use strict";

        function updatePayrollStatus(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('admin.deliveryman.payroll.changeStatus') }}', {
                    _token: '{{ csrf_token() }}',
                    id: el.value,
                    status: status
                },
                function(data) {
                    if (data == 1) {
                        notifyMe('success', '{{ localize('Status updated successfully') }}');
                    } else {
                        notifyMe('danger', '{{ localize('Something went wrong') }}');
                    }
                });
        }
    </script>
@endsection
