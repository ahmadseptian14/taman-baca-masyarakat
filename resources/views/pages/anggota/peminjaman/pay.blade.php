@extends('layouts.anggota')

@section('content')
    <body>
         <!-- Page Content -->
    <div class="page-content page-success">
        <div class="section-success" data-aos="zoom-in">
          <div class="container">
            <div class="row align-items-center row-login justify-content-center">
              <div class="col-lg-6 text-center">
                <h2 class="mt-5">
                  Silahkan Donasi
                </h2>
                <p>
                  Silahkan tunggu konfirmasi email dari kami dan <br />
                  kami akan menginformasikan donasi dari anda!
                </p>
                <div>
                  <button id="pay-button" class="btn btn-success w-50 mt-4">
                        Donasi
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </body>
@endsection

@push('addon-scripts')
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{$snapToken}}');
      // customer will be redirected after completing payment pop-up
    });
  </script>

<script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-WNumYdPHdYIJ_MAK">
</script>
@endpush