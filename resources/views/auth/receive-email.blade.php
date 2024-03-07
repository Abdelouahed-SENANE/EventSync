@include('layouts.public-layout')
<div class="h-screen w-full bg-gray-100 inline-flex justify-center items-center">

    <div class="w-[500px] bg-white p-4">
        <div class="text-center">
            <x-application-logo class="text-teal-600"/>
        </div>
        <div class="my-4 text-base text-gray-700">
            <p>Your password reset request has been received. We've sent an email to your account for the reset process.
                </p>
        </div>
        <div>
            <h4 class="text-center text-xl">Redirecting to login after<span id="countdown" class="mx-1"></span></h4>
        </div>

    </div>
</div>
<script>
    var seconds = 10;
    function countDown() {
        seconds = seconds - 1;
        if (seconds < 0) {
            window.location = 'http://localhost/login';
        }else {

            document.getElementById('countdown').innerText = seconds;
            window.setTimeout("countDown()", 1000)

        }
    }
    countDown()

</script>

