@extends('layouts.app', ['pageSlug' => 'dashboard'])


@section('content')
<div class="row row-cols-1 row-cols-md-3">
  <div class="col mb-4">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col mb-3">
            <div class="card bg-primary">
              <div class="card-body mx-auto">
                <i class="tim-icons icon-single-02 "></i>
              </div>
            </div>
          </div>
          <div class="col mb-9">
            <h5 class="card-title-dashboard">Customer Service</h5>
            <p class="card-text-dashboard">69</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col mb-4">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col mb-3">
            <div class="card bg-info">
              <div class="card-body mx-auto">
                <i class="tim-icons icon-bank "></i>
              </div>
            </div>
          </div>
          <div class="col mb-9">
            <h5 class="card-title-dashboard">Banyak Ruang</h5>
            <p class="card-text-dashboard">69</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col mb-4">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col mb-3">
            <div class="card bg-success">
              <div class="card-body mx-auto">
                <i class="tim-icons icon-check-2 "></i>
              </div>
            </div>
          </div>
          <div class="col mb-9">
            <h5 class="card-title-dashboard">Ruang Dibersihkan</h5>
            <p class="card-text-dashboard">5</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush
