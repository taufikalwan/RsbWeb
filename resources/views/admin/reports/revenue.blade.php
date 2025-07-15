@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="content pt-4">
    <div class="row">
        <div class="col-lg-12">
            <!-- Card Grafik -->
            <div class="card card-default mb-4">
                <div class="card-header card-header-border-bottom bg-primary text-white">
                    <h4 class="mb-0">Visualisasi Pendapatan</h4>
                </div>
                <div class="card-body">
                    <canvas id="revenueChart" height="120"></canvas>
                </div>
            </div>

            <!-- Card Table -->
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Revenue Report</h2>
                </div>
                <div class="card-body">
                    @include('admin.reports.filter')
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Date</th>
                            <th>Orders</th>
                            <th>Gross Revenue</th>
                            <th>Taxes</th>
                            <th>Shipping</th>
                            <th>Net Revenue</th>
                        </thead>
                        <tbody>
                            @php
                                $totalOrders = 0;
                                $totalGrossRevenue = 0;
                                $totalTaxesAmount = 0;
                                $totalShippingAmount = 0;
                                $totalNetRevenue = 0;
                            @endphp
                            @forelse ($revenues as $revenue)
                                <tr>
                                    <td>{{ date('d M Y', strtotime($revenue->date)) }}</td>
                                    <td>
                                        <a href="{{ url('admin/orders?start='. $revenue->date .'&end='. $revenue->date . '&status=completed') }}">{{ $revenue->num_of_orders }}</a>
                                    </td>
                                    <td>Rp{{ number_format($revenue->gross_revenue, 0, ",", ".") }}</td>
                                    <td>Rp{{ number_format($revenue->taxes_amount, 0, ",", ".") }}</td>
                                    <td>Rp{{ number_format($revenue->shipping_amount, 0, ",", ".") }}</td>
                                    <td>Rp{{ number_format($revenue->net_revenue, 0, ",", ".") }}</td>
                                </tr>
                                @php
                                    $totalOrders += $revenue->num_of_orders;
                                    $totalGrossRevenue += $revenue->gross_revenue;
                                    $totalTaxesAmount += $revenue->taxes_amount;
                                    $totalShippingAmount += $revenue->shipping_amount;
                                    $totalNetRevenue += $revenue->net_revenue;
                                @endphp
                            @empty
                                <tr>
                                    <td colspan="6">No records found</td>
                                </tr>
                            @endforelse

                            @if ($revenues)
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td><strong>{{ $totalOrders }}</strong></td>
                                    <td><strong>Rp{{ number_format($totalGrossRevenue, 0, ",", ".") }}</strong></td>
                                    <td><strong>Rp{{ number_format($totalTaxesAmount, 0, ",", ".") }}</strong></td>
                                    <td><strong>Rp{{ number_format($totalShippingAmount, 0, ",", ".") }}</strong></td>
                                    <td><strong>Rp{{ number_format($totalNetRevenue, 0, ",", ".") }}</strong></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('style-alt')
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
    integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('script-alt')
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
    integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });

    // --- Chart.js: Revenue Chart ---
    const revenueData = @json($revenues);

    const labels = revenueData.map(item => new Date(item.date).toLocaleDateString('id-ID', {
        day: '2-digit',
        month: 'short'
    }));

    const orders = revenueData.map(item => item.num_of_orders);
    const grossRevenue = revenueData.map(item => item.gross_revenue);
    const taxes = revenueData.map(item => item.taxes_amount);
    const shipping = revenueData.map(item => item.shipping_amount);
    const netRevenue = revenueData.map(item => item.net_revenue);

    const ctx = document.getElementById('revenueChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                    label: 'Order',
                    data: orders,
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0,123,255,0.1)',
                    fill: true,
                    tension: 0.4
                },
                {
                    label: 'Gross Revenue',
                    data: grossRevenue,
                    borderColor: '#28a745',
                    backgroundColor: 'rgba(40,167,69,0.1)',
                    fill: true,
                    tension: 0.4
                },
                {
                    label: 'Tax',
                    data: taxes,
                    borderColor: '#ffc107',
                    backgroundColor: 'rgba(255,193,7,0.1)',
                    fill: true,
                    tension: 0.4
                },
                {
                    label: 'Shipping',
                    data: shipping,
                    borderColor: '#17a2b8',
                    backgroundColor: 'rgba(23,162,184,0.1)',
                    fill: true,
                    tension: 0.4
                },
                {
                    label: 'Net Revenue',
                    data: netRevenue,
                    borderColor: '#6f42c1',
                    backgroundColor: 'rgba(111,66,193,0.1)',
                    fill: true,
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    ticks: {
                        callback: function(value) {
                            return 'Rp' + value.toLocaleString('id-ID');
                        }
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.dataset.label}: Rp${context.parsed.y.toLocaleString('id-ID')}`;
                        }
                    }
                }
            }
        }
    });
</script>
@endpush
